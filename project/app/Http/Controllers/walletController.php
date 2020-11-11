<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Generalsetting;
use Validator;
use DB;
class walletController extends Controller
{
    public function admin_update(){
        return view('wallet.admin');
    }

    public function update_wallet(Request $request){
        $valid = Validator::make($request->all(), [
            'amount' => 'required'
        ]);
        if($valid->fails()){
            return response()->json(['status' => 0,  'message' => 'Amount is required']);
        }

        if(DB::update("UPDATE `generalsettings` SET `wallet_amount` = ? WHERE `generalsettings`.`id` = 1", [$request->get('amount')])){
            return response()->json(['status' => 1,  'message' => 'Amount successfully updated']);
        }else{
            return response()->json(['status' => 0,  'message' => 'You cannot update same amount again']);
        }
    }


    public function user(){
        return view('wallet.user');
    }


    public function update_wallet_user(Request $request){

        $validate = Validator::make($request->all(), [
            'update_wallet' => 'required|integer'
        ]);
        if($validate->fails()){
            return response()->json(['status' => 0, 'message' => 'Update_wallet is required']);
        }else{
            return response()->json(['status' => 1, 'message' => 'Wallet update success']);
        }

    }
}
