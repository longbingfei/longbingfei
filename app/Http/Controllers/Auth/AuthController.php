<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class AuthController extends Controller
{
    public function __construct()
    {
        //
    }

    public function index()
    {
        return __CLASS__;
    }

}
