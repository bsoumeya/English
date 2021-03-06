<?php

namespace English\Http\Controllers;

use English\Status;
use Illuminate\Http\Request;

class StatusesController extends Controller
{
    /**
     * StatusesController constructor.
     * Restrict access to write methods
     * for authenticated users only.
     * @param none
     * @return English\Http\Middleware\RedirectIfAuthenticated
     * @throws Illuminate\Auth\AuthenticationException
     */

    public function __construct()
    {
        $this->middleware('auth')->only('store', 'update', 'destroy');
    }

    /**
     * Display a listing of the statuses.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $statuses = Status::latest()->get();
        return view('statuses.index', compact('statuses'));
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
        $status = Status::create([
          'user_id' => auth()->id(),
          'body' => $request->body
        ]);
        return redirect($status->path());
    }

    /**
     * Display the specified resource.
     *
     * @param  \English\Status  $status
     * @return \Illuminate\Http\Response
     */
    public function show(Status $status)
    {
        return view('statuses.show', compact('status'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \English\Status  $status
     * @return \Illuminate\Http\Response
     */
    public function edit(Status $status)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \English\Status  $status
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Status $status)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \English\Status  $status
     * @return \Illuminate\Http\Response
     */
    public function destroy(Status $status)
    {
        //
    }
}
