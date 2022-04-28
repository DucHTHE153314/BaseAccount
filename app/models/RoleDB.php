<?php

/*
 * Copyright(C) 2022, Base
 * Base Account:
 * Model - RoleDB
 *
 * Record of change:
 * DATE            Version             AUTHOR           DESCRIPTION
 * 2022-04-28       1.0                DucHT           First Implement
 */

namespace App\Models;

/**
 * Description of RoleDB
 *
 * @author PC
 */
class RoleDB extends \Core\Model implements BaseDB {

    //put your code here
    public function delete($obj) {
        throw new Exception('Unsupported medthod!');
    }

    public function getAll() {
        
    }

    public function getOne($key) {
        
    }

    public function insert($obj) {
        throw new Exception('Unsupported medthod!');
    }

    public function update($old, $new) {
        throw new Exception('Unsupported medthod!');
    }

}
