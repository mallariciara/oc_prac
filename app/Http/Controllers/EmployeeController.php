<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Response;
use Illuminate\Http\Request;
use App\Models\Employee;

class EmployeeController extends Controller
{
    public function index()
    {   
        $employees = Employee::all();
        return view ('employees.index', compact('employees'));
    }

    public function create()
    {
        return view ('employees.create');
    }


    public function store(Request $request)
    {
    $request->validate([
        'fname' => 'required|max:255|',
        'lname' => 'required|max:255|',
        'midname' => 'required|max:255|',
        'age' => 'required|',
        'address' => 'required|max:255|',
        'zip' => 'required|',
        
    ]);

    Employee::create($request->all());
    return redirect()->route('employees.index');
    }

    public function edit( int $id)
    {
        $employees = Employee::findOrFail($id);
        return view ('employees.edit', compact('employees'));
    }

    public function update(Request $request, int $id) {
        {
            $request->validate([
                'fname' => 'required|max:255|',
                'lname' => 'required|max:255|',
                'midname' => 'required|max:255|',
                'age' => 'required|',
                'address' => 'required|max:255|',
                'zip' => 'required|',
                
            ]);
        
            Employee::findOrFail($id)->update($request->all());
            return redirect ()->back()->with('status','Employee Updated Successfully!');
            }
    }

    public function confirmDelete(int $id)
    {
        $employee = Employee::findOrFail($id);
        return view('employees.delete', compact('employee'));
    }

    public function delete(int $id){
        $employee = Employee::findOrFail($id);
        $employee->delete();
        return redirect()->route('employees.index')->with('status','Employee Deleted');
    }
}
