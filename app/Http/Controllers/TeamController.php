<?php

namespace App\Http\Controllers;

use App\Repositories\TeamRepository;
use Illuminate\Http\Request;
use Auth;


class TeamController extends Controller
{

    private TeamRepository $repo;

    public function __construct(TeamRepository $repository)
    {
        $this->middleware('auth:sanctum');
        $this->repo = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->can('view_teams')) {

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
        if (Auth::user()->can('store_teams')) {

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
        if (Auth::user()->can('view_teams')) {

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
        if (Auth::user()->can('update_teams')) {

            $array = $request->all();
            return $this->repo->update($array, $id);
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
        if (Auth::user()->can('delete_teams')) {

            return $this->repo->delete($id);
        }
        return abort(403);
    }


    /**
     * team without game for the given date
     */
    public function noGameTeams(string $date)
    {
        if (Auth::user()->can('store_teams')) {

            return $this->repo->noGameTeams($date);
        }
        return abort(403);
    }

    /**
     * team without game for the given date
     */
    public function noGameTeamsForGames(string $date)
    {
        if (Auth::user()->can('store_teams')) {

            return $this->repo->noGameTeamsForGames($date);
        }
        return abort(403);
    }
}
