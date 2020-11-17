<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        parent::__construct();

    }

    /**
     * Show the application dashboard.
     *
     * @return Redirector|View
     */
    public function index()
    {
        if (Auth::user()->role->id == \App\UserRole::ROLE_ADMIN) {
            return redirect(route('test-results.index'));
        } else {
            return view('home');
        }
    }



}
