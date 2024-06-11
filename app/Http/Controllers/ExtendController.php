<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExtendController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('extend.dashboard');
    }

    public function index1()
    {
        return view('extend.login');
    }

    public function index2()
    {
        return view('extend.spop');
    }

    public function index3()
    {
        return view('lspop.lspop');
    }
    public function index4()
    {
        return view('auth.user');
    }
    public function index5()
    {
        return view('spop.add_spop');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
