<!-- resources/views/auth/register.blade.php -->
@extends('admin.layout')

@section('content')
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
          <div class="panel-heading">Login</div>
          <div class="panel-body">
            @include('admin.partials.errors')
            <form method="POST" action="/auth/register">
                {!! csrf_field() !!}
                <div>
                    Name
                    <input type="text" name="name" value="{{ old('name') }}">
                </div>

                <div>
                    Email
                    <input type="email" name="email" value="{{ old('email') }}">
                </div>

                <div>
                    Password
                    <input type="password" name="password">
                </div>

                <div>
                    Confirm Password
                    <input type="password" name="password_confirmation">
                </div>

                <div>
                    <button type="submit">Register</button>
                </div>
            </form>
            </div>
        </div>
      </div>
    </div>
  </div>
@endsection

