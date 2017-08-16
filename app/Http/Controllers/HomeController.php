<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/**
 * 
 * @Middleware({"web", "auth"}, except={"welcome"})
 */
class HomeController extends Controller {

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     * @Get("/home", as="home")
     */
    public function index() {
        return view('home');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     * @Get("/", as="welcome")
     * @Middleware({"web", "guest"})
     */
    public function welcome() {
        return view('welcome');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     * @Get("/oauth-clients", as="oauthClients")
     */
    public function oauthClients() {
        return view('oauth-clients');
    }

}
