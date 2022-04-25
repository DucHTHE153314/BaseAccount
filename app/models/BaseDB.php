<?php

/*
 * Copyright(C) 2022, Base
 * Base Account:
 * Model - interface BaseDB
 *
 * Record of change:
 * DATE            Version             AUTHOR           DESCRIPTION
 * 2022-04-19       1.0                DucHT             First Implement
 */

/**
 *
 * @author DucHT
 */
interface BaseDB {

    public function getAll();

    public function getOne($key);

    public function insert($obj);

    public function delete($obj);

    public function update($old, $new);
}
