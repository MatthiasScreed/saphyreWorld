<?php

namespace App\Http\Controllers\front;

use App\Repositories\PostRepository;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;

class PostController extends Controller
{
    protected $postRepository;
    protected $nbrPages;

    public function __construct(PostRepository $postRepository)
    {
        $this->postRepository = $postRepository;
        $this->nbrPages = 6;
    }

    public function index()
    {
        $posts = $this->postRepository->getActiveOrderByDate($this->nbrPages);
        $heros = $this->postRepository->getHeros();

        return view('layouts.front.index', compact('posts', 'heros'));
    }

    public function show(Request $request, $slug)
    {
        $post = $this->postRepository->getPostBySlug($slug);

        return view('layouts.front.post', compact('post'));
    }

    public function category(Category $category)
    {
        $posts = $this->postRepository->getActiveOrderByDateForCategory($this->nbrPages, $category->slug);
        $title = __('Posts for category ') . '<trong>' . $category->title . '</strong>';

        return view('layouts.front.index', compact('posts', 'title'));
    }

    public function tag(Tag $tag)
    {
        $post = $this->postRepository->getActivateOrderByDateForTag($this->nbrPages, $tag->slug);
        $title = __('Posts for tag ') . $tag->tag . '</strong>';

        return view('layouts.front.index', compact('posts', 'title'));
    }
}
