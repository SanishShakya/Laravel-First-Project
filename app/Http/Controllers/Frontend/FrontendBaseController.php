<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Model\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class FrontendBaseController extends Controller
{
    protected function loadDataToView($view_path){
        View::composer($view_path, function ($view){
            $categories = Category::where('status',1)->orderBy('rank')->get();
            $view->with('menu_categories',$categories);
        });
        return $view_path;
    }
}
