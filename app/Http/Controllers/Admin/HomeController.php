<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

class HomeController extends Controller
{
    /**
     * Show the application's login form
     *
     * @return view
     */
    public function index(): view
    {
        $data              = [];
        $data['main_menu'] = 'dashboard';

        return view('admin.home', $data);
    }

}
