<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Account;
use App\Models\Transaction;
use Illuminate\Http\Request;

class AccountControlle extends Controller
{
    public function acc_view()
    {
        $accounts = Account::all();
        $users = User::all();

        $user = auth()->user()->accounts()->get();
        return view('layouts.account', ['user' => $user]);
    }
    public function account(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'type' => 'required',
            'balance' => 'required',
        ]);
        //save in user table

        $account = Account::create([
            'name' => $request->name,
            'type' => $request->type,
            'balance' => $request->balance,


        ]);
        // $userid = User::find($request->user_id);
        $account->users()->attach(auth()->id());
        // $userids = [1];
        // $accounts->users()->attach($userids);

        return redirect('account')->with('success', 'register successfully');
    }

    //edit

    public function aedit($id)
    {

        $account = Account::find($id);
        return view('layouts.editaccount', ['accounts' => $account]);
    }
    public function aupdate(Request $request, $id)
    {
        $request->validate(
            [
                'name' => 'required',
                'type' => 'required',
                'balance' => 'required',

            ]
        );
        $account = Account::find($id);
        $account->name = $request->name;
        $account->type = $request->type;
        $account->balance = $request->balance;
        $account->save();
        return redirect(route('account'))->with('status', 'Updated succeesfully');
    }

    //delete acc
    public function destroy($id)
    {
        Account::destroy($id);
        return redirect(route('account'));
    }
    // public function destroy(Account $todo)
    // {
    //     $todo->steps->delete();
    //     $todo->delete();
    //     return redirect()->back()->with('message', 'Task is completely deleted');
    // }
    //add account
    public function addaccount()
    {
        return view('layouts.Addaccount');
    }
    //Transaction
    public function view_transaction()
    {
        //$transactions = Account::find(3);
        $transactions = Transaction::all();
        $accounts = Account::all();
        // $transaction = auth()->account()->transactions()->get();
        return view('layouts.transaction', ['transactions' => $transactions]);
    }
    public function add_transaction(Request $request)
    {
        //$id = Account::findOrFail();
        //validation
        // $request->validate([
        //     'type' => 'required',
        //     'amount' => 'required',
        //     'date' => 'required',
        //     'catagory' => 'required',
        // ]);

        //save data in database

        $transactions = Transaction::create([
            'type' => $request->type,
            // 'account_name' => $request->account_name,
            'amount' => $request->amount,
            'date' => $request->date,
            'catagory' => $request->catagory,
            'account_id' => $request->account_id,

        ]);
        return redirect('transaction')->with('success', 'add transaction successfully');
    }
    //edit transaction
    public function t_edit($id)
    {

        $transactions = Transaction::find($id);
        return view('layouts.edittransaction', ['transactions' => $transactions]);
    }
    public function t_update(Request $request, $id)
    {

        $transaction = Transaction::find($id);
        $transaction->type = $request->type;
        // $transaction->account_name = $request->account_name;
        $transaction->amount = $request->amount;
        $transaction->date = $request->date;
        $transaction->catagory = $request->catagory;
        $transaction->save();
        return redirect(route('transaction'))->with('status', 'Updated succeesfully');
    }

    //delete Transaction
    public function destroy_transaction($id)
    {
        Transaction::destroy($id);
        return redirect(route('transaction'));
    }
}
