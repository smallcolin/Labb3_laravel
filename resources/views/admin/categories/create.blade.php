@extends ('layouts.app')

@section ('content')

  <div class="panel panel-default">
    <div class="panel-heading">
      Create a new category
    </div>
    <div class="panel-body">
      <form class="" action="{{route('category.store')}}" method="post">
        {{csrf_field()}}
        <div class="form-group">
          <label for="name">Name</label>
          <input type="text" name="name" value="" class="form-control">
        </div>
        <div class="form-group">
          <button class="btn btn-success">Create Category</button>
        </div>
      </form>
    </div>
  </div>

@endsection
