@extends('layouts.layout')
@section('content')
    <div class='col-md-8'>


    <h3>Admin Login</h3>

    <form method="POST" action="/adminlogin">
{!! csrf_field() !!}

        <div class="form-group">
            <label for="email">E-mail</label>
            <input type="text" name="email" value="{{ old('email') }}" class="form-control form-app" placeholder="Email Address">
        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" class="form-control form-app" placeholder="Password">
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-submit">login</button>
        </div>

    </form>
    </div>
@foreach($errors->all() as $error)
{{$error}}
@endforeach

@endsection