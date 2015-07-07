<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class MainController extends Controller
{
    /**
     * Display a Login page.
     *
     * @return Response
     */
    public function index()
    {
        return view('auth.login');
    }
}
