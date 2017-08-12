<?php

namespace App\Http\Controllers;

/**
 * Description of HomeController
 *
 * @author mohammedzaki
 * @Middleware({"web","auth"})
 */
class HomeController extends Controller {

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     * @Get("/home", as="home")
     * @Get("/")
     */
    public function index() {
        return view('home');
    }

}
