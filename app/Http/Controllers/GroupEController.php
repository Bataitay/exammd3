<?php

namespace App\Http\Controllers;

use App\Models\GroupEmployee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class GroupEController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $groups = GroupEmployee::all();
        return view('groupemployees.index', compact('groups'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('groupemployees.add');
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
            'group_employees' => 'required',

        ]);
        if ($validator->fails()) {
            return redirect()->route('groupEmployee.create')
                        ->withErrors($validator)
                        ->withInput();
        }
        $groups = new GroupEmployee;
        $groups->group_employees = $request->group_employees;
        $groups->save();
        return redirect()->route('groupEmployee.index')->with('message', ' group_employees ' . $request->group_employees . ' Addedd');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $group = GroupEmployee::findOrFail($id);
        $group->delete();
        return redirect()->route('groupEmployee.index')->with('message', ' group_employees ' . $request->group_employees . ' Updated!');
    }
}
