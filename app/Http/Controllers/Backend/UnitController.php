<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\UnitRequest;
use App\Model\Unit;
use Illuminate\Http\Request;

class UnitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            $data['rows'] = Unit::all();
            return view('backend.unit.index',compact('data'));
        }catch(Exception $e){
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
        return view('backend.unit.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UnitRequest $request)
    {
        try{
            $request->request->add(['created_by' => auth()->user()->id]);
            $unit = Unit::create($request->all());
            if($unit){
                return redirect()->route('backend.unit.index')->with('success','Unit Created Successfully');
            }else{
                return back()->with('error','Unit Creation Failed');
            }
        }catch(Exception $e){
            return redirect()->route('backend.unit.index')->with('exception',$e->getMessage());
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
        $data['row'] = Unit::find($id);
        return view('backend.unit.show',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['row'] = Unit::find($id);
        return view('backend.unit.edit',compact('data'));
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
            $data['row'] = Unit::find($id);
            $request->request->add(['updated_by' => auth()->user()->id]);
            $unit = $data['row']->update($request->all());
            if ($unit) {
                return redirect()->route('backend.unit.index')->with('success', 'Unit Updated Successfully');
            } else {
                return back()->with('error', 'Unit Creation Failed');
            }
        }catch(Exception $e){
            return redirect()->route('backend.unit.index')->with('exception',$e->getMessage());
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
            Unit::destroy($id);
            return redirect()->route('backend.unit.index')->with('success','Unit Deleted Successfully');
        }catch(Exception $e){
            return redirect()->route('backend.unit.index')->with('exception',$e.getMessage());

        }
    }
}
