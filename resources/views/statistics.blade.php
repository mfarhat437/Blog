@extends('layouts.layout')
@section('content')
        
        
<h2>Our Statistics</h2>

    <table class="table table-dark">
      <thead>
        <tr>
          <th scope="col">all users</th>
          <td>{{$users}}</td>
        </tr>
      </thead>
        
      <thead>
        <tr>
          <th scope="col">all posts</th>
          <td>{{$posts}}</td>
        </tr>
      </thead>
        
      <thead>
        <tr>
          <th scope="col">all comments</th>
          <td>{{$comments}}</td>
        </tr>
      </thead>
        
      <thead>
        <tr>
          <th scope="col">most active user</th>
          <td>{{$name}}</td>
        </tr>
      </thead>
        
      <thead>
        <tr>
          <th scope="col">most active post</th>
          <td>{{$post_title}}</td>
        </tr>
      </thead>
        
        
        
    </table>

@endsection