<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Item;

class ItemController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function search(Request $request)
    {

    }

    public function showDetail()
    {
        return view('detail');
    }
}
