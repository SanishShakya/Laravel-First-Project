<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\Backend\ProductRequest;
use App\Model\Attribute;
use App\Model\Category;
use App\Model\Image;
use App\Model\Subcategory;
use App\Model\Product;
use App\Model\Tag;
use App\Model\Unit;
use Illuminate\Database\DatabaseManager;
use Illuminate\Http\Request;
use Mockery\Exception;

class ProductController extends BackendBaseController
{

    protected $base_route  = 'backend.product';
    protected $view_path   = 'backend.product';
    protected $panel       = 'Product';
    protected  $page_title,$page_method,$image_path;
    protected  $folder_name = 'product';
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
            $data['rows'] = Product::all();
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
        $data['categories'] = Category::pluck('name','id');
        $data['subcategories'] = Subcategory::pluck('name','id');
        $data['units'] = Unit::pluck('name','id');
        $data['tags'] = Tag::pluck('name','id');


        return view($this->loadDataToView($this->view_path.'.create'),compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {


        $this->databaseManager->beginTransaction();
        try{
            $request->request->add(['shortdescription' => $request->input('short_description')]);
            $request->request->add(['created_by' => auth()->user()->id]);
            $request->request->add(['stock' => $request->input('quantity')]);
            $record = Product::create($request->all());
            if ($record){
                $record->tags()->attach($request->input('tag_id'));

                $attribute_name = $request->input('attribute_name');
                $attribute_value = $request->input('attribute_value');
                $image_title = $request->input('image_title');

                $attribute_data['product_id'] = $record->id;
                $image_data['product_id'] = $record->id;

                if($request->hasFile('product_image')) {
                    $files  = $request->file('product_image');
                    foreach ($files as $key => $file){
                        $image_data['image'] = $this->uploadImage1($file);
                        $image_data['title'] =  $image_title[$key];
                        Image::create($image_data);
                    }
                }
                for($i = 0;$i < count($attribute_name);$i++){
                    if(!empty($attribute_name[$i])){
                        $attribute_data['name'] = $attribute_name[$i];
                        $attribute_data['value'] = $attribute_value[$i];
                        Attribute::create($attribute_data);
                    }
                }
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
        $data['row'] = Product::find($id);

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
        $data['categories'] = Category::pluck('name','id');
        $data['row'] = Product::find($id);
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
        $data['row'] = Product::find($id);
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
            Product::destroy($id);
            return redirect()->route($this->base_route . '.index')->with('success',$this->panel . ' deleted successfully');
        } catch (Exception $exception){
            return redirect()->route($this->base_route . '.index')->with('exception',$exception->getMessage());
        }

    }
}
