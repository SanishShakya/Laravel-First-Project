<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

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

}
