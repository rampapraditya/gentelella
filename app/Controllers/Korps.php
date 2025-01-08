<?php

namespace App\Controllers;

use App\Models\Mcustom;

class Korps extends BaseController
{
    
    private $mcustom;
    
    public function __construct() {
        $this->mcustom = new Mcustom();
    }
    
    public function index()
    {
        $data['list'] = $this->mcustom->getAll("korps");
        
        return view('korps/index', $data);
    }
}
