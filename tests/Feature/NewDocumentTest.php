<?php
namespace JeroenG\DocFlow\Tests\Feature;

use JeroenG\DocFlow\Document;
use JeroenG\DocFlow\Tests\TestCase;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class NewDocumentTest extends TestCase
{
    use RefreshDatabase;

    public function test_one_can_add_documents_and_reviews_get_created()
    {
        $this->actingAs($this->create(User::class))
             ->post(route('docflow.documents.store'), [
                'doc_id' => 'TheGobletOfFire.pdf',
                'order' => false,
                'reviewers' => [1,2,3],
        ]);

        $doc = Document::firstOrFail();
        $this->assertEquals([1,2,3], $doc->reviews()->pluck('id'));
        $this->assertEquals('TheGobletOfFire.pdf', $doc->identifier());
    }

    public function test_add_document_and_review_order_matters()
    {
        $this->actingAs($this->create(User::class))
            ->post(route('docflow.documents.store'), [
                'doc_id' => 'TheGobletOfFire.pdf',
                'order' => true,
                'reviewers' => [2, 3, 1],
            ]);

        $doc = Document::firstOrFail();
        $this->assertEquals([2, 3, 1], $doc->reviews()->pluck('id'));
        $this->assertEquals('TheGobletOfFire.pdf', $doc->identifier());
    }

    public function test_add_document_and_identifier_is_number()
    {
        config(['docflow.identifier_type' => 'number']);

        $this->actingAs($this->create(User::class))
            ->post(route('docflow.documents.store'), [
                'doc_id' => 872000,
                'order' => false,
                'reviewers' => [3, 2, 1],
            ]);

        $doc = Document::firstOrFail();
        $this->assertEquals(872000, $doc->identifier());
    }
}
