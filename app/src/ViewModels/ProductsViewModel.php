<?php

namespace App\ViewModels;

use App\Models\ProductModel;

class ProductsViewModel
{

    /** @var ProductModel[] $products */
    public array $products;

    public function __construct(array $products)
    {
        $this->products = $products;
    }
}
