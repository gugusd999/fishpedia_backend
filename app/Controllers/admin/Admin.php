<?php

namespace App\Controllers\admin;

use App\Controllers\BaseController;

class Admin extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'ADMIN - FisPEDIA',
        ];
        return view('back/home', $data);
    }



    //--------------------------------------------------------------------

}
