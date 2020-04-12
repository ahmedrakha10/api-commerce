<?php

namespace App\Exceptions;

use Exception;

class ProductOrReviewNotBelongToUser extends Exception
{
    public function render()
    {
        return ['data' => 'Product or review not belong to this user'];
    }
}
