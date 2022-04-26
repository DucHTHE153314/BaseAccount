<?php

namespace App\Controllers;

/*
 * Copyright(C) 2022, Base
 * Base Account:
 * Controller - Home
 *
 * Record of change:
 * DATE            Version             AUTHOR           DESCRIPTION
 * 2022-04-26       1.0                DucHT           First Implement
 */
use Core\View;
use Core\Controller;

/**
 * Home Controller
 */
class Home extends Controller
{
    /**
     * Make index view
     * 
     * @return void
     */
    public function indexAction()
    {
        View::render('index.html');
    }
}

