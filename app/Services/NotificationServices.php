<?php 

namespace App\Services;

interface NotificationServices
{
    public function createAndBoradcast(array $payload);
    
}

