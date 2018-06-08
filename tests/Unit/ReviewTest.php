<?php
namespace JeroenG\DocFlow\Tests\Unit;

use JeroenG\DocFlow\Document;
use JeroenG\DocFlow\Tests\TestCase;

class ReviewTest extends TestCase
{
    public function test_getting_draft_reviews()
    {
        $d = $this->newDocument();
        $r = $this->newReviews(2, ['doc_id' => $d->id]);
        $r->first()->touch();

        $this->assertEquals($r->first()->pluck('id'), $d->reviews->drafts()->pluck('id'));
    }

    public function test_getting_empty_reviews()
    {
        $d = $this->newDocument();
        $r = $this->newReviews(2, ['doc_id' => $d->id]);
        $r->first()->touch();

        $this->assertEquals($r->last()->pluck('id'), $d->reviews->empty()->pluck('id'));
    }

    public function test_getting_remaining_reviews()
    {
        $d = $this->newDocument();
        $r = $this->newReviews(2, ['doc_id' => $d->id]);
        $r->first()->update(['is_finished' => true]);

        $this->assertEquals($r->last()->pluck('id'), $d->reviews->remaining()->pluck('id'));
    }

    public function test_getting_finished_reviews()
    {
        $d = $this->newDocument();
        $r = $this->newReviews(2, ['doc_id' => $d->id]);
        $r->first()->update(['is_finished' => true]);

        $this->assertEquals($r->first()->pluck('id'), $d->reviews->finished()->pluck('id'));
    }
}