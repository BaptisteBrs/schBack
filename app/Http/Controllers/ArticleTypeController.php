<?php

namespace App\Http\Controllers;

use App\Repositories\ArticleTypeRepository;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Upload;

class ArticleTypeController extends Controller
{

    private ArticleTypeRepository $repo;
    private  String $folder  = 'article_type';

    public function __construct()
    {
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
        $array = $request->all();
        if ($request->file('picture') !== null) {

            $array['picture_name'] = Upload::upload($request->file('picture'), $this->folder);
        }
        return $this->repo->store($array);
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
        $array = $request->all();
        if ($request->file('picture') !== null) {
            $array['picture_name'] = Upload::upload($request->file('picture'), $this->folder);
        }
        return $this->repo->update($array, $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return $this->repo->delete($id);
    }
}
