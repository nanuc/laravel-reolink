<?php

namespace Nanuc\LaravelReolink\Endpoints;

class System extends Endpoint
{
    public function getDevInfo()
    {
        return $this->execute('GetDevInfo');
    }

    public function getAbility($user = null)
    {
        if($user)  {
            $data = [
                'User' => [
                    'userName' => $user,
                ]
            ];
        }
        return $this->execute('GetAbility', $data ?? []);
    }
}
