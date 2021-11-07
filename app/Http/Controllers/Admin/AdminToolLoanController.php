<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\User;
use App\Models\ToolLoan;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminToolLoanController extends Controller
{
    public function list()
    {
        $data = [];
        $data["title"] = "Loaned Tools List";
        $data["loanedTools"] = ToolLoan::orderByDesc('id')->get();
        $data["users"] = User::where('role', 'client')->get();
        $data["tools"] = Product::where('category', 'Tool')->get();
        if (User::where('id', Auth::id())->first()->getRole() == 'admin') {
            return view('admin.tool.list')->with("data", $data);
        } else {
            return redirect()->route('home.index')->with('error', __('auth.unauthorized'));
        }
    }
    public function create()
    {
        $data = []; //to be sent to the view
        $data["title"] = "Tool Loan Service";
        $data["tools"] = Product::where('category', 'Tool')->get();
        $data["users"] = User::where('role', 'client')->get();

        return view('admin.tool.create')->with("data", $data);
    }
    public function save(Request $request)
    {
        ToolLoan::validate($request);
        $newToolLoan = new ToolLoan;
        $newToolLoan->setUserId($request->userId);
        $newToolLoan->setProductId($request->productId);
        $newToolLoan->setDescription($request->description);
        $newToolLoan->setDepositAmount($request->depositAmount);
        $newToolLoan->setLoanDate($request->loanDate);
        $newToolLoan->setReturnData($request->returnDate);
        $newToolLoan->save();
        //ToolLoan::create($request->only(["userId", "productId", "description", "depositAmount", "loanDate",
        //    "returnDate"]));
        return redirect()->route('admin.toolloan.create')->with('success', __('toolloan.controller.created'));
    }
    public function update(Request $request, $id)
    {
        ToolLoan::modifyValidate($request);
        $toolLoanToUpdate = ToolLoan::findOrFail($id);
        $toolLoanToUpdate->setUserId($request->userId);
        if (is_numeric($request->productId) == true) {
            $toolLoanToUpdate->setProductId($request->productId);
        }
        $toolLoanToUpdate->setDescription($request->description);
        if (is_numeric($request->depositAmount) == true) {
            $toolLoanToUpdate->setDepositAmount($request->depositAmount);
        }
        $toolLoanToUpdate->setLoanDate($request->loanDate);
        $toolLoanToUpdate->setReturnData($request->returnDate);
        $toolLoanToUpdate->save();
        return redirect()->route('admin.toolloan.list')->with('success', __('toolloan.controller.updated'));
    }
    public function show($id)
    {
        $data = []; //to be sent to the view
        $toolLoan = ToolLoan::findOrFail($id);
        $data["title"] = $toolLoan->getProductName();
        $data["toolLoan"] = $toolLoan;
        if ($toolLoan) {
            return view('tool.show')->with("data", $data);
        } else {
            return redirect()->route('tool.index')->with('error', 'Error showing tool loan, please try again');
        }
    }
    public function destroy($id)
    {
        ToolLoan::destroy($id);
        return redirect()->route('admin.toolloan.list')->with('success', __('toolloan.controller.deleted'));
    }
}
