<?php namespace app\Repositories\Article;

use app\Repositories;


class DbArticleRepository extends DbRepository implements ArticleRepositoryInterface {


    public function __construct(Article $model){

    }

}