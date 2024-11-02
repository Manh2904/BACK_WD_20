<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequestNewPassword;
use App\Mail\ResetSuccess;
use App\Models\Category;
use App\Models\User;
use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Session;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */
    public function getEmailReset()
    {
        $reset = User::all();
        $category = Category::all();
        $viewData = [
            'category' => $category,
            'reset' => $reset,
            'title_page' => 'Quên mật khẩu'
        ];
        return view('auth.passwords.reset', $viewData);
    }

    public function checkMailResetPassword(Request $request)
    {
        $account = User::where('email', $request->email)->first();
        if ($account) {

            $token = Hash::make($account->email . $account->id);
            DB::table('password_resets')
                ->insert([
                    'email' => $account->email,
                    'token' => $token,
                    'created_at' => Carbon::now()
                ]);

            $link = route('get.new_password', ['email' => $account->email, '_token' => $token]);
            Mail::to($account->email)->send(new ResetSuccess($link));
            Session::flash('toastr', [
                'type' => 'success',
                'message' => 'Gửi email thành công'
            ]);
            return redirect()->to('/');
        }
        return redirect()->back();
    }

    public function NewPassword(Request $request)
    {
        $category = Category::all();
        $token = $request->_token;
        //check ton tai token
        $checkToken = DB::table('password_resets')
            ->where('token', $token)
            ->first();
        //check thoi gian tao token (qua 3 phut se huy)
        $now = Carbon::now();
        if ($now->diffInMinutes($checkToken->created_at) > 1) {
            $email = $request->email;
            DB::table('password_resets')->where('email', $email)->delete();
            return redirect()->to('/');
        }
        if (!$checkToken) return redirect()->to('/');
        $viewData = [
            'category' => $category,
            'title_page' => 'Đổi mật khẩu'
        ];
        return view('auth.passwords.reset_password', $viewData);
    }

    public function SavePassword(UserRequestNewPassword $request)
    {
        $password = $request->password;
        $email = $request->email;

        $data['password'] = Hash::make($password);
        DB::table('users')->where('email', $email)->update($data);
        DB::table('password_resets')->where('email', $email)->delete();
        return redirect()->route('get.login');
    }
}
