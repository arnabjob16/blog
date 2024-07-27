<?php

namespace App\Http\Controllers;

use App\Events\PostNotificationEvent;
use App\Http\Requests\CommentAddRequest;
use App\Http\Requests\PostAddRequest;
use App\Repositories\Post\PostRepo;
use Illuminate\Support\Facades\Mail;
use App\Mail\PostNotificationEmail;
use App\Repositories\Comment\CommentRepo;
use App\Repositories\User\UserRepo;

class PostController extends Controller
{
    private $postRepo;
    public function __construct(PostRepo $postRepo) {
        $this->postRepo = $postRepo;
    }
    public function list()
    {
        $posts = $this->postRepo->list();
        return view("post.list", compact('posts'));
    }
    public function add()
    {
        return view("post.add");
    }
    public function postSubmit(PostAddRequest $request, UserRepo $userRepo)
    {
        $loginUserId = env('STATIC_USER_ID');
        $posts = $this->postRepo->store($request);
        if($posts){
            $sendUserDetails = $userRepo->details($loginUserId);
            event(new PostNotificationEvent('A new post is created by '. $sendUserDetails->name.'.', $loginUserId));
            $users = $userRepo->list([$loginUserId]);
            foreach ($users as $user) {
               Mail::to($user->email)->queue(new PostNotificationEmail($sendUserDetails->name));
            }
            return redirect()->back()->with('success', 'Post successfully submitted.');   
        }
        else {
            return redirect()->back()->with('error', 'Some error occurred please try again after sometime.');   
        }
    }
    public function addComment(CommentAddRequest $request, CommentRepo $commentRepo)
    {
        $comment = $commentRepo->store($request);
        if ($comment) {
            return redirect()->back()->with('success', 'Comment successfully submitted.');
        } else {
            return redirect()->back()->with('error', 'Some error occurred please try again after sometime.');
        }
    }
}
