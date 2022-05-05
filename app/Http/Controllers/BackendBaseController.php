<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BackendBaseController extends Controller
{
    protected function __loadDataToView($viewPath)
    {
        view()->composer($viewPath,function($view)
        {
            $view->with('panel',$this->panel);
            $view->with('view_path',$this->view_path);
            $view->with('base_route',$this->base_route);
            $view->with('img_path',$this->img_path);

        });
        return $viewPath;
    }


    protected function uploadImage(Request $request){
        $image = $request->file('image_field');
        $image_name = time().'_'.$image->getClientOriginalName();
        $image->move($this->img_path,$image_name);
        return $image_name;

    }

    protected function deleteImage($image_name){
        $image = $this->img_path. $image_name;
        if(is_file($image)){
            unlink($image);
        }
    }
}
