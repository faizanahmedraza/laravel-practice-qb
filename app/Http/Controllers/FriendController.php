<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FriendController extends Controller
{
    public function index()
    {
        dd(auth()->user()->friendShipIStarted()->get());
    }
}
