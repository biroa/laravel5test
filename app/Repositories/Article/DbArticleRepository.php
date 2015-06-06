<?php namespace App\Repositories\Articles;

use App\Repositories;

class DbArticleRepository extends DbRepository implements ArticleRepositoryInterface
{

    public function __construct(Article $model)
    {

    }

}