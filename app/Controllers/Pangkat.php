<?php

namespace App\Controllers;

class Pangkat extends BaseController
{
    public function index(): string
    {
        return view('pangkat/index');
    }
}
