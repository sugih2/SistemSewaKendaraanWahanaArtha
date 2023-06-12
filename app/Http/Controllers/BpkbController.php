<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Auth;
use App\User;
use App\Kendaraan;
use App\BPKB;

use Illuminate\Http\Request;

class BpkbController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->role == 'Pengurus') {
            $bpkbs = Bpkb::all();
            return view('pengurus.bpkb.index', compact('bpkbs'));
        } else {
            $bpkbs = Bpkb::all();
            return view('admin.bpkb.index', compact('bpkbs'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.bpkb.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Kendaraan::create($request->all());
        BPKB::create($request->all());
        
        
        return redirect('bpkb');
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
        return view('bpkb.edit', compact('bpkbs'));
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
        $bpkbs->update($request->all());
        return redirect('bpkbs');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //$kendaraans->delete();
        //return redirect('kendaraans');
    }
}
