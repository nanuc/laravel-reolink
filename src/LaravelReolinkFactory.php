<?php

namespace Nanuc\LaravelReolink;

use Nanuc\LaravelReolink\Endpoints\Network;
use Nanuc\LaravelReolink\Endpoints\Security;
use Nanuc\LaravelReolink\Endpoints\System;

class LaravelReolinkFactory
{
    public function security()
    {
        return new Security();
    }

    public function system()
    {
        return new System();
    }

    public function network()
    {
        return new Network();
    }
}
