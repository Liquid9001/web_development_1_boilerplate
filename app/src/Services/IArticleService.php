<?php

namespace App\Services;

use App\Models\ArticleModel;

interface IArticleService
{
    public function getAll(): array;

    public function getById(int $id): ?ArticleModel;

    public function create(ArticleModel $articleModel): void;

    public function update(int $id, ArticleModel $articleModel): void;

    public function delete(int $id): void;
}