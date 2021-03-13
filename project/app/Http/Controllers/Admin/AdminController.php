<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Jenssegers\Agent\Agent;

class AdminController extends Controller
{
    public function index() {
        $agent = new Agent();
        $browser = $agent->browser();
        return view('admin.index', [
            'browser' => $browser,
        ]);
    }

    public function instruction() {
        return view('admin.instruction');
    }

}
