<?php

namespace Modules\Users\Http\Controllers;

use Auth;
use App\Entities\User;
use Illuminate\Routing\Controller;
use Modules\Users\Http\Requests\UpdateNameRequest;
use Modules\Users\Http\Requests\UpdateEmailRequest;
use Modules\Users\Http\Requests\UpdateAvatarRequest;

class ProfileController extends Controller
{
    public function index(){
       return view('modules.users.profile.index');
    }

    public function update_name(UpdateNameRequest $request, User $User){
        $data = $request->except(['_token', '_method', Auth::user()->id]);
        $User->edit(Auth::user()->id, $data);
        return redirect()->route('profile');
    }

    public function update_email(UpdateEmailRequest $request, User $User){
        $data = $request->except(['_token', '_method', Auth::user()->id]);
        $User->edit(Auth::user()->id, $data);
        return redirect()->route('profile');
    }

    public function update_avatar(UpdateAvatarRequest $request, User $User){
        $file = $request->file('avatar');

        $day = date('Y_m_d');
        $destinationPath = 'uploads/';
        $file->move($destinationPath,"$day". $file->getClientOriginalName());
        $file_name = $destinationPath.$day.$file->getClientOriginalName();

        $data = $request->except(['_token','avatar', '_method', Auth::user()->id]);
        $data['avatar'] = "/" . $file_name;

        $User->edit(Auth::user()->id, $data);
        return redirect()->route('profile');
    }
}
