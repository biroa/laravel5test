<?php namespace App\Repositories;


    abstract class DbRepository
    {

        /**
         * @param $id
         *
         * @return mixed
         */
        public function getById($id)
        {
            return $this->model->find($id);
        }

        public function paginate($perPage = 15, $columns = array('*')) {
            return $this->model->paginate($perPage, $columns);
        }
    }
