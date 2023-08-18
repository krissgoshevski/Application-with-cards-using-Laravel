<?php

namespace App\Http\Controllers;

use  App\Models\Card;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function cards()
    {
        return view('admin.admin', ['cards' => Card::all()]);
    }
}
