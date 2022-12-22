<?php

namespace Nanuc\LaravelReolink\Endpoints;

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Http;
use Nanuc\LaravelReolink\Exceptions\ReolinkException;
use Nanuc\LaravelReolink\Facades\Reolink;

class Endpoint
{
    protected function execute($command, $params = [], $action = null, $withToken = true) {
        $tokenPart = $withToken ? "&token={$this->getToken()}" : '';
        $data['cmd'] = $command;
        $data['param'] = $params;
        if(filled($action)) {
            $data['action'] = $action;
        }

        $response = Http::withoutVerifying()
            ->timeout(3)
            ->post("{$this->getUrl()}/api.cgi?cmd={$command}{$tokenPart}", [$data])
            ->json()[0];

        if(Arr::has($response, 'error')) {
            throw new ReolinkException($response);
        }

        return $response['value'];
    }

    private function getToken()
    {
        $cacheKey = config('services.reolink.token-cache-key');

        if(cache()->has($cacheKey)) {
            return cache()->get($cacheKey);
        }

        $response = Reolink::security()->login(
            username: config('services.reolink.username'),
            password: config('services.reolink.password')
        );

        $token = $response['Token'];

        cache()->put($cacheKey, $token['name'], now()->addSeconds($token['leaseTime'] - 5));

        return $token['name'];
    }
    
    private function getUrl()
    {
        return config('services.reolink.endpoint');
    }
}
