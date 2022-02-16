<?php

namespace App\Http\Controllers\Dashbord;

use App\Http\Controllers\Controller;
use App\Models\Dashbord\brand;
use App\Models\Dashbord\Category;
use App\Models\Dashbord\Product;
use App\Models\Dashbord\Tag;
use Illuminate\Http\Request;

class productController extends Controller
{
    public function view(){

        $data = Product::OrderBy('id','DESC')->paginate(20) ;
        return view('dashbord.products.view',compact('data'));
    }
    public function select($action){
        try{
            if($action == 'active'){
                $data = Product::OrderBy('id','DESC')->paginate(15)->where('is_active',1);
            }if($action == 'inactive'){
                $data = Product::OrderBy('id','DESC')->paginate(15)->where('is_active',0);
            }
            return view('dashbord.products.view',compact('data'));
        }catch (\Exception $ex){
            return redirect()->route('admin.products');
        }

    }
    public function createForm(){
        $cat = Category::select()->get();
        $brand = brand::select()->get();
        $tag = Tag::select()->get();
        return view('dashbord.products.add',compact(['cat','brand','tag']));
    }
}
