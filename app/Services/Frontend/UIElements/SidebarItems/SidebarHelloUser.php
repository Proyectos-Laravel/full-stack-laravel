<?php

namespace App\Services\Frontend\UIElements\SidebarItems;

use App\Services\Frontend\UIElements\SidebarItems\Contracts\SidebarItem;

class SidebarHelloUser implements SidebarItem
{
    const COMPONENT = 'AppSidebarHelloUserItem';

    public function toArray(): array
    {
        return [
            'component' => self::COMPONENT,
            'props' => [
                'text' => __('Hola, :name', ['name' => auth()->user()->name]),
            ]
        ];
    }
}
