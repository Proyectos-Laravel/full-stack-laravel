<?php

namespace App\Services\Frontend;

use App\Services\Frontend\UIElements\StatItems\Contracts\StatItem;

final class StatsGenerator
{
    protected array $items = [];

    public function addStat(StatItem $item): self
    {
        $this->items[] = $item->toArray();

        return $this;
    }

    public function getStats(): array
    {
        return $this->items;
    }
}
