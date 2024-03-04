<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EmployeeController extends Controller
{
    public function index(Request $request)
    {
        return view('employees.index');
    }

    public function fetchemployee()
    {
        $employees = Employee::all();
        return response()->json([
            'employees' => $employees,
        ]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:191',
            'email' => 'required|email|max:191',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->messages()
            ]);
        } else {
            $employee = new Employee;
            $employee->name = $request->input('name');
            $employee->email = $request->input('email');
            $employee->save();
            return response()->json([
                'status' => 200,
                'message' => 'Employee Added Successfully.'
            ]);
        }
    }

    public function edit($id)
    {
        $employee = Employee::find($id);
        if ($employee) {
            return response()->json([
                'employee' => $employee,
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'No Employee Found.'
            ]);
        }
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:191',
            'email' => 'required|email|max:191',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->messages()
            ]);
        } else {
            $employee = Employee::find($id);
            if ($employee) {
                $employee->name = $request->input('name');
                $employee->email = $request->input('email');
                $employee->update();
                return response()->json([
                    'status' => 200,
                    'message' => 'Employee Updated Successfully.'
                ]);
            } else {
                return response()->json([
                    'status' => 404,
                    'message' => 'No Employee Found.'
                ]);
            }
        }
    }

    public function destroy($id)
    {
        $employee = Employee::find($id);
        if ($employee) {
            $employee->delete();
            return response()->json([
                'status' => 200,
                'message' => 'Employee Deleted Successfully.'
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'No Employee Found.'
            ]);
        }
    }
}
