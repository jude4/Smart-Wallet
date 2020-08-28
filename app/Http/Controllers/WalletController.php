<?php

namespace App\Http\Controllers;

use App\Account;
use App\Http\Resources\WalletResources;
use App\Transaction;
use App\User;
use App\Wallet;
use Illuminate\Http\Request;

class WalletController extends Controller
{
    public function index(Request $request)
    {
        $wallet = Wallet::where('user_id', $request->id)->first();
        $account_balance = number_format($wallet->account_balance);

        $user = User::find($request->id);

        $account = Account::where('user_id', $request->id)->first();

        return response()->json([
            'success',
            'account_balance' => $account_balance,
            'user' => $user,
            'account' => $account
        ]);
    }

    public function checkAccountBalance(Request $request)
    {
        $wallet = Wallet::where('user_id', $request->id)->first();
       

        if ($request->amount > $wallet->account_balance) {
            return response()->json('error');
        } else {
            return response()->json('success');
        }
    }

    public function proceed(Request $request) 
    {

        $account = Account::where('account_number', $request->account_number)->first();
        // Steps
            // 1. substract the money from the sender account wallet(balance)
                       
            $sender_wallet = Wallet::where('user_id', $request->id)->first();

            $sender_wallet->account_balance = $sender_wallet->account_balance - $request->amount;
            $sender_wallet->save();

           // 2. Add the money to the reciever account
           $reciever_wallet = Wallet::where('user_id', $account->user_id)->first();
           $reciever_wallet->account_balance = $reciever_wallet->account_balance + $request->amount;
           $reciever_wallet->save();
           
           

           

           // 3. Recored or store the transaction in the transation table
           // 'status' => '404,200,504'
           $transaction = Transaction::create([
               'sender_id' => $request->id,
               'reciever_id' => $account->user_id,
               'transaction_type' => 'Transfer',
               'amount' => $request->amount
               
           ]);
           
             // $sender = auth()->user()->name;
             $reciever = User::find($account->user_id)->name; 
             // 4. return success message.
             return response()->json([
                 'status' => 'success',
                 'reciever' => $reciever
              ]);

    }
}
