<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\FilterRequest;
use App\Http\Requests\User\SearchRequest;
use App\Models\Favourite;
use App\Models\Publication;
use Illuminate\Support\Facades\Config;

class PublicacionController extends Controller
{
    public function index()
    {
        $datos = Publication::with(['user', 'favourite'])->where('active', '<', 2)->withCount(['comment', 'favourite'])->latest()->get()->paginate(Config::get('petsafe-web-config.paginatePublicationsBy'));
        return view('user.publicaciones', compact('datos'));
    }
    public function search(SearchRequest $request) {
        $valor = preg_replace("/[^A-Za-z0-9 ]/", '', $request->field);
        if (isset($_GET['field'])) {
            $datos = Publication::where('description', 'like','%'.e($valor).'%')
            ->orWhere(function ($query) use ($valor) {
                $query->where('title', 'like', '%' . e($valor) . '%')
                      ->where('active', '<', 2);
            })
            ->with('user')->withCount(['comment', 'favourite'])
            ->get()
            ->paginate(Config::get('petsafe-web-config.paginateServicesBy'));

            $datos->appends($request->all());
            return view('user.publicaciones', compact('datos', 'valor'));
        } else {
            return redirect()->route('publicaciones'); 
        }
    }
    public function filter(FilterRequest $request) {
        if (isset($_GET['filter'])) {
            $datos = Publication::where('category_id', e($request->filter))
            ->where('active', '<', 2)
            ->with('user')
            ->withCount(['comment', 'favourite'])
            ->latest()
            ->get()
            ->paginate(Config::get('petsafe-web-config.paginatePublicationsBy'));

            $datos->appends($request->all());
            return view('user.publicaciones', compact('datos'));
        }else {
            return redirect()->route('publicaciones'); 
        }
    }
    public function favourite($id) {
        Favourite::create([
            'publication_id' => $id,
            'user_id' => auth() -> id()
        ]);
    }

    public function noFavourite($id) {
        $favorito = Favourite::where('publication_id', $id) -> where('user_id', auth() -> id())
        ->delete();
    }
}
