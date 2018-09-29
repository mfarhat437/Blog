@extends('layouts.layout')
@section('content')

                <h1 class="page-header">
                    Page Heading
                    <small>Secondary Text</small>
                </h1>

                <!-- First Blog Post -->
                <p class="lead">
                    By: <a href="index.php">{{$username}}</a>
                </p>

                <h3>
                   Title: <a href="#">{{$post->title}}</a>
                </h3>
                  <p><img src="../uploads/{{$post->image}}"></p>  

                <p><span class="glyphicon glyphicon-time"></span> Posted on {{ $post->created_at}}</p>
                <hr>

                <p>{{$post->body}}</p>

                <hr>

@if($close_comments==0 )
    @foreach($post->comments as $comment)
<p><Strong>{{auth()->user()->name}}:</Strong> {{$comment->body}}</p>
    @endforeach

   @if(auth()->check())
<form action="/posts/{{$post->id}}/addcomment" method="POST" >
    {{csrf_field()}}
  <div class="form-group">
    <label for="exampleInputPassword1">type your comment...</label>
  <input type="text" class="form-control" name="body" id="exampleInputPassword1" placeholder="type your comment">

  <button type="submit" class="btn btn-primary">add Comment</button>
 </div>  
</form> 
   @else {{'sorry you have to login to type your comment'}}
   @endif
@else
{{'sorry comments are not available right now...'}}
@endif
                <a class="btn btn-primary" href="{{url('/posts')}}">Return to home <span class="glyphicon glyphicon-chevron-right"></span></a>


                <!-- Second Blog Post -->

                <!-- Pager -->
                <ul class="pager">
                    <li class="previous">
                        <a href="#">&larr; Older</a>
                    </li>
                    <li class="next">
                        <a href="#">Newer &rarr;</a>
                    </li>
                </ul>




@endsection