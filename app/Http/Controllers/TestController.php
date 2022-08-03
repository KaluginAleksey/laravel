<?php

namespace App\Http\Controllers;

class TestController extends Controller
{
    public function __invoke()
    {
        dd(42);
    }

}
