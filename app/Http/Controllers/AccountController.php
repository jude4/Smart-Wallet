<?php

namespace App\Http\Controllers;

use App\Account;
use App\Http\Resources\AccountResources;
use App\Transaction;
use App\User;
use App\Wallet;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function index()
    {
        return AccountResources::collection(Account::all());
    }

    public function VerifyAccountNumber(Request $request)
    {
        $account = Account::where('account_number', $request->account_number)->first();

        if ($account == null) {
            return response()->json('error');
        } else {
            
            // $sender = auth()->user()->name;
            $reciever = User::find($account->user_id)->name; 
            // 4. return success message.
            return response()->json([
                'status' => 'success',
                'reciever' => $reciever
             ]);
        }
    }
}
