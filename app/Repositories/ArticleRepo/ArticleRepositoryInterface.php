<?php namespace App\Repositories;

    interface ArticleRepositoryInterface
    {

        public function getById($id);

        public function paginate($perPage = 15, $columns = array('*'));

    }
