<?php

namespace App\Http\Resources;

use App\Models\Category;
use App\Services\Frontend\FormActionGenerator;
use App\Services\Frontend\UIElements\ActionForm;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin Category
 */
class CategoryResource extends JsonResource
{
    private FormActionGenerator $formActionGenerator;

    public function __construct($resource)
    {
        parent::__construct($resource);
        $this->formActionGenerator = new FormActionGenerator();
    }

    public function toArray(Request $request): array
    {
        return [
            'pk_name' => 'category_id',
            'category_id' => $this->category_id,
            'name' => $this->name,
            'description' => $this->description,
            'is_active' => $this->is_active,
            'created_at' => $this->created_at->format('Y-m-d'),
            'created_at_iso_format_ll' => $this->created_at->isoFormat('LL'),
            'update_action' => $this->formActionGenerator->setActionForm(
                new ActionForm(
                    url: route('backoffice.categories.update', $this->category_id),
                    method: FormActionGenerator::HTTP_METHOD_PUT,
                )
            )->getActionForm(),
            'delete_action' => $this->formActionGenerator->setActionForm(
                new ActionForm(
                    url: route('backoffice.categories.destroy', $this->category_id),
                    method: FormActionGenerator::HTTP_METHOD_DELETE,
                )
            )->getActionForm(),
        ];
    }
}
