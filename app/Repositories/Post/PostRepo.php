<?php
namespace App\Repositories\Post;

interface PostRepo
{
    public function list();
    public function store($data);
}