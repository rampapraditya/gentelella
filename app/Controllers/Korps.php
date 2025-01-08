<?php

namespace App\Controllers;

class Korps extends BaseController
{
    public function index(): string
    {
        return view('korps/index');
    }
}
