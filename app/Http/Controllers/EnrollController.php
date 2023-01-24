<?php

namespace App\Http\Controllers;

use App\Models\Enroll;
use App\Http\Requests\StoreEnrollRequest;
use App\Http\Requests\UpdateEnrollRequest;

class EnrollController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Http\Requests\StoreEnrollRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEnrollRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Enroll  $enroll
     * @return \Illuminate\Http\Response
     */
    public function show(Enroll $enroll)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Enroll  $enroll
     * @return \Illuminate\Http\Response
     */
    public function edit(Enroll $enroll)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateEnrollRequest  $request
     * @param  \App\Models\Enroll  $enroll
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEnrollRequest $request, Enroll $enroll)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Enroll  $enroll
     * @return \Illuminate\Http\Response
     */
    public function destroy(Enroll $enroll)
    {
        //
    }
}
