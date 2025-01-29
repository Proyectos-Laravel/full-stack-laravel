<?php

namespace App\Traits\ViewModels;

trait WithSkeleton
{
    protected bool $showSkeleton = true;

    public function skeleton(): bool
    {
        return $this->showSkeleton;
    }

    protected function hideSkeleton(): void
    {
        $this->showSkeleton = false;
    }

    protected function showSkeleton(): void
    {
        $this->showSkeleton = true;
    }
}
