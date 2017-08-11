<?php

/**
 * Provides a controller for home page views/models.
 *
 * @author     hamedmehryar
 */

namespace App\Http\Controllers;

class HomeController extends Controller {

    /**
     * HomeController constructor.
     */
    public function __construct() {
        
    }

    /**
     * @return $this
     */
    public function index() {
        return view('welcome');
    }

}
