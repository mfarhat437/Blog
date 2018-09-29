@extends('layouts.layout')
@section('content')

<h3>All Users</h3>
<table class="table table-striped table-dark">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">option</th>
    </tr>
  </thead>
  <tbody>
      @foreach($users as $user)
    <tr>
      <th scope="row">{{$user->id}}</th>
      <td>{{$user->name}}</td>
      <td>{{$user->email}}</td>
      <td></td>

    </tr>
      @endforeach
  </tbody>
</table>
<br>
<h3><strong>Setting :</strong></h3>
<form method='POST' action='/admincontrol'>
            {!! csrf_field() !!}

  <div class="input-group-prepend">
    <div class="input-group-text">
    <strong>Stop Comments ?</strong>  <input type="checkbox" name="close_comments" aria-label="Checkbox for following text input" onchange="this.form.submit()" {{$close_comments==1 ? 'checked' : ''}} >
    </div>
  </div>
</form>



@endsection