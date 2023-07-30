<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use\App\Pengembalian;
use Illuminate\Support\Facades\Auth;
use App\User;

class PengembalianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pengembalians = Pengembalian::all();

        if (Auth::check()) {
            $user = Auth::user();
            if ($user->role == 'Admin') {
                return view('admin.Pengembalian.index', compact('pengembalians'));
            } else if ($user->role == 'Pengurus') {
                return view('pengurus.Pengembalian.index');
            } else if ($user->role == 'Akuntan') {
                return view('pengurus.Pengembalian.index');
            }
        }
        return view('auth.login');
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
        //
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

    public function approved(Request $request, $id)
    {
        //
    }

    public function reject(Request $request, $id)
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
