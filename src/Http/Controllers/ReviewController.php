<?php

use JeroenG\DocFlow\Document;
use App\User;
use JeroenG\DocFlow\DocFlow;

class ReviewController extends Controller
{
    public function store(Document $doc, User $user, DocFlow $df)
    {
        $df->setDocument($doc)->queueReviewer($user);
    }

    public function edit(Document $doc, User $user)
    {
        return view('docflow::reviews.edit');
    }

    public function update(Review $review)
    {
        #
    }
}