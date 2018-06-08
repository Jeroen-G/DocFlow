<?php

namespace JeroenG\DocFlow;

use App\User;

class Review
{
    protected $guarded = [];

    protected $casts = [
        'is_finished' => 'boolean',
        'order' => 'boolean',
    ];

    public function reviewer()
    {
        return $this->belongsTo(User::class);
    }

    public function document()
    {
        return $this->belongsTo(Document::class);
    }

    public function drafts()
    {
        $reviews = $this->where([
            ['is_finished', '=', false],
            ['created_at', '<>', 'modified_at']
        ])->get();
    }

    public function empty()
    {
        $reviews = $this->where([
            ['is_finished', '=', false],
            ['created_at', '=', 'modified_at']
        ])->get();
    }

    public function remaining()
    {
        $reviews = $this->where('is_finished', false)->orderBy('order')->get();
    }

    public function finished()
    {
        $reviews = $this->where('is_finished', true)->get();
    }
}