<?php
namespace App\Repositories\User;

interface UserRepo
{
    public function list($notInIds);
    public function details($userId);
}