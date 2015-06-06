<?php

namespace app\Repositories;


abstract class DbRepository {

    public function getById($id){
        return $this->model->find($id);
    }
}