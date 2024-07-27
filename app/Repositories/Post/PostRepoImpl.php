<?php
namespace App\Repositories\Post;
use App\Models\Post;
use Illuminate\Support\Str;
class PostRepoImpl implements PostRepo {
	public function list(){
		return  Post::orderBy('created_at', 'DESC')->get();
	}
	public function store($data)
	{
        $insertData = [
            'title' => $data->title,
            'slug' => Str::slug($data->title),
            'user_id' => rand(1, 1000),
            'description' => $data->description,
            'is_active' => 1,
            'created_at' => now()
        ];
		return Post::insert($insertData);
	}
}