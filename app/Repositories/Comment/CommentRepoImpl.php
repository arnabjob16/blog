<?php
namespace App\Repositories\Comment;
use App\Models\Comment;
class CommentRepoImpl implements CommentRepo {
	public function store($data)
	{
        $insertData = [
            'post_id' => $data->post_id,
            'user_id' => rand(1, 1000),
            'comment' => $data->comment,
            'created_at' => now()
        ];
		return Comment::insert($insertData);
	}
}