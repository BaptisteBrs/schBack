<?php

namespace App\Http\Controllers;

use App\Repositories\ConvocationRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ConvocationController extends Controller
{

    private ConvocationRepository $repo;

    public function __construct()
    {
        $this->middleware('auth:sanctum')->except('lastByCategory');
        $this->repo = new ConvocationRepository();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->can('view_convocations')) {

            return $this->repo->all();
        }
        return abort(401);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Auth::user()->can('store_convocations')) {

            $array = $request->all();
            return $this->repo->store($array);
        }
        return abort(401);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (Auth::user()->can('view_convocations')) {

            return $this->repo->show($id);
        }
        return abort(401);
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
        if (Auth::user()->can('udpate_convocations')) {

            $array = $request->all();
            return $this->repo->update($array, $id);
        }
        return abort(401);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Auth::user()->can('delete_convocations')) {

            return $this->repo->delete($id);
        }
        return abort(401);
    }


    public function lastByCategory(int $category)
    {
        return $this->repo->lastByCategory($category);
    }
}
