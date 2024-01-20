<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Photo;
use Illuminate\Http\Response;

class PhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Photo::all();
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("create");
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return Photo::create(["name"=>$request->input("name")]);
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
        
         $photo = Photo::find($id);

    if (!$photo) {
        return response()->json(['message' => 'Nie ma takiego numeru'], 404);
    }

    return view('show', ['photo' => $photo]);
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view("edit",["photo"=>$id]);
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $dane = Photo::find($id);
        $dane->name=$request->input("name");
        $dane->save();
        return $dane;
        //
    }

    /**
     * Remove the specified resource from storage.
     */
     
    public function destroy(string $id):Response
    {
         $dane = Photo::find($id);

        if ($dane === null) {
            return response(
                "Nie ma takiego numeru: {$id}.",
                Response::HTTP_NOT_FOUND
            );
        }

        if ($dane->delete() === false) {
            return response(
                "Nie udało się skasować: {$id}.",
                Response::HTTP_BAD_REQUEST
            );
        }

        return response(["id" => $id, "deleted" => true], Response::HTTP_OK);
    }
}