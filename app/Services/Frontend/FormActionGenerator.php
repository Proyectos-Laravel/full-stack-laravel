<?php

namespace App\Services\Frontend;

use App\Services\Frontend\UIElements\ActionForm;

final class FormActionGenerator
{
    const HTTP_METHOD_GET = 'get';

    const HTTP_METHOD_POST = 'post';

    const HTTP_METHOD_PUT = 'put';

    const HTTP_METHOD_PATCH = 'patch';

    const HTTP_METHOD_DELETE = 'delete';

    protected ActionForm $actionForm;

    public function setActionForm(ActionForm $actionForm): self
    {
        $this->actionForm = $actionForm;

        return $this;
    }

    public function getActionForm(): array
    {
        return $this->actionForm->toArray();
    }
}
