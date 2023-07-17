<?php

namespace Core\Middleware;

class User
{
    public function handle()
    {
        if (!isset($_SESSION['user'])) {
            abort(403);
        }
    }
}