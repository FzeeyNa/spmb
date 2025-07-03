<?php

namespace App\Controllers;

class My404 extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Sekolah Prestasi Prima'
        ];
        return view('my404', $data);
    }
}
