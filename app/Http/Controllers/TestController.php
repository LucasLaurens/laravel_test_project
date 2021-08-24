<?php

namespace App\Http\Controllers;

use App\Events\PostCreatedEvent;
use App\Mail\TestMail;
use App\Mail\TestMarkdownMail;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Mail;

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
        // $user = ['email' => 'johndoe@test.com', 'name' => 'John Doe'];
        // Mail::to('aze2@aze.fr')->send(new TestMail($user));
        Mail::to('aze2@aze.fr')->send(new TestMarkdownMail());

        return view('test.bar');
    }

    public function create() {
        $post = Post::create([
            "title"       => "test 1",
            "description" => "test 1"
        ]);

        event(new PostCreatedEvent($post));
    }
}
