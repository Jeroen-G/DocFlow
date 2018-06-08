<?php

namespace JeroenG\DocFlow;

class Ledger
{
    protected $listen = [
        'JeroenG\DocFlow\Events\CreateDocument' => [],
    ];

    public function subscribe($events)
    {
        foreach ($this->listen as $event => $listener) {
            $events->listen($event, $listener);
        }
    }

    public function handleEvent()
    {
    }
}
