<?php

namespace App\Http\Controllers;

use App\Models\DynamicForm;
use Illuminate\Http\Request;

class DynamicFormController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        abort(403);
    }
    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.dynamic-form.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $form_builder = new DynamicForm();
        $form_builder->form = $request->form;
        $form_builder->save();

        return response()->json('Form Builder Added Successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(DynamicForm $dynamicForm)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DynamicForm $dynamicForm)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DynamicForm $dynamicForm)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DynamicForm $dynamicForm)
    {
        //
    }
}
