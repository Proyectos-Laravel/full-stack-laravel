<?php

namespace App\Services\Frontend;

use App\Services\Frontend\UIElements\Modals\Contracts\Modal;

final class ModalGenerator
{
    const MODAL_CREATE = 'create';

    const MODAL_SHOW = 'show';

    const MODAL_EDIT = 'edit';

    const MODAL_DELETE = 'remove';

    const MODAL_EXPORT = 'export';

    private array $modals = [];

    public function addModals(Modal ...$modals): self
    {
        foreach ($modals as $modal) {
            $this->addModal($modal);
        }

        return $this;
    }

    private function addModal(Modal $modal): void
    {
        $this->modals[$modal->getType()] = $modal->generate();
    }

    public function getModals(): array
    {
        return $this->modals;
    }
}
