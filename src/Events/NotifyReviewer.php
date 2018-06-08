<?php

namespace JeroenG\DocFlow\Events;

use JeroenG\DocFlow\Contracts\Actionable;

class NotifyReviewer implements Actionable
{
    public function createSignedUrlFor(int $userId)
    {
        return URL::signedRoute('review', ['doc' => $this->document->id, 'user' => $userId]);
    }
}