<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags = Tag::first()->paginate(10);

        return view('tags.index',compact('tags'))
            ->with(request()->input('page'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("tags.create");
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
            'name' => 'required',
        ]);

        Tag::create($request->all());

        return redirect()->route('tags.index')
                        ->with('success','Tag created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tag  $Tag
     * @return \Illuminate\Http\Response
     */
    public function show(Tag $tag)
    {
        $drills = $tag->drillTags()
            ->join("drills","drills.id","=","drill_tags.drill_id")
            ->where("drill_tags.tag_id","=",$tag->id)
            ->select('drills.id','drills.name','drills.description','drills.link')
            ->paginate(10);
        return view('tags.show',compact('tag','drills'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tag  $Tag
     * @return \Illuminate\Http\Response
     */
    public function edit(Tag $Tag)
    {
        return view('tags.edit',compact('Tag'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tag  $Tag
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tag $Tag)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tag  $Tag
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tag $Tag)
    {
        $Tag->delete();

        return redirect()->route('tags.index')
                        ->with('success','Tag deleted successfully');
    }
}
