<?php

namespace App\Repositories;

use App\Models\ArticleModel;
use App\Repositories\IArticleRepository;
use PDO;

class ArticleRepository extends BaseRepository implements IArticleRepository
{
    public function getAll(): array
    {
        $result = $this->connection->query("SELECT * FROM articles");
        $posts = $result->fetchAll(PDO::FETCH_CLASS, ArticleModel::class);
        return $posts;
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