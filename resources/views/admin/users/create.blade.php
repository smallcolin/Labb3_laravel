@extends('layouts.app')

@section('content')

  <div class="panel panel-default">
    <div class="panel-heading">
      Create a user
    </div>
    <div class="panel-body">
      <form class="" action="{{route('users.store')}}" method="post">
        {{csrf_field()}}
        <div class="form-group">
          <label for="name">Name</label>
          <input type="text" name="name" class="form-control" value="">
        </div>
        <div class="form-group">
          <label for="email">Email</label>
          <input class="form-control" type="email" name="email">
        </div>
        <div class="form-group">
          <label for="password">Password</label>
          <input class="form-control" type="password" name="password">
        </div>
        <div class="form-group">
          <label for="admin">Admin</label>
          <input type="checkbox" name="admin" value="1">
        </div>
        <div class="form-group">
          <button class="btn btn-success" type="submit">Submit</button>
        </div>
      </form>
    </div>
  </div>

@endsection
