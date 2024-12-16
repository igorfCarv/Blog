<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Post;

class ShowController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public $post;
    public function __invoke(Request $request)
    {
        $this->post = Post::all();
        return view('blog',[
            'featuredPosts' => Post::published()->featured()->latest('published_at')->take(3)->get(),
            'latestPosts' => Post::published()->latest('published_at')->take(9)->get()
        ]);
    }

    
}
