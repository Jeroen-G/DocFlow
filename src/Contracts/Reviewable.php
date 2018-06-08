<?php

namespace JeroenG\DocFlow\Contracts;

use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Model;
use JeroenG\DocFlow\Review;

interface Reviewable
{
    public function owner() : Model;
    public function reviews() : Collection;
    public function reviewers() : Collection;
    public function currentReviewer() : Model;
    public function remainingReviewers() : Model;
    public function setReviewed(Personable $user, Review $review) : bool;

    public function owner() : Model
    {
        return new \App\User;
    }

    public function reviews() : Collection
    {
        return new Collection();
    }

    public function reviewers() : Collection
    {
        return new Collection();
    }

    public function currentReviewer() : Model
    {
        return new \App\User;
    }

    public function remainingReviewers() : Model
    {
        return new \App\User;
    }

    public function setReviewed(Personable $user, Review $review) : bool
    {
        return true;
    }
}