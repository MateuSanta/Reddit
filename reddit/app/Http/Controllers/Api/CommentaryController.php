<?php

namespace App\Http\Controllers\Api;

use App\Models\Commentary;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\CommentaryResource;

class CommentaryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        {
            return CommentaryResource::collection(Commentary::all());
        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $Commentary= Commentary::create([
            'body'=> $request->body,
        ]);
        return new CommentaryResource($Commentary);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Commentary  $Commentary
     * @return \Illuminate\Http\Response
     */
    public function show(Commentary $Commentary)
    {
        return new CommentaryResource($Commentary);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Commentary  $Commentary
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Commentary $commentary)
    {
        $commentary-> update([
            'body'=> $request->body,
        ]);
        return new CommentaryResource($commentary);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Commentary  $Commentary
     * @return \Illuminate\Http\Response
     */
    public function destroy(Commentary $commentary)
    {
        return $commentary->delete();
    }
    }
