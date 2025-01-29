<?php

declare(strict_types=1);

namespace App\ViewModels\Backoffice\LessonTypes;

use Exception;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Pipeline\Pipeline;
use Illuminate\Support\Facades\Log;
use App\Constants\Heroicons;
use App\Enums\Filters\LessonTypeFilters;
use App\Filters\FilterValue;
use App\Helpers\RequestHelper;
use App\Http\Resources\LessonTypeResource;
use App\Models\LessonType;
use App\Overrides\LengthAwarePaginator;
use App\Services\Frontend\ButtonGenerator;
use App\Services\Frontend\FormFieldsGenerator;
use App\Services\Frontend\FormActionGenerator;
use App\Services\Frontend\UIElements\ActionForm;
use App\Services\Frontend\UIElements\Buttons\Button;
use App\Services\Frontend\UIElements\ColumnItems\ActionColumn;
use App\Services\Frontend\UIElements\ColumnItems\ActionsColumn;
use App\Services\Frontend\UIElements\ColumnItems\BooleanColumn;
use App\Services\Frontend\UIElements\ColumnItems\DateColumn;
use App\Services\Frontend\UIElements\ColumnItems\TextColumn;
use App\Services\Frontend\UIElements\FormFields\CheckboxField;
use App\Services\Frontend\UIElements\FormFields\DateField;
use App\Services\Frontend\UIElements\FormFields\SearchField;
use App\Services\Frontend\UIElements\FormFields\SelectOptions\BooleanOption;
use App\Services\Frontend\UIElements\FormFields\SelectField;
use App\Services\Frontend\UIElements\FormFields\TextField;
use App\Services\Frontend\UIElements\Modals\Modal;
use App\Services\Frontend\UIElements\ResourceDetailLine;
use App\Services\Frontend\ModalGenerator;
use App\Services\Frontend\ResourceDetailGenerator;
use App\Services\Frontend\TableGenerator;
use App\Services\ViewModels\FilterService;
use App\Traits\ViewModels\WithPerPage;
use App\ViewModels\Contracts\Datatable;
use App\ViewModels\ViewModel;

final class GetLessonTypesViewModel extends ViewModel implements Datatable
{
    use WithPerPage;

    const PER_PAGE = 10;

    const ROUTE_BACKOFFICE_LESSON_TYPES_STORE = 'backoffice.lesson_types.store';

    const ROUTE_BACKOFFICE_LESSON_TYPES_GENERATE_EXPORT_URL = 'backoffice.lesson_types.generate_export_url';

    public function __construct(
        private readonly Pipeline $pipeline,
        private readonly TableGenerator $tableGenerator,
        private readonly FilterService $filterService,
        private readonly ButtonGenerator $buttonGenerator,
        private readonly FormActionGenerator $formActionGenerator,
        private readonly ModalGenerator $modalGenerator,
        private readonly FormFieldsGenerator $formFieldsGenerator,
        protected readonly ResourceDetailGenerator $resourceDetailGenerator,
        public readonly bool $paginated = true,
    ) {
        $this->tableGenerator->initSorter(request('sorter', [
            'column' => 'created_at',
            'direction' => 'desc',
        ]));
    }

    public function title(): string
    {
        return __('Tipos de lección');
    }

    public function textModel(): string
    {
        return 'tipo de lección';
    }

    public function tableData(): LengthAwarePaginator|ResourceCollection
    {
        $models = $this->pipeline
            ->send(LessonType::query())
            ->through(
                collect($this->tableFilters())
                    ->map(fn ($filter, $value) => LessonTypeFilters::from($value)->create(new FilterValue($filter)))
                    ->values()
                    ->all()
            )
            ->thenReturn();

        if ($this->paginated) {
            return LessonTypeResource::collection($models->paginate($this->perPage(self::PER_PAGE)))->resource;
        }

        return LessonTypeResource::collection($models->get());
    }

    public function tableColumns(): array
    {
        return $this->tableGenerator
            ->addColumn(
                new TextColumn(
                    label: 'Nombre',
                    key: 'name',
                    sortable: true,
                    direction: $this->tableGenerator->getSortDirection(column: 'name'),
                )
            )->addColumn(
                new BooleanColumn(
                    label: 'Activa',
                    key: 'is_active',
                    sortable: true,
                    direction: $this->tableGenerator->getSortDirection(column: 'is_active'),
                    trueValue: 'Si',
                    falseValue: 'No',
                )
            )->addColumn(
                new DateColumn(
                    label: 'Fecha de creación',
                    key: 'created_at_iso_format_ll',
                    sortable: true,
                    direction: $this->tableGenerator->getSortDirection(column: 'created_at'),
                    sortKey: 'created_at',
                )
            )->addColumn(
                new ActionsColumn(
                    label: 'Acciones',
                    key: 'actions',
                    actions: [
                        new ActionColumn(
                            label: 'Ver',
                            class: ButtonGenerator::SHOW_CSS_CLASS,
                            event: 'show',
                        ),
                        new ActionColumn(
                            label: 'Editar',
                            class: ButtonGenerator::EDIT_CSS_CLASS,
                            event: 'edit',
                        ),
                        new ActionColumn(
                            label: 'Eliminar',
                            class: ButtonGenerator::DELETE_CSS_CLASS,
                            event: 'remove',
                        ),
                    ]
                )
            )->getColumns();
    }

    protected function tableFilters(): array
    {
        return array_merge(
            $this->filterService->generateSorterFilter(key: 'sorter'),
            $this->filterService->generateNormalFilter(key: 'query'),
            $this->filterService->generateNormalFilter(key: 'is_active'),
        );
    }

    public function tableButtons(): array
    {
        return $this->buttonGenerator
            ->addButton(
                new Button(
                    label: 'Crear tipo de lección',
                    action: 'create',
                    icon: Heroicons::PLUS,
                    class: ButtonGenerator::CREATE_INLINE_CSS_CLASS,
                )
            )->addButton(
                new Button(
                    label: 'Exportar',
                    action: 'export',
                    icon: Heroicons::DOWNLOAD,
                    class: ButtonGenerator::EXPORT_INLINE_CSS_CLASS,
                )
            )->getButtons();
    }

    public function modals(): array
    {
        try {
            $formFields = $this->formFields();

            return $this->modalGenerator
                ->addModals(
                    new Modal(
                        type: ModalGenerator::MODAL_CREATE,
                        title: 'Crear tipo de lección',
                        textSubmitButton: 'Crear',
                        action: $this->formActionGenerator->setActionForm(
                            new ActionForm(
                                url: route(self::ROUTE_BACKOFFICE_LESSON_TYPES_STORE),
                                method: FormActionGenerator::HTTP_METHOD_POST,
                            )
                        )->getActionForm(),
                        formFields: $formFields,
                    ),
                    new Modal(
                        type: ModalGenerator::MODAL_SHOW,
                        title: 'Información del tipo de lección',
                        extraData: [
                            'resource_detail_config' => $this->resourceDetailConfig(),
                        ],
                    ),
                    new Modal(
                        type: ModalGenerator::MODAL_EDIT,
                        title: 'Editar tipo de lección',
                        textSubmitButton: 'Editar',
                        formFields: $formFields,
                    ),
                    new Modal(
                        type: ModalGenerator::MODAL_EXPORT,
                        title: 'Exportar tipos de lección',
                        textSubmitButton: 'Exportar',
                        action: $this->formActionGenerator->setActionForm(
                            new ActionForm(
                                url: route(
                                    self::ROUTE_BACKOFFICE_LESSON_TYPES_GENERATE_EXPORT_URL,
                                    RequestHelper::queryWithoutNulls()
                                ),
                            )
                        )->getActionForm(),
                        questionMessage: '¿Estás seguro de que quieres exportar estos tipos de lección?',
                    ),
                    new Modal(
                        type: ModalGenerator::MODAL_DELETE,
                        title: 'Eliminar tipo de lección',
                        textSubmitButton: 'Eliminar',
                        questionMessage: '¿Estás seguro de que quieres eliminar este tipo de lección?',
                        textCancelButton: 'Cancelar',
                    )
                )->getModals();
        } catch (Exception $e) {
            Log::error('Error al generar los modales de tipos de lecciones: ' . $e->getMessage());
            return [];
        }
    }

    public function filterFields(): array
    {
        return (app(FormFieldsGenerator::class))
            ->addField(
                new SearchField(
                    name: 'query',
                    label: 'Buscador',
                    placeholder: 'Buscar',
                )
            )->addField(
                new SelectField(
                    name: 'is_active',
                    label: '¿Está activa?',
                    placeholder: 'Selecciona una opción',
                    options: (new BooleanOption())->getOptions(),
                )
            )->getFields();
    }

    protected function formFields(): array
    {
        return (app(FormFieldsGenerator::class))
            ->addField(
                new TextField(
                    name: 'name',
                    label: 'Nombre',
                    placeholder: 'Nombre',
                )
            )->addField(
                new DateField(
                    name: 'created_at',
                    label: 'Fecha de creación',
                )
            )->addField(
                new CheckboxField(
                    name: 'is_active',
                    label: '¿Está activa?',
                )
            )->getFields();
    }

    /**
     * @throws Exception
     */
    protected function resourceDetailConfig(): array
    {
        return $this->resourceDetailGenerator
            ->addLine(
                new ResourceDetailLine(
                    columnName: 'name',
                    icon: Heroicons::QUESTION_MARK_CIRCLE,
                )
            )->addLine(
                new ResourceDetailLine(
                    columnName: 'created_at_iso_format_ll',
                    icon: Heroicons::CALENDAR,
                )
            )->addLine(
                new ResourceDetailLine(
                    columnName: 'is_active',
                    label: 'Activa',
                    isBoolean: true,
                )
            )->getLines();
    }
}
