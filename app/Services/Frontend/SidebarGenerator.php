<?php

namespace App\Services\Frontend;

use App\Services\Frontend\UIElements\SidebarItems\Contracts\SidebarItem;

final class SidebarGenerator
{
    protected array $items = [];

    public function addSidebarItem(SidebarItem $item): self
    {
        $this->items[] = $item->toArray();

        return $this;
    }

    public function getSidebarItems(): array
    {
        return $this->items;
    }
}
