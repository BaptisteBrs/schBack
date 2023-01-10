<?php

namespace App\Http\Controllers;

use App\Repositories\GameRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GameController extends Controller
{

    private GameRepository $repo;

    public function __construct()
    {
        $this->middleware('auth:sanctum')->except('next', 'last');
        $this->repo = new GameRepository();
    }

    /**

     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->can('view_games')) {
            return $this->repo->all();
        }
        return abort(403);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Auth::user()->can('store_games')) {
            $array = $request->all();
            return $this->repo->store($array);
        }
        return abort(403);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (Auth::user()->can('view_games')) {

            return $this->repo->show($id);
        }
        return abort(403);
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
        if (Auth::user()->can('update_games')) {

            $array = $request->all();
            $game =  $this->repo->update($array, $id);
            return $game;
        }
        return abort(403);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Auth::user()->can('delete_games')) {

            return $this->repo->delete($id);
        }
        return abort(403);
    }


    /**
     * Function that return next match for all teams
     */
    public function next()
    {
        return $this->repo->next();
    }

    /**
     * Function that return last match for all teams
     */
    public function last()
    {
        return $this->repo->last();
    }

    /**
     * Function that return not finished games
     */
    public function allNotFinish()
    {
        return $this->repo->allNotFinish();
    }
}
