@extends('layouts.app')

@section('template_title')
    {{ $user->name }}'s Profile
@endsection

@section('template_fastload_css')
    #map-canvas{
        min-height: 300px;
        height: 100%;
        width: 100%;
    }
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-10 offset-md-1 col-lg-8 offset-lg-2">
                <div class="card">
                    <div class="card-header">
                    </div>
                    <div class="card-body">
                    @if($user->image)
                        <img src="{{\Illuminate\Support\Facades\Storage::disk('public')->url($user->image)}}" alt="user" class="profile-photo-md pull-left">
                    @else
                        <img src="https://bootdey.com/img/Content/avatar/avatar6.png" alt="user" class="profile-photo-md pull-left">
                    @endif
                        <dl class="user-info">
                            <dd>
                                <h4>Name: {{ $user->name }} </h4>
                            </dd>
                            <br>
                            <dd>
                                <h5>Email: {{ $user->email }}</h5>
                            </dd>
                            <br>
                            <dd>
                                @if($user->phone_number)
                                <h5>Phone Number: {{ $user->phone_number }} </h5>
                                @else
                                <h5>Phone Number: Not Available </h5>
                                @endif
                            </dd>
                            <br>
                        
                        </dl>
                    </div>
                </div>
                Hello People
                <div class="row">
                <div class="col-md-8">
                @foreach($posts as $post)
                    <div class="post-content">
                        <div class="post-container">
                            @if($post->user->image)
                            <img src="{{\Illuminate\Support\Facades\Storage::disk('public')->url($post->user->image)}}" alt="user" class="profile-photo-md pull-left">
                            @else
                                <img src="https://bootdey.com/img/Content/avatar/avatar6.png" alt="user" class="profile-photo-md pull-left">
                            @endif
                            <div class="post-detail">
                                <div class="user-info">
                                    <h5><a href="{{route('visit.profile',['user_id'=>$post->user->id])}}" class="profile-link">{{$post->user->name}}</a> <span
                                            class="following">following</span></h5>
                                    <p class="text-muted">Published post
                                        about {{\Carbon\Carbon::parse($post->created_at)->diffForHumans()}}</p>
                                </div>
                                    <div class="reaction">
                                        @if($post->user->id != auth()->user()->id)
                                        <form action="{{route('likes.create', ['post_id' => $post->id, 'liked' => true])}}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn text-green" ><i class="fa fa-thumbs-up"></i> {{$post->likes->where('liked',1)->count()}} </button>
                                        </form>
                                        <form action="{{route('likes.create', ['post_id' => $post->id, 'liked' => 0])}}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn text-red"><i class="fa fa-thumbs-down"></i> {{$post->likes->where('liked',0)->count()}}</button>
                                        </form>
                                        @else
                                        <form>
                                        <a class="btn text-green" method="POST"><i class="fa fa-thumbs-up"></i> {{$post->likes->where('liked',1)->count()}}</a>
                                        </form>
                                        <form>
                                        <a class="btn text-red" method="POST"><i class="fa fa-thumbs-down"></i> {{$post->likes->where('liked',0)->count()}}</a>
                                        </form>
                                        @endif
                                        
                                    </div>
                                <div class="line-divider"></div>
                                <div class="post-text">
                                    <p>
                                        {{$post->description}}
                                        <i class="em em-anguished"></i> <i class="em em-anguished"></i> <i
                                            class="em em-anguished"></i></p>
                                </div>
                                <hr>
                                <div class="line-divider"></div>
                                @foreach($post->comments as $comment)
                                    <div class="post-comment">
                                    @if($post->user->image)
                                        <img src="{{\Illuminate\Support\Facades\Storage::disk('public')->url($comment->user->image)}}" alt="user" class="profile-photo-md pull-left">
                                    @else
                                        <img src="https://bootdey.com/img/Content/avatar/avatar6.png" alt="user" class="profile-photo-md pull-left">
                                    @endif
                                    <p><a href="{{route('visit.profile',['user_id'=>$comment->user->id])}}" class="profile-link">{{$comment->user->name}} </a>
                                    <span>{{\Carbon\Carbon::parse($comment->created_at)->diffForHumans()}}</span>
                                    <br>
                                    {{$comment->description}}
                                    </p>
                                    </div>
                                @endforeach
                                <form class="form-inline" method="post" action="{{route('comments.create', ['post_id' => $post->id])}}">
                                    @csrf
                                    <textarea required class="form-control" name="description" style="width: 80%" placeholder="Post a comment!"></textarea>
                                    <button type="submit" class="btn btn-primary mb-2">Post!</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

            </div>
        </div>
    </div>
@endsection
