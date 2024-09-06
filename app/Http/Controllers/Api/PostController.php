<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\PostResource;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function categories()
    {
        $categories = Category::all();
        return CategoryResource::collection($categories);
    }

    public function latest_post()
    {
        $latest_news = Post::where('status', 'approved')->orderBy('id', 'desc')->first();
        return new PostResource($latest_news);
    }

    public function trending_posts()
    {
        $trending_posts = Post::where('status', 'approved')->orderBy('views', 'desc')->limit(8)->get();
        return PostResource::collection($trending_posts);
    }

    public function category($slug)
    {
        $category = Category::where('slug', $slug)->first();
        $posts = $category->posts()->paginate(1);
        return PostResource::collection($posts);
    }

    public function post($id)
    {
        $post = Post::find($id);
        $post->increment('views');
        return new PostResource($post);

    }
}
