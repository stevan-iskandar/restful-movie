<?php

namespace App\Http\Controllers;

use App\Models\Movies;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class MoviesController extends Controller
{
    function index(): JsonResponse
    {
        return response()->json(Movies::get());
    }

    function store(Request $request): JsonResponse
    {
        $request->validate([
            'title'         => 'required',
            'description'   => 'required',
            'rating'        => 'required|regex:/^\d*(\.\d{2})?$/',
        ]);

        return response()->json(Movies::create([
            Movies::ATTR_CHAR_TITLE         => $request->title,
            Movies::ATTR_TEXT_DESCRIPTION   => $request->description,
            Movies::ATTR_FLOAT_RATING       => $request->rating,
            Movies::ATTR_CHAR_IMAGE         => $request->image ?? null,
        ]));
    }

    function detail($id): JsonResponse
    {
        return response()->json(Movies::find($id));
    }

    function update(Request $request, $id): JsonResponse
    {
        $request->validate([
            'title'         => 'required',
            'description'   => 'required',
            'rating'        => 'required|regex:/^\d*(\.\d{2})?$/',
        ]);

        Movies::find($id)->update([
            Movies::ATTR_CHAR_TITLE         => $request->title,
            Movies::ATTR_TEXT_DESCRIPTION   => $request->description,
            Movies::ATTR_FLOAT_RATING       => $request->rating,
            Movies::ATTR_CHAR_IMAGE         => $request->image ?? null,
        ]);

        return response()->json('Movie has been updated');
    }

    function delete($id): JsonResponse
    {
        Movies::find($id)->delete();
        return response()->json('Movie has been deleted');
    }
}
