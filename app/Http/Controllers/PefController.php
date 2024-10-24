<?php

namespace App\Http\Controllers;

use App\Repositories\PefRepository;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Upload;
use Illuminate\Support\Facades\Auth;
use Storage;

class PefController extends Controller
{

    private PefRepository $repo;
    private  String $folder  = 'pef';

    public function __construct()
    {
        $this->middleware('auth:sanctum')->except('index', 'last', 'show');
        $this->repo = new PefRepository();
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
        if (Auth::user()->can('store_articles')) {

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
        return $this->repo->show($id);
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
        if (Auth::user()->can('update_articles')) {

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
        if (Auth::user()->can('delete_articles')) {
            return $this->repo->delete($id);
        }
        return abort(403);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function last()
    {
        return $this->repo->last();
    }


    /**
     * Save file image
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function uploadFile(Request $request)
    {
        if (Auth::user()->can('store_articles')) {
            return $this->upload($request->file('picture'), $this->folder);
        }
        return abort(403);
    }



    public function upload(UploadedFile $file, string $folder)
    {
        $storagePath =  Storage::disk('public')->put('images/' . $folder, $file,);
        return 'storage/' . $storagePath;
    }
}
