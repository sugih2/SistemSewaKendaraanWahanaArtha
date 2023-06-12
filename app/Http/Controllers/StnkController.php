<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Auth;
use App\User;
use App\Kendaraan;
use App\STNK;

use Illuminate\Http\Request;

class StnkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->role == 'Pengurus') {
            $stnks = Stnk::all();
            return view('pengurus.stnk.index', compact('stnks'));
        } else {
            $stnks = Stnk::all();
            return view('admin.stnk.index', compact('stnks'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.stnk.create');
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
        STNK::create($request->all());
        
        
        return redirect('stnk');
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
        return view('stnk.edit', compact('stnks'));
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
        $stnks->update($request->all());
        return redirect('stnks');
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
