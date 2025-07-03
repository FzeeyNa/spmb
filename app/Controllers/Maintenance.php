<?php

namespace App\Controllers;

class Maintenance extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Sekolah Prestasi Prima'
        ];
        return view('maintenance', $data);
    }
}
