<?php

namespace App\Http\Controllers;

use App\Repositories\BoutiqueRepository;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;


class BoutiqueController extends Controller
{

    private BoutiqueRepository $repo;
    private String $folder = 'boutique';

    public function __construct()
    {
        $this->repo = new BoutiqueRepository();
        $this->middleware('auth:sanctum')->except('');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->repo->all();
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Auth::user()->can('store_boutiques')) {

            $array = $request->all();

            $array['picture_name'] = $this->upload($request->file('picture'), $this->folder);
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
        if (Auth::user()->can('view_boutiques')) {

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
        if (Auth::user()->can('update_boutiques')) {

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
        if (Auth::user()->can('delete_boutiques')) {

            return $this->repo->delete($id);
        }
        return abort(403);
    }

    public function upload(UploadedFile $file, string $folder)
    {
        $filename = date('YmdHI') . $file->getClientOriginalName();
        $file->move(public_path('images/' . $folder), $filename);
        return 'images/' . $folder . '/' . $filename;
    }
}
