<?php

namespace Modules\Users\Http\Controllers;

use Auth;
use Mail;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use App\Entities\User;
use App\Entities\Payment;
class PaymentController extends Controller
{

    public function callback(Request $Request, Response $Response )
    {
        $data = $Request->all();
        $user_id = preg_replace('/[^0-9]/', '', $data['merchant_data']) * 1;
        $amount = $data['amount'];
        $status = $data['order_status'];
        //$string_data = serialize ($data);
        // !TODO Float maybe here! but int in database
        $points_rate = $amount * 100;

        if($status == 'approved'){

            User::find($user_id)->increment('points', $points_rate );

            Mail::send('users::mails.success_payment_mail', [
                'title' => "Your palanse is rised up on",
                'points_rate' => $points_rate], function ($message)
            {
                $message->from('info@sefltask.io', 'Self Tasker owner');
                $message->to(Auth::user()->email);

            });


            return view('users::profile.index');

        }else{

            return view('users::payment.error');
        }
    }

    public function error()
    {
        return view('users::payment.error');
    }

    public function success()
    {
        return view('users::payment.success');
    }

}
