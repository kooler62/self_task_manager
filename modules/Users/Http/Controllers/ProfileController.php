<?php

namespace Modules\Users\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Entities\User;
class ProfileController extends Controller
{
    public function index(){
       return view('modules.users.profile.index');
    }

    public function update_name(Request $request, User $User){
        $request->validate([
            'name' => 'required|min:3|max:255',
        ]);

        $data = $request->except(['_token', '_method', Auth::user()->id]);
        $User->edit(Auth::user()->id, $data);
        return redirect()->route('profile');
    }

    public function update_email(Request $request, User $User){
        $request->validate([
            'email' => 'required|email|unique:users,email',
        ]);

        $data = $request->except(['_token', '_method', Auth::user()->id]);
        $User->edit(Auth::user()->id, $data);
        return redirect()->route('profile');
    }

    public function update_avatar(Request $request, User $User){
        $request->validate([
            'avatar' => 'image',
        ]);
        $file = $request->file('avatar');

        $day = date('Y_m_d');
        $destinationPath = 'uploads/';
        $file->move($destinationPath,"$day". $file->getClientOriginalName());
        $file_name = $destinationPath.$day.$file->getClientOriginalName();

        $data = $request->except(['_token','avatar', '_method', Auth::user()->id]);
        $data['avatar'] = $file_name;

        $User->edit(Auth::user()->id, $data);
        return redirect()->route('profile');
    }

}
