<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Model\Category;
use App\Model\Product;
use App\Model\Subcategory;
use Illuminate\Http\Request;

class FrontendController extends FrontendBaseController
{
    function index(){
        $data['categories'] = Category::all();
        $data['latest_products'] = Product::orderBy('created_at','desc')->limit(6)->get();

        return view($this->loadDataToView('frontend.frontend.index'),compact('data'));
    }

    function subcategory($slug){
        $data['subcategory'] = Subcategory::where('slug',$slug)->first();
        $data['products'] = $data['subcategory']->products()->get();
        return view($this->loadDataToView('frontend.frontend.subcategory'),compact('data'));
    }
}
