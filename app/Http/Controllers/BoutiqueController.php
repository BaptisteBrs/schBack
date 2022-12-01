<?php

namespace App\Http\Controllers;

use App\Repositories\BoutiqueRepository;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;


class BoutiqueController extends Controller
{

    private BoutiqueRepository $repo;
    private String $folder = 'boutique';

    public function __construct()
    {
        $this->repo = new BoutiqueRepository();
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

        $array['picture_name'] = $this->upload($request->file('picture'), $this->folder);
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

    public function upload(UploadedFile $file, string $folder)
    {
        $filename = date('YmdHI') . $file->getClientOriginalName();
        $file->move(public_path('images/' . $folder), $filename);
        return 'images/' . $folder . '/' . $filename;
    }
}
