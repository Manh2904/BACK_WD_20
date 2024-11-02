<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\User;
use App\Http\Requests\UserRequestUpdate;
use Illuminate\Support\Facades\Hash;
class UpdateUserController extends Controller
{
    public function edit(){
        $category =Category::all();
        $viewData=[
            'category'=>$category,
            'title_page'=>'Chỉnh sửa thông tin cá nhân'
        ];
        return view('user.edit',$viewData);
    }

    public function change_password(){
        $category =Category::all();
        $viewData=[
            'category'=>$category,
            'title_page'=>'Đổi mật khẩu'
        ];
        return view('user.change_password',$viewData);

    }

    public function new_address(){
        $category =Category::all();
        $viewData=[
            'category'=>$category,
            'title_page'=>'Thêm mới địa chỉ'
        ];
        return view('user.new_address',$viewData);
    }

    public function edit_address(){
        $category =Category::all();
        $viewData=[
            'category'=>$category,
            'title_page'=>'Đổi địa chỉ'
        ];
        return view('user.edit_address',$viewData);
    }

    
    public function store(Request $request){
        $category =Category::all();
        $data =$request->except('_token');
        if(isset($data['password']))
        $data['password'] = Hash::make($data['password']);
        $user = User::find(\Auth::user()->id);
        $user->update($data);

        return redirect()->route('get.user.index')->with('status','Cập nhật thành công');
    }
}
