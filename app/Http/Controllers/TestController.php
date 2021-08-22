<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class TestController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth')->except('bar');
    }

    public function foo() {
        // Define in the AuthServiceProvider file
        if (! Gate::allows('access-admin')) {
            abort(403);
        }

        return view('test.foo');
    }

    public function bar() {
        return view('test.bar');
    }
}
