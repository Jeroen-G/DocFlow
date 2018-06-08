<?php

namespace JeroenG\DocFlow\Events;

use JeroenG\DocFlow\Contracts\Actionable;
use JeroenG\DocFlow\Document;

class CreateDocument implements Actionable
{
    public function handle(array $data) : Document
    {
        $doc = Document::create([
            'doc_id' => $data['doc_id'],
            'user_id' => $data['user_id'],
        ]);

        collect($request->reviewers)->each(function ($reviewer, $key) use ($doc, $request) {
            Review::create([
                'document_id' => $doc->id,
                'user_id' => $reviewer,
                'order' => ($request->order) ? $key : 0,
            ]);
        });
    }
}