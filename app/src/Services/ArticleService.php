<?php

namespace App\Services;

use App\Models\ArticleModel;
use App\Services\IArticleService;
use App\Repositories\IArticleRepository;
use App\Repositories\ArticleRepository;

class ArticleService implements IArticleService
{
    private IArticleRepository $articleRepository;
    public function __construct()
    {
        $this->articleRepository = new ArticleRepository();
    }
    public function getAll(): array
    {
        return $this->articleRepository->getAll();
    }
    public function getById(int $id): ?ArticleModel
    {
        // Implementation to retrieve an article by ID
        return null;
    }
    public function create(ArticleModel $articleModel): void
    {
        // Implementation to create a new article
    }
    public function update(int $id, ArticleModel $articleModel): void
    {
        // Implementation to update an existing article
    }
    public function delete(int $id): void
    {
        // Implementation to delete an article
    }
}