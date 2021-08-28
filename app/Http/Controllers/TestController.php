<?php

namespace App\Http\Controllers;

use App\Events\PostCreatedEvent;
use App\Mail\TestMail;
use App\Mail\TestMarkdownMail;
use App\Models\Category;
use App\Models\Post;
use App\Repository\CategoryRepositoryInterface;
use App\Repository\PostRepositoryInterface;
use App\Scopes\VisibleScope;
use Database\Factories\CategoryFactory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Mail;

class TestController extends Controller
{
    private $categoryRepository;
    private $postRepository;
    
    public function __construct(
        CategoryRepositoryInterface $categoryRepository, 
        PostRepositoryInterface $postRepository
    )
    {
        $this->categoryRepository = $categoryRepository;
        $this->postRepository     = $postRepository;
        // $this->middleware('auth')->except('bar');
    }

    public function index() {
        // Category::with('posts')->get()
        return view('test.index', [
            "categories" => $this->categoryRepository->all()
        ]);
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

    public function delete($id) {
        $post = Post::findOrFail($id);
        $post->delete();

        // restore()
        // forceDelete()

        return redirect()->route('home');
    }

    public function posts() {
        return view('test.posts', [
            "posts" => Post::paginate(3)
        ]);
    }

    public function show($id) {
        dd(
            $this->postRepository->show($id)
        );
    }

    public function is_visible() {
        dd(
            Post::withoutGlobalScope(VisibleScope::class)->category()->get()
        );
    }

    // public function create() {
    //     $post = Post::create([
    //         "title"       => "test 1",
    //         "description" => "test 1"
    //     ]);

    //     event(new PostCreatedEvent($post));
    // }
}
