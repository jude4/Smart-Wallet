<?php

namespace App\Http\Controllers;

use App\User;
use App\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index(Request $request)
    {
        $transactions = Transaction::with('users')->where('sender_id', $request->id)
                                        ->orWhere('reciever_id', $request->id)
                                        ->get();
       
        // return $sender = User::find($request->id)->name;
        //  $transactions->put('sender', $sender);
        return response()->json($transactions);
    }

}
