<?php

namespace App\Http\Resources\product;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property mixed name
 * @property mixed price
 * @property mixed discount
 * @property mixed stock
 * @property mixed details
 * @property mixed id
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
            'id'          => $this->id,
            'name'        => $this->name,
            'price'       => $this->price,
            'stock'       => $this->stock == 0 ? 'Out of the stock' : $this->stock,
            'discount'    => $this->discount,
            'details'     => $this->details,
            'total_price' => round((1 - $this->discount / 100) * $this->price, 2),
            'rating'      => $this->reviews->count() > 0 ? round($this->reviews->avg('star'), 1) : 'No rating yet',
            'href'        => [
                'reviews' => route('reviews.index', $this->id)
            ]
        ];
    }
}
