<?php

namespace App\Models;

class ProductModel
{
    public int $id;
    public int $user_id;
    public string $title;
    public float $price;
    public string $description;
    public string $category;
    public ?string $image_path;
}