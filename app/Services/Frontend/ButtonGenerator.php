<?php

namespace App\Services\Frontend;

use App\Services\Frontend\UIElements\Buttons\Contracts\Button;

final class ButtonGenerator
{
    const CREATE_INLINE_CSS_CLASS = 'inline-flex m-1 text-white bg-gradient-to-br from-green-400 to-blue-600 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-green-200 dark:focus:ring-green-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2';

    const EXPORT_INLINE_CSS_CLASS = 'inline-flex m-1 text-white bg-gradient-to-br from-pink-500 to-orange-400 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-pink-200 dark:focus:ring-pink-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2';

    const SHOW_CSS_CLASS = 'text-xs m-1 text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 shadow-lg shadow-green-500/50 dark:shadow-lg dark:shadow-green-800/80 font-medium rounded-lg text-sm px-3 py-1.5 text-center me-2 mb-2';

    const EDIT_CSS_CLASS = 'text-xs m-1 text-white bg-gradient-to-r from-cyan-400 via-cyan-500 to-cyan-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-cyan-300 dark:focus:ring-cyan-800 shadow-lg shadow-cyan-500/50 dark:shadow-lg dark:shadow-cyan-800/80 font-medium rounded-lg text-sm px-3 py-1.5 text-center me-2 mb-2';

    const DELETE_CSS_CLASS = 'text-xs m-1 text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 shadow-lg shadow-red-500/50 dark:shadow-lg dark:shadow-red-800/80 font-medium rounded-lg text-sm px-3 py-1.5 text-center me-2 mb-2';

    private array $buttons = [];

    public function addButton(Button $button): self
    {
        $this->buttons[] = $button->generate();

        return $this;
    }

    public function getButtons(): array
    {
        return $this->buttons;
    }
}
