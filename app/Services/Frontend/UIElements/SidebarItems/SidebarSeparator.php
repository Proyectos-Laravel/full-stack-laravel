<?php

namespace App\Services\Frontend\UIElements\SidebarItems;

use App\Services\Frontend\UIElements\SidebarItems\Contracts\SidebarItem;

class SidebarSeparator implements SidebarItem
{
    const COMPONENT = 'AppSidebarSeparatorItem';

    public function toArray(): array
    {
        return [
            'component' => self::COMPONENT,
            'props' => [

            ]
        ];
    }
}
