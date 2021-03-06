<?php

namespace App\Http\Resources\product;

use Illuminate\Http\Resources\Json\Resource;

class ProductCollection extends Resource
{
    /**
     * Transform the resource collection into an array.
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
            'link to product details' => [
                'product_details' => route('products.show',$this->id)
            ]
        ];
    }
}
