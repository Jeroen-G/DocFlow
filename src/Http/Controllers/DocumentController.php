<?php

namespace App\Http\Controllers;

use JeroenG\DocFlow\Document;
use Illuminate\Http\Request;
use JeroenG\DocFlow\Review;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'doc_id' => 'required',
            'order' => 'required|bool',
            'reviewers' => 'required|array'
        ]);

    }

    /**
     * Display the specified resource.
     *
     * @param  \JeroenG\DocFlow\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function show(Document $document)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \JeroenG\DocFlow\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function edit(Document $document)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \JeroenG\DocFlow\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Document $document)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \JeroenG\DocFlow\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function destroy(Document $document)
    {
        //
    }
}
