<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Posts;
use App\Models\Poststatuses;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display all posts.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');

        $posts = Posts::query()
            ->when($search, function ($query) use ($search) {
                $query->where('title', 'like', "%{$search}%")
                      ->orWhere('body', 'like', "%{$search}%");
            })
            ->latest()
            ->paginate(6)
            ->withQueryString();

        return view('index', compact('posts', 'search'));
    }


    /**
     * Show create post form.
     */
    public function create()
    {
        $post_statuses = Poststatuses::all();

        return view('create', compact('post_statuses'));
    }


    /**
     * Store new post.
     */
    public function store(Request $request)
    {
        $postData = $request->validate([
            'title' => 'required|string|max:255',

            'body' => 'required|string',

            'poststatus_id' => 'required|exists:poststatuses,id',
        ]);

        // Temporary user
        $postData['user_id'] = 1;

        $post = Posts::create($postData);

        if ($post) {
            return redirect()
                ->route('posts.show', $post)
                ->with('success', 'Post created successfully!');
        }

        return redirect()
            ->route('posts.create')
            ->with('error', 'Post creation failed.');
    }


    /**
     * Display one post.
     */
    public function show(Posts $post)
    {
        return view('show', compact('post'));
    }


    /**
     * Show edit form.
     */
    public function edit(Posts $post)
    {
        $post_statuses = Poststatuses::all();

        return view('edit', compact('post', 'post_statuses'));
    }


    /**
     * Update post.
     */
    public function update(Request $request, Posts $post)
    {
        $postData = $request->validate([
            'title' => 'required|string|max:255',

            'body' => 'required|string',

            'poststatus_id' => 'required|exists:poststatuses,id',
        ]);

        $post->update($postData);

        return redirect()
            ->route('posts.show', $post)
            ->with('success', 'Post updated successfully!');
    }


    /**
     * Delete post.
     */
    public function destroy(Posts $post)
    {
        $post->delete();

        return redirect()
            ->route('posts.index')
            ->with('success', 'Post deleted successfully!');
    }
}