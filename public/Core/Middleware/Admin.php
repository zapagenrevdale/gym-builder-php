<?php

namespace Core\Middleware;

class Admin
{
    public function handle()
    {
        if (!isset($_SESSION['admin'])) {
            abort(403);
        }
    }
}