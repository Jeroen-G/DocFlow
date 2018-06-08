<?php
namespace JeroenG\DocFlow\Tests\Unit;

use JeroenG\DocFlow\Document;
use JeroenG\DocFlow\Tests\TestCase;

class DocumentTest extends TestCase
{
    public function test_retrieving_idetifier_as_integer()
    {
        config(['docflow.identifier_type' => 'number']);
        $d = $this->newDocument();
        $this->assertInternalType('integer', $d->identifier());
    }

    public function test_retrieving_idetifier_as_string()
    {
        config(['docflow.identifier_type' => 'path']);
        $d = $this->newDocument();
        $this->assertInternalType('integer', $d->identifier());
    }
}
