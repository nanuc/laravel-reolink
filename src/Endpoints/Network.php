<?php

namespace Nanuc\LaravelReolink\Endpoints;

class Network extends Endpoint
{
    public function getRtspUrl($channel = 0)
    {
        return $this->execute('GetRtspUrl', compact('channel'), action: 0);
    }
}
