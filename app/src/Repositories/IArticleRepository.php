<?php

namespace App\Repositories;

use App\Models\ArticleModel;

interface IArticleRepository
{
    public function getAll(): array;

    public function getById(int $id): ?ArticleModel;

    public function create(ArticleModel $articleModel): void;

    public function update(int $id, ArticleModel $articleModel): void;

    public function delete(int $id): void;
}