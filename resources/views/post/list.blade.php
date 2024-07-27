<x-layout>
    <div @class(['row'])>
        <div @class(['col-md-12'])>
            <a type="button" class="btn btn-primary mb-2"  href="{{route('add_post')}}">+ Add Post</a>
        </div>
    </div>
    <div class="table_data">
        <table class="table">
            <thead>
                <tr>
                    <th width="15%">User</th>
                    <th width="15%">Title</th>
                    <th width="30%">Description</th>
                    <th width="30%">Comment</th>
                    <th width="10%">Date</th>
                </tr>
            </thead>
            <tbody>
            @if(!empty($posts) && $posts->count())
                @foreach($posts as $key => $post)
                    <tr>
                        <td width="15%">{{ $post->user->name }}</td>
                        <td width="15%">{{ $post->title }}</td>
                        <td width="30%">{!! nl2br($post->description) !!}</td>
                        <td width="30%">
                            @if($post->comments->count())
                            <ul>
                            @foreach($post->comments as $comment)
                            <li>{{$comment->comment}}  ({{$comment->user->name}})</li>
                             @endforeach
                            </ul>
                            @endif
                            <a href="javascript:void(0);" class="showAddCommentModal" data-id="{{ $post->id }}">+ comment</a>
                        </td>
                        <td width="10%">{{ \Carbon\Carbon::parse($post->created_at)->format('d M, Y') }}</td>
                      
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="5" @class(['text-center'])>There are no data.</td>
                </tr>
            @endif
            </tbody>
        </table>
    </div>
    @include('post.add_comment_modal')   
    <script>
        // Enable pusher logging - don't include this in production
        Pusher.logToConsole = true;

        var pusher = new Pusher('5798ae226fa7c01212fb', {
        cluster: 'ap2'
        });

        var channel = pusher.subscribe('post-notification-channel');
        channel.bind('post-notification', function(data) {
            toastr.info(data.message);
        });
        $(function() {
            $(".showAddCommentModal").on("click",function() {
                $('input[name=post_id]').val($(this).attr('data-id'));
                $('#addCommentModal').modal('show');            
            });
        });
    </script>
</x-layout>