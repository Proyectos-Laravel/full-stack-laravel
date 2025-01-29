<?php

namespace App\Traits\ViewModels;

trait WithUser
{
    public function user(): array
    {
        if (! auth()->check()) {
            return [];
        }

        return [
            'user_id' => auth()->id(),
            'name' => auth()->user()->name,
            'email' => auth()->user()->email,
        ];
    }
}
