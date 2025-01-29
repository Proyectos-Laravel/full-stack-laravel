<?php

namespace App\Http\Resources;

use App\Models\LessonType;
use App\Services\Frontend\FormActionGenerator;
use App\Services\Frontend\UIElements\ActionForm;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin LessonType
 */
final class LessonTypeResource extends JsonResource
{
    private FormActionGenerator $formActionGenerator;

    public function __construct($resource)
    {
        parent::__construct($resource);
        $this->formActionGenerator = new FormActionGenerator();
    }

    public function toArray($request): array
    {
        return [
            'pk_name' => 'lesson_type_id',
            'lesson_type_id' => $this->lesson_type_id,
            'name' => $this->name,
            'is_active' => $this->is_active,
            'created_at' => $this->created_at->format('Y-m-d'),
            'created_at_iso_format_ll' => $this->created_at->isoFormat('LL'),
            'update_action' => $this->formActionGenerator->setActionForm(
                new ActionForm(
                    url: route('backoffice.lesson_types.update', $this->lesson_type_id),
                    method: FormActionGenerator::HTTP_METHOD_PUT,
                )
            )->getActionForm(),
            'delete_action' => $this->formActionGenerator->setActionForm(
                new ActionForm(
                    url: route('backoffice.lesson_types.destroy', $this->lesson_type_id),
                    method: FormActionGenerator::HTTP_METHOD_DELETE,
                )
            )->getActionForm(),
        ];
    }
}
