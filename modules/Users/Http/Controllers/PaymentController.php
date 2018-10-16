<?php

namespace Modules\Users\Http\Controllers;

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
        $user_id = preg_replace('/[^0-9]/', '', $data['merchant_data']);
        $amount = $data['amount'];
        $status = $data['order_status'];
        $string_data= serialize ($data);

        // !TODO Float maybe here! but int in database
        $points_rate = $amount * 100;

        if($status == 'approved'){

            User::find($user_id)->increment('points', $points_rate );
            Payment::create([
                'amount' => $points_rate,
                'user_id' => $user_id,
                'status' => $status,
                'info' => $string_data,
            ]);

            //send email


            return view('users::profile.index');

        }else{
            Payment::create([
                'amount' => $points_rate,
                'user_id' => $user_id,
                'status' => $status,
                'info' => $string_data,
            ]);
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
