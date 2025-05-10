<?php

namespace App\Http\Controllers;

use App\Repositories\PhotothequeRepository;
use Illuminate\Http\Request;

class PhotothequeController extends Controller
{
    protected $photothequeRepo;

    public function __construct(PhotothequeRepository $photothequeRepo)
    {
        $this->photothequeRepo = $photothequeRepo;
    }

    public function index()
    {
        return response()->json($this->photothequeRepo->getAll());
    }

    public function show($id)
    {
        return response()->json($this->photothequeRepo->getById($id));
    }

    public function store(Request $request)
    {
        $request->validate([
            'titre' => 'required|string',
            'sos_titre' => 'string',
            'date' => 'required|date',
            'images.*' => 'image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $phototheque = $this->photothequeRepo->create($request);

        return response()->json(['success' => true, 'phototheque' => $phototheque]);
    }
}
