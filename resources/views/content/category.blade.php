@extends('layouts.layout')
@section('content')

                <h1 class="page-header">
                    Page Heading
                    <small>Secondary Text</small>
                </h1>

                <!-- First Blog Post -->

                @foreach($posts as $post)
                <h2>
                    <a href="/}">{{$post->title}}</a>
                </h2>
                  <p><img src="uploads/{{$post->image}}"></p>  
                <p class="lead">
                    by <a href="index.php">Start Bootstrap</a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> Posted on {{ $post->created_at}}</p>
                <hr>
                
                <p>{{$post->body}}</p>
                <a class="btn btn-primary" href="/">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>
                @endforeach
<form action="/posts/addpost" method="POST" enctype="multipart/form-data">
    {{csrf_field()}}
  <div class="form-group">
    <label for="exampleInputEmail1">Title</label>
    <input type="text" class="form-control" name="title" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter title">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Body</label>
    <input type="text" class="form-control" name="body" id="exampleInputPassword1" placeholder="type body of your post">
  </div>
    <div class="form-group">
     <label for="exampleInputPassword1">upload your image</label>
     <input type='file' name='img'>
  </div>

  <button type="submit" class="btn btn-primary">add post</button>
    
</form>

    @foreach($errors->all() as $error)
            {{$error}} <br>
    @endforeach
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