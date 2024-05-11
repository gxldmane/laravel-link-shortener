<?php

namespace App\Actions;

class CreateShortLinkAction
{
    public function handle(string $token)
    {
        return env('APP_URL') . ':'  . env('APP_PORT') . '/' . $token;
    }
}