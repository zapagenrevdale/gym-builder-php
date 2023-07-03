<?php

namespace Core\Middleware;

class Guest
{
    public function handle()
    {
        if (isset($_SESSION['user']) || isset($_SESSION['admin'] )) {
            header('location: /');
            exit();
        }
    }
}