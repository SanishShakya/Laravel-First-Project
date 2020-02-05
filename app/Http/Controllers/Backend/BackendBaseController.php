<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Intervention\Image\Facades\Image;

class BackendBaseController extends Controller
{

    protected function loadDataToView($view_path){
        View::composer($view_path, function ($view) {
            $view->with('base_route', $this->base_route);
            $view->with('view_path', $this->view_path);

            if (isset($this->page_method)){
                $view->with('page_method', $this->page_method);
            }
            if (isset($this->page_title)){
                $view->with('page_title', $this->page_title);
            }
            $view->with('panel',$this->panel);
        });

        return $view_path;

    }

    protected function uploadImage(Request $request, $imageName){

        if($image = $request->file($imageName)){
            $newImageName = date('YmdHis')."_".$image->getClientOriginalName();
            if($image->move($this->image_path, $newImageName)){
                //code for image resize
                foreach (config('image_dimensions.backend.'.$this->folder_name) as $dimension) {
                    //open and resize and image file
                    $img = Image::make($this->image_path . $newImageName)->resize($dimension['width'], $dimension['height']);
                    //save the same file as jpg with default quality
                    $img->save($this->image_path . $dimension['width'] . '_' . $dimension['height'] . '_' . $newImageName);
                }
                    return $newImageName;
                }else{
                    return null;
                }
            }

    }

}
