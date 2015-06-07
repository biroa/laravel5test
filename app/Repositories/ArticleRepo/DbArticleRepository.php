<?php namespace App\Repositories\ArticleRepo;

    use App\Repositories as Repo;

    class DbArticleRepository extends Repo\DbRepository implements ArticleRepositoryInterface
    {

        public function __construct(Article $model)
        {

        }

    }
