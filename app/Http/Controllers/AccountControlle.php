<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Http\Request;

class AccountControlle extends Controller
{
    public function acc_view()
    {
        $account = Account::all();
        return view('layouts.account', ['accounts' => $account]);
    }
    public function account(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'type' => 'required',
            'balance' => 'required',
        ]);
        //save in user table
        $accounts = new Account();
        Account::create([
            'name' => $request->name,
            'type' => $request->type,
            'balance' => $request->balance,

        ]);

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
}
