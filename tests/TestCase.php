<?php

namespace JeroenG\DocFlow\Tests;

use Orchestra\Testbench\TestCase as TestBench;
use JeroenG\TestAssist\Assistants;
use JeroenG\DocFlow\Document;
use App\User;
use JeroenG\DocFlow\Review;

abstract class TestCase extends TestBench
{
    use Assistants;

    public function setUp()
    {
        parent::setUp();

        $this->loadMigrationsFrom([
            '--database' => 'testing',
            '--realpath' => realpath(__DIR__ . '/database/migrations'),
        ]);

        $this->withFactories(realpath(dirname(__DIR__) . '/../database/factories'));
    }

    public function tearDown()
    {
        parent::tearDown();
    }

    protected function getPackageProviders($app)
    {
        return ['JeroenG\DocFlow\DocFlowServiceProvider'];
    }

    public function newDocument()
    {
        return $this->factory(Document::class)->create();
    }

    public function newReview(Document $doc, User $user, string $remarks = '', bool $finished = false, int $order = 0)
    {
        return $this->factory(Review::class)->create([
            'doc_id' => $doc->id,
            'user_id' => $user->id,
            'remarks' => $remarks,
            'is_finished' => $finished,
            'order' => $order,
        ]);
    }

    public function newReviews(int $amount, array $additionals = [])
    {
        return $this->factory(Review::class, $amount)->create($additionals);
    }
}
