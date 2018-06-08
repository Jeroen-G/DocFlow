<?php

namespace JeroenG\DocFlow;

use App\User;

class Document
{
    protected $guarded = [];

    protected $casts = [
        'is_reviewed' => 'boolean',
    ];

    public function owner()
    {
        return $this->belongsTo(User::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function identifier()
    {
        return $this->doc_id;
        // if (config('docflow.identifier_type' == 'number')) {
        // }
    }
}