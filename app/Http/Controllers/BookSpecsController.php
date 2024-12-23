<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookSpecsController extends Controller
{
    public function index($id){

       

        return view('bookSpecs')->with('bookID', $id);
    }
}
