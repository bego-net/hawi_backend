<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    // Show list of blogs
    public function index()
    {
        $blogs = Blog::latest()->paginate(5);
        return view('blogs.index', compact('blogs'));
    }

    // Show form to create a new blog
    public function create()
    {
        return view('blogs.create');
    }

    // Store blog in database
    public function store(Request $request)
    {
        $request->validate([
            'title'   => 'required|string|max:255',
            'content' => 'required|string',
            'author'  => 'nullable|string|max:100',
        ]);

        Blog::create($request->all());

        return redirect()->route('blog.index')->with('success', 'Blog created successfully.');
    }

    // Show a single blog
    public function show(Blog $blog)
    {
        return view('blogs.show', compact('blog'));
    }

    // Show edit form
    public function edit(Blog $blog)
    {
        return view('blogs.edit', compact('blog'));
    }

    // Update blog
    public function update(Request $request, Blog $blog)
    {
        $request->validate([
            'title'   => 'required|string|max:255',
            'content' => 'required|string',
            'author'  => 'nullable|string|max:100',
        ]);

        $blog->update($request->all());

        return redirect()->route('blog.index')->with('success', 'Blog updated successfully.');
    }

    // Delete blog
    public function destroy(Blog $blog)
    {
        $blog->delete();

        return redirect()->route('blog.index')->with('success', 'Blog deleted successfully.');
    }
}
