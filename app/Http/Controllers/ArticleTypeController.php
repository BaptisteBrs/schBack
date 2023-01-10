<?php

namespace App\Http\Controllers;

use App\Repositories\ArticleTypeRepository;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Upload;
use Illuminate\Support\Facades\Auth;

class ArticleTypeController extends Controller
{

    private ArticleTypeRepository $repo;
    private  String $folder  = 'article_type';

    public function __construct()
    {
        $this->middleware('auth:sanctum')->except('index');
        $this->repo = new ArticleTypeRepository();
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
        if (Auth::user()->can('store_article_types')) {

            $array = $request->all();
            if ($request->file('picture') !== null) {

                $array['picture_name'] = Upload::upload($request->file('picture'), $this->folder);
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
        if (Auth::user()->can('view_article_types')) {

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
        if (Auth::user()->can('update_article_types')) {

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
        if (Auth::user()->can('delete_article_types')) {
            return $this->repo->delete($id);
        }
        return abort(403);
    }

    /**
     * Save file image
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function uploadFile(Request $request)
    {
        if (Auth::user()->can('store_article_types')) {
            return Upload::upload($request->file('picture'), $this->folder);
        }
        return abort(403);
    }
}
