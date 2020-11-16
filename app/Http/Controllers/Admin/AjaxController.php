<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Models\InfoConfirms;

class AjaxController extends Controller
{
    public function check_mail(Request $request)
    {
        $email = $request->email;
        $check = User::where('email',$email)->first();

        if(is_null($check)){
            return 1;
        }else{
            return 2;
        }
    }

    public function get_status(Request $request)
    {
        $result                             = [];
        $id_shipment                        = $request->id;
        $info                               = InfoConfirms::where('id_shipment',$id_shipment)->get();
        foreach ($info as $key => $value) {
            $result[$key]['id']             = $value->id;
            $result[$key]['id_shipment']    = $value->id_shipment;
            $result[$key]['status']         = $value->status;
            $result[$key]['list_image']     = $value->list_image;
            $result[$key]['created']        = date('d-m-Y',strtotime($value->created_at));
        }
        $json_result                        = json_encode($result);
        return $json_result;
    }

}
