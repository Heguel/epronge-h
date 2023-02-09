<?php

namespace App\Http\Controllers;

use App\Models\Enroll;
use App\Models\Option;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Events\NewEnrollEvent;
use RealRashid\SweetAlert\Facades\Alert;

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
            'date_of_birth' => 'required|date|before:-12 years',
            'option_id' => 'required|exists:options,id',
        ]);

        // Generate code before inserting
        $code = Str::upper(substr($validatedData['lastname'], 0, 1) . substr($validatedData['firstname'], 0, 1) . "-" . mt_rand(100000, 999999));
        $validatedData['code'] = $code;


        // Save the enroll in the database
        if ($validatedData) {
            $newEnr = Enroll::create($validatedData);
            Alert::success('event-success-create-enroll', 'Inscription reussie!<br/> Veuillez conservez votre code pour valider votre inscription au secrétariat:<br/><br/> Code: ' . $newEnr->code);
            event('event-success-create-enroll', $newEnr);

            return redirect()->route('newEnroll.form')->with([
                'success' => 'Inscription reussie!',
                'info' => 'Veuillez conservez votre code pour valider votre inscription au secrétariat:\n Code: ' . $newEnr->code,
            ]);
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
