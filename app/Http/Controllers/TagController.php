<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Tag;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tags = Tag::orderBy("created_at", "desc")->paginate(10);

        return view('tags.index', ['tags' => $tags]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Tag $tag)
    {
        $events = $tag->events()->paginate(5);

        return view('tags.show', [
            'tag' => $tag,
            'events' => $events,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
