<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\GroupEmployee;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::select('*');
        if (request('search')) {
            $employees->where('fullname', 'Like', '%' . request('search') . '%');
            // ->orwhere($employees->group()->group_employees, 'Like', '%' . request('search') . '%');
        }
        $employees->orderBy('id', 'desc');
        $employees = $employees->paginate(5);
        return view('employees.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $groups = GroupEmployee::all();
        return view('employees.add', compact('groups'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required',
            'fullname' => 'required',
            'phone' => 'required',
            'general' => 'required',
            'birthday' => 'required',
            'cmnd' => 'required',
            'address' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->route('employees.create')
                        ->withErrors($validator)
                        ->withInput();
        }
        $employee = new Employee;
        $employee->fullname = $request->fullname;
        $employee->phone = $request->phone;
        $employee->general = $request->general;
        $employee->cmnd = $request->cmnd;
        $employee->groupE_id = $request->groupE_id;
        $employee->birthday = $request->birthday;
        $employee->email = $request->email;
        $employee->address = $request->address;
        $employee->save();
        return redirect()->route('employees.index')->with('message', ' product ' . $request->fullname . ' Addedd');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employee = Employee::findOrFail($id);
        $groups = GroupEmployee::all();
        return view('employees.edit', compact('employee', 'groups'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|unique',
            'fullname' => 'required',
            'phone' => 'required|max:11',
            'general' => 'required',
            'birthday' => 'required',
            'cmnd' => 'required|',
            'address' => 'required',
            'birthday' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->route('employees.create')
                        ->withErrors($validator)
                        ->withInput();
        }
        $employee = Employee::findOrFail($id);
        $employee->fullname = $request->fullname;
        $employee->phone = $request->phone;
        $employee->general = $request->general;
        $employee->cmnd = $request->cmnd;
        $employee->groupE_id = $request->groupE_id;
        $employee->birthday = $request->birthday;
        $employee->email = $request->email;
        $employee->address = $request->address;
        $employee->save();
        return redirect()->route('employees.index')->with('message', ' employee ' . $request->fullname . ' Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {

        $employee = Employee::findOrFail($id);
        $employee->delete();
        return redirect()->back()->with('message', ' employee ' . $request->fullname . ' Updated!');
    }
}
