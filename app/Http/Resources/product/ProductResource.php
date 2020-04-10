<?php

namespace App\Http\Resources\product;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property mixed name
 * @property mixed price
 * @property mixed discount
 * @property mixed stock
 * @property mixed details
 */
class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'name'     => $this->name,
            'price'    => $this->price,
            'stock'    => $this->stock,
            'discount' => $this->discount,
            'details'  => $this->details,
        ];
    }
}
