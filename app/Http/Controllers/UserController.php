<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Repositories\UserRepository;
use Auth;
use Bouncer;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Laravel\Sanctum\PersonalAccessToken;
use Storage;
use Str;
use Upload;

class UserController extends Controller
{

    private UserRepository $repo;
    private  String $folder  = 'users';
    const DEFAULT_IMAGE = 'images/users/user.png';
    public const ERROR = 'error';


    public function __construct()
    {
        $this->middleware('auth:sanctum')->except('login', 'logout', 'firstConnexion', 'updatePassword', 'organigramme', 'checkToken');
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
        if (Auth::user()->can('store_users')) {

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
        if (Auth::user()->can('view_users')) {
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
        if (Auth::user()->can('update_user')) {
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
        if (Auth::user()->can('delete_user')) {
            return $this->repo->delete($id);
        }
        return abort(401);
    }

    /**Function for login */
    public function login(Request $request)
    {
        $array = $request->all();
        return $this->repo->login($array);
    }

    /**Function for logout */
    public function logout(Request $request)
    {

        // Get bearer token from the request
        $accessToken = $request->bearerToken();

        // Get access token from database
        $token = PersonalAccessToken::findToken($accessToken);

        // Revoke token
        $token->delete();

        return true;
    }

    /**Function for first connexion */
    public function firstConnexion(Request $request)
    {
        $array = $request->all();
        return $this->repo->firstConnexion($array);
    }

    /**Function for reset password */
    public function updatePassword(Request $request)
    {
        $array = $request->all();
        return $this->repo->updatePassword($array);
    }

    /**function for organigramme  */
    public function organigramme()
    {
        return $this->repo->organigramme();
    }

    /**function for players by categories */
    public function playersByCategory(int $category)
    {
        return $this->repo->playersByCategory($category);
    }

    /**
     * Save file image
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function uploadFile(Request $request)
    {
        if (Auth::user()->can('store_users')) {
            return $this->upload($request->file('picture'), $this->folder);
        }
        return abort(401);
    }



    public function upload(UploadedFile $file, string $folder)
    {
        $filename = date('YmdHI') . $file->getClientOriginalName();
        $file->move(storage_path('images/' . $folder), $filename);
        return 'storage/images/' . $folder . '/' . $filename;
    }

    public function checkToken(Request $request)
    {
        if ($user = auth('sanctum')->user() != null) {
            return true;
        }
        return false;
    }
}
