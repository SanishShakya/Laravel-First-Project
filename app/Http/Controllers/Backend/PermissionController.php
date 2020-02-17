<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\Backend\PermissionRequest;
use App\Model\Category;
use App\Model\Module;
use App\Model\Permission;
use App\Model\Subcategory;
use Illuminate\Database\DatabaseManager;
use Illuminate\Http\Request;
use Mockery\Exception;

class PermissionController extends BackendBaseController
{

    protected $base_route  = 'backend.permission';
    protected $view_path   = 'backend.permission';
    protected $panel       = 'Permission';
    protected  $page_title,$page_method,$image_path;
    protected  $folder_name = 'permission';
    protected $databaseManager;


    function  __construct(DatabaseManager $databaseManager)
    {
        $this->databaseManager = $databaseManager;
        $this->image_path = public_path().DIRECTORY_SEPARATOR.'backend'.DIRECTORY_SEPARATOR.'images' . DIRECTORY_SEPARATOR.$this->folder_name.DIRECTORY_SEPARATOR;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->page_title = 'List';
        $this->page_method = 'index';

        try{
            $data['rows'] = Permission::all();
            return view($this->loadDataToView($this->view_path.'.index'),compact('data'));
        }catch (Exception $e) {
            redirect()->route('home')->flash('exception', $e->getMessage());
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->page_title = 'Create';
        $this->page_method = 'create';
        $data['modules'] = Module::pluck('name','id');
        return view($this->loadDataToView($this->view_path.'.create'),compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PermissionRequest $request)
    {


        $this->databaseManager->beginTransaction();
        try{
            $request->request->add(['created_by' => auth()->user()->id]);
            $record = Permission::create($request->all());
            if ($record){
                return redirect()->route($this->base_route . '.index')->with('success',$this->panel . ' created successfully');

            } else {
                return back()->with('error', $this->panel . ' creation failed');
            }
            $this->databaseManager->commit();
        } catch(Exception $e){
            $this->databaseManager->rollBack();
            return redirect()->route($this->base_route . '.index')->with('exception',$e->getMessage());
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
        $this->page_title = 'View';
        $this->page_method = 'show';
        $data['row'] = Permission::find($id);

        return view($this->loadDataToView($this->view_path.'.show'),compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->page_title = 'Edit';
        $this->page_method = 'edit';
        $data['modules'] = Module::pluck('name','id');
        $data['row'] = Permission::find($id);
        return view($this->loadDataToView($this->view_path.'.edit'),compact('data'));
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
        $data['row'] = Permission::find($id);
        $request->request->add(['updated_by' => auth()->user()->id]);
        $data['row']->update($request->all());
        return redirect()->route($this->base_route . '.index')->with('success',$this->panel . ' updated successfully');

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
            Permission::destroy($id);
            return redirect()->route($this->base_route . '.index')->with('success',$this->panel . ' deleted successfully');
        } catch (Exception $exception){
            return redirect()->route($this->base_route . '.index')->with('exception',$exception->getMessage());
        }

    }
}
