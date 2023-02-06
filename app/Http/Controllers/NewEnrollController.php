<?php

namespace App\Http\Controllers;

use App\Models\Enroll;
use App\Models\Option;
use Illuminate\Http\Request;

class NewEnrollController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function inscriptionFunc()
    {
        $options = Option::all();
        return view('frontend.enroll.create_enroll', compact([
            'options'
        ]));
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate the form data
        /*

'phone' => 'required|unique:enrolls,phone',
        'email' => 'required|unique:enrolls,email'
        */
        $validatedData = $request->validate([
            'lastname' => 'required|string|min:3|max:255',
            'firstname' => 'required|string|min:3|max:255',
            'gender' => 'required|in:Female,Male',
            'phone' => 'required|string|max:255|unique:enrolls,phone',
            'email' => 'nullable|email|unique:enrolls,email',
            'date_of_birth' => 'required|date',
            'option_id' => 'required|exists:options,id',
        ]);

        // Generate code before inserting
        $request->merge([
            'code' => substr($request->firstname, 0, 1) . substr($request->lastname, 0, 1) . "-" . mt_rand(100000, 999999)
        ]);

        // Save the enroll in the database
        if ($validatedData) {
            Enroll::create($validatedData);
            return redirect()->route('newEnroll.form')->with('success', 'Inscription reussie!');
        } else {
            return redirect()->route('newEnroll.form')->with('error', 'Quelque chose s\'est mal passe!');
        }
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
    public function destroy($id)
    {
        //
    }
}
