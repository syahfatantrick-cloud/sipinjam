<?php

namespace App\Http\Controllers;

class HaloController extends Controller
{
    public function index()
    {
        return 'Halo, Laravel!';
    }

    public function sapa($nama)
    {
        return 'Halo, ' . e($nama) . '!';
    }
}