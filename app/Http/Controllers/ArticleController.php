<?php

namespace App\Http\Controllers;

use App\Repositories\ArticleRepository;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Upload;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{

    private ArticleRepository $repo;
    private  String $folder  = 'article';

    public function __construct()
    {
        $this->middleware('auth:sanctum')->except('index', 'last');
        $this->repo = new ArticleRepository();
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
        if (Auth::user()->can('view_articles')) {

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
        if (Auth::user()->can('udpate_articles')) {

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
        $filename = date('YmdHI') . $file->getClientOriginalName();
        $file->move(public_path('images/' . $folder), $filename);
        return 'images/' . $folder . '/' . $filename;
    }
}
