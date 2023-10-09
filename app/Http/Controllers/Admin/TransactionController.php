<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\WalletRequest;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class TransactionController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware(["role:superAdmin"]);
    }

    public function index()
    {
        return view("admin.transactions.index");
    }

    public function data(Request $request)
    {
        if($request->ajax()){
            $transactions = Transaction::select();

            return DataTables::of($transactions)
                ->addIndexColumn()
                ->addColumn('actions', "admin.transactions.dataTables.actions")
                ->rawColumns(['actions'])
                ->make(true);
        }
    }

    public function edit(Transaction $transaction)
    {
        return view("admin.transactions.edit", [
            "transaction" => $transaction
        ]);
    }

    public function update(WalletRequest $request, $userId, $transactionId)
    {
        $validated = $request->validated();
        $user = User::firstWhere("id", $userId);
        $transaction = Transaction::firstWhere("id", $transactionId);
        $user->update($validated);
        $transaction->update([
            "status" => "The money has been sent"
        ]);
        return redirect()->route("admin.transactions.index")->with("status", "The money has been sent successfully");
    }

    public function destroy(Transaction $transaction)
    {
        $transaction->delete();
        return redirect()->route("admin.transactions.index")->with("status", "The transaction has been deleted successfully");
    }
}