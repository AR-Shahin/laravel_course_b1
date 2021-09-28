<?php

namespace App\Http\Controllers\Admin;

use App\Actions\File;
use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\DocBlock\Tag as DocBlockTag;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags = Tag::latest()->get();
        return view('Backend.Tag.index', compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Backend.Tag.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required']
        ]);

        $tag = Tag::create([
            'name' => $request->name
        ]);
        if ($tag) {
            $this->notificationMessage();
            return redirect()->route('admin.tag.index');
        } else {
            return back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function show(Tag $tag)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function edit(Tag $tag)
    {
        return view('Backend.Tag.edit', compact('tag'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tag $tag)
    {
        $request->validate([
            'name' => "required|unique:tags,name,{$tag->id}"
        ]);

        $result = $tag->update([
            'name' => $request->name
        ]);
        if ($result) {
            $this->notificationMessage('Data Update Successfully!');
            return redirect()->route('admin.tag.index');
        } else {
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tag $tag)
    {
        File::delete($tag);
        $this->notificationMessage('Data Delete Successfully!');
        return redirect()->route('admin.tag.index');
    }
}
