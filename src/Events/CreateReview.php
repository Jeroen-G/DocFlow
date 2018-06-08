<?php

namespace JeroenG\DocFlow\Events;

use JeroenG\DocFlow\Contracts\Actionable;

class CreateReview implements Actionable
{
    public function handle(User $user, string $remarks, bool $isFinished = true) : Review
    {
        $this->assertDocument();

        // if strict review order, check if previous users have reviewed.

        Review::create([
            'document_id' => $this->document->id,
            'is_finished' => $isFinished,
            'remarks' => $remarks,
        ]);

        // event to send next url to next reviewer.
    }
}