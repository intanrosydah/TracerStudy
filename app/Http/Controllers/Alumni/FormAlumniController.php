<?php

namespace App\Http\Controllers\Alumni;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FormAlumniController extends Controller
{
    public function index()
    {
        // if (Auth::user()->role == 'User') {
            return view('form-alumni');
        // }
    }
}
