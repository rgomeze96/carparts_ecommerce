<?php


namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\ToolLoan;

class AdminToolLoanController extends Controller
{
    public function list()
    {
        $data = [];
        $data["title"] = "Loaned Tools List";
        $data["loanedTools"] = ToolLoan::orderByDesc('id')->get();
        return view('admin.tool.list')->with("data", $data);
    }
    public function create()
    {
        $data = []; //to be sent to the view
        $data["title"] = "Tool Loan Service";

        return view('admin.tool.create')->with("data", $data);
    }

    public function save(Request $request)
    {
        ToolLoan::validate($request);
        ToolLoan::create($request->only(["userId", "productId", "description", "depositAmount", "loanDate", "returnDate"]));
        return redirect()->route('admin.toolloan.create')->with('success', 'Tool loan created successfully!');
    }
    public function show($id)
    {
        $data = []; //to be sent to the view
        $toolLoan = ToolLoan::findOrFail($id);
        $data["title"] = $toolLoan->getProductName();
        $data["toolLoan"] = $toolLoan;
        if($toolLoan){
            return view('tool.show')->with("data", $data);
        } else {
            return redirect()->route('tool.index')->with('error', 'Error showing tool loan, please try again');
        }
    }
    public function destroy($id){
        ToolLoan::destroy($id);
        return redirect()->route('tool.index')->with('success', 'Tool Loan deleted successfully');
    }
}
