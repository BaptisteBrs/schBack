<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Repositories\UserRepository;
use Auth;
use Hash;
use Illuminate\Http\Request;
use Silber\Bouncer\Bouncer;
use Upload;

class UserController extends Controller
{

    private UserRepository $repo;
    private  String $folder  = 'users';
    const DEFAULT_IMAGE = 'images/users/user.png';
    public const ERROR = 'error';


    public function __construct()
    {
        $this->middleware('auth:sanctum')->except('login', 'organigramme');
        $this->repo = new UserRepository();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->can('view_users')) {
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
        if (Auth::user()->can('store_users')) {

            $array = $request->all();
            if ($request->file('picture') !== null) {

                $array['picture_name'] = Upload::upload($request->file('picture'), $this->folder);
            } else {
                $array['picture_name'] = $this::DEFAULT_IMAGE;
            }
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
        if (Auth::user()->can('view_users')) {

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
        if (Auth::user()->can('update_user')) {
            $array = $request->all();
            if ($request->file('picture') !== null) {
                $array['picture_name'] = Upload::upload($request->file('picture'), $this->folder);
            }
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
        if (Auth::user()->can('delete_user')) {
            return $this->repo->delete($id);
        }
        return abort(403);
    }

    /**Function for login */
    public function login(Request $request)
    {
        $array = $request->all();
        return $this->repo->login($array);
    }

    /**function for organigramme  */
    public function organigramme()
    {
        return $this->repo->organigramme();
    }
}
