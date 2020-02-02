<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\TagRequest;
use Illuminate\Http\Request;
use App\Model\Tag;


class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            $data['rows'] = \App\Model\Tag::all();
            return view('backend.tag.index',compact('data'));
        }catch(Exceprion $e){
            redirect()->route('home')->flash('exception',$e->getMessage());
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.tag.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TagRequest $request)
    {
        try{
            $request->request->add(['created_by' => auth()->user()->id]);
            $tag = Tag::create($request->all());
            if($tag){
                return redirect()->route('backend.tag.index')->with('success','Tag Created Successfully');
            }else{
                return back()->with('error','Tag Creation Failed');
            }
        }catch(Exception $e){
            return redirect()->route('backend.tag.index')->with('exception',$e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['row'] = Tag::find($id);
        return view('backend.tag.show',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['row'] = Tag::find($id);
        return view('backend.tag.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $data['row'] = Tag::find($id);
            $request->request->add(['updated_by' => auth()->user()->id]);
            $tag = $data['row']->update($request->all());
            if ($tag) {
                return redirect()->route('backend.tag.index')->with('success', 'Tag Updated Successfully');
            } else {
                return back()->with('error', 'Tag Creation Failed');
            }
        }catch(Exception $e){
            return redirect()->route('backend.tag.index')->with('exception',$e->getMessage());
            }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            Tag::destroy($id);
            return redirect()->route('backend.tag.index')->with('success','Tag Deleted Successfully');
        }catch(Exception $e){
            return redirect()->route('backend.tag.index')->with('exception',$e.getMessage());

        }

    }
}
