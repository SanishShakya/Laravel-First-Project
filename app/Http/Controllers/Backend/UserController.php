<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\Backend\UserRequest;
use App\Model\Role;
use App\User;
use Illuminate\Database\DatabaseManager;
use Illuminate\Http\Request;
use Mockery\Exception;

class UserController extends BackendBaseController
{

    protected $base_route  = 'backend.user';
    protected $view_path   = 'backend.user';
    protected $panel       = 'User';
    protected  $page_title,$page_method,$image_path;
    protected  $folder_name = 'user';
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
            $data['rows'] = User::all();
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
        $data['roles'] = Role::pluck('name','id');

        return view($this->loadDataToView($this->view_path.'.create'),compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {

        try{
            $record = User::create($request->all());
            if ($record){
                    return redirect()->route($this->base_route . '.index')->with('success',$this->panel . ' created successfully');

                }else{
                    return back()->with('error', $this->panel . ' creation failed');
                }
        } catch(Exception $e){
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
        $data['row'] = User::find($id);

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
        $data['roles'] = Role::pluck('name','id');
        $data['row'] = User::find($id);
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
        $data['row'] = User::find($id);
        $request->request->add(['updated_by' => auth()->user()->id]);
        $data['row']->update($request->all());
        return redirect()->route($this->base_route . '.index')->with('success',$this->panel . ' updated successfully');;

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
            User::destroy($id);
            return redirect()->route($this->base_route . '.index')->with('success',$this->panel . ' deleted successfully');
        } catch (Exception $exception){
            return redirect()->route($this->base_route . '.index')->with('exception',$exception->getMessage());
        }

    }
}
