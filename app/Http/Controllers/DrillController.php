<?php

namespace App\Http\Controllers;

use App\Models\Drill;
use App\Models\Tag;
use Illuminate\Http\Request;

class DrillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $drills = Drill::latest()->paginate(5);

        return view('drills.index',compact('drills'))
            ->with(request()->input('page'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("drills.create");
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
            'description' => 'required',
        ]);

        $drill = new Drill();        
        $drill->name = $request['name'];
        $drill->description = $request['description'];
        $drill->save();

        return redirect()->route('drills.index')
                        ->with('success','Drill created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Drill  $drill
     * @return \Illuminate\Http\Response
     */
    public function show(Drill $drill)
    {
        return view('drills.show',compact('drill'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Drill  $drill
     * @return \Illuminate\Http\Response
     */
    public function edit(Drill $drill)
    {
        $tags = Tag::all();
        return view('drills.edit',compact('drill'),compact('tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Drill  $drill
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Drill $drill)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);

        

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Drill  $drill
     * @return \Illuminate\Http\Response
     */
    public function destroy(Drill $drill)
    {
        $drill->delete();

        return redirect()->route('drills.index')
                        ->with('success','Drill deleted successfully');
    }
}
