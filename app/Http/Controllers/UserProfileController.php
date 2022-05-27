<?php

namespace App\Http\Controllers;

use App\Models\UserProfile;
use Illuminate\Http\Request;
use App\Http\Requests\UpdatePasswordRequest;
use App\Http\Requests\UpdateBasicInfoRequest;

class UserProfileController extends BackendBaseController
{
    private $model;
    protected $base_route = 'user_profile.';
    protected $view_path = 'backend.user_profile.';
    protected $panel = 'User Profile';
    protected $img_path = 'images/user_profile/';

    public function __construct(){
    $this->model = new UserProfile();
    }


    public function create(){

        $data = [];
        $user_id = auth()->user()->id;
        $data['row'] = UserProfile::where('user_id',$user_id)->first();
        // $data['row'] =  auth()->user()->userProfile;

        return view($this->__loadDataToView($this->view_path . 'create'),compact('data'));
    }

    public function updateBasicInfo(UpdateBasicInfoRequest $request){
       try{
            if($request->hasFile('image_field')){
                $image_name =$this->uploadImage($request);
                $request->request->add(['image'=>$image_name]);
            }
            $request->request->add(['user_id' => auth()->user()->id]);

            $this->model->updateOrCreate([
                'user_id' => auth()->user()->id,
            ],
                $request->all()
            );

            session()->flash('success_message', $this->panel.' Updated Successfully');

       }
        catch(\Exception $e){
           session()->flash('error_message','Something went wrong!');
       }

        return redirect()->back();
    }

    public function updatePassword(UpdatePasswordRequest $request){

        $hashed_password = bcrypt($request['new_password']);
        auth()->user()->update(['password' => $hashed_password ]);

        session()->flash('success_message','Password Updated Successfully !');
        return redirect()->back();
    }









}
