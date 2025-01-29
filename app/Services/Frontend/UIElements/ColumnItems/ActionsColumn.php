<?php

namespace App\Services\Frontend\UIElements\ColumnItems;

use App\Services\Frontend\UIElements\ColumnItems\Contracts\ColumnItem;

final class ActionsColumn implements ColumnItem
{
    const COMPONENT = 'AppDatatableActionsColumn';

    public function __construct(
        protected string $label,
        protected string $key,
        protected array $actions,
    ) {}

    public function generate(): array
    {
        return [
            'component' => self::COMPONENT,
            'label' => __($this->label),
            'key' => $this->key,
            'sortable' => false,
            'actions' => array_map(fn(ActionColumn $action) => $action->generate(), $this->actions),
        ];
    }
}
