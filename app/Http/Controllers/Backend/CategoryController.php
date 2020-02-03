<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\CategoryRequest;
use App\Model\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            $data['rows'] = Category::all();
            return view('backend.category.index',compact('data'));
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
        return view('backend.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        try{
            $request->request->add(['created_by' => auth()->user()->id]);
            $category = Category::create($request->all());
            if($category){
                return redirect()->route('backend.category.index')->with('success','Category Created Successfully');
            }else{
                return back()->with('error','Category Creation Failed');
            }
        }catch(Exception $e){
            return redirect()->route('backend.category.index')->with('exception',$e->getMessage());
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
        $data['row'] = Category::find($id);
        return view('backend.category.show',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['row'] = Category::find($id);
        return view('backend.category.edit',compact('data'));
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
            $data['row'] = Category::find($id);
            $request->request->add(['updated_by' => auth()->user()->id]);
            $category = $data['row']->update($request->all());
            if ($category) {
                return redirect()->route('backend.category.index')->with('success', 'Category Updated Successfully');
            } else {
                return back()->with('error', 'Category Creation Failed');
            }
        }catch(Exception $e){
            return redirect()->route('backend.category.index')->with('exception',$e->getMessage());
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
            Category::destroy($id);
            return redirect()->route('backend.category.index')->with('success','Category Deleted Successfully');
        }catch(Exception $e){
            return redirect()->route('backend.category.index')->with('exception',$e.getMessage());

        }
    }
}
