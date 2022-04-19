<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 *
 * @author DucHT
 */
interface BaseDB {

    public function getAll();

    public function getOne();

    public function insert($obj);

    public function delete($obj);

    public function update($old, $new);
}
