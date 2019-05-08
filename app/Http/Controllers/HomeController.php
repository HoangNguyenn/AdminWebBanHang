<?php


namespace App\Http\Controllers;


class HomeController
{
    public function index()
    {
        return view('home');
    }
    public function test()
    {
        return view('testhome');
    }

}