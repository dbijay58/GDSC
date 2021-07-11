 
@extends('layouts.admin')
@section('content')
<div class="container">
    <form method="get" action="">
  <div class="form-row">
      

      <label class="my-1 mr-2" for="suburb_name">Suburb Name</label>
      <input id = "suburb_name" type="text" class="col form-control mr-1" name="suburb_name" placeholder="Enter Name" required>
      
      <label class="my-1 mr-2" for="instructor_id">Instructor</label>
      <select name="instructor_id" class="form-control col mr-1">
        @foreach ($instructors as $instructor)
        <option value="{{$instructor->id}}">{{$instructor->name}}</option>
        @endforeach
      </select>

      <label class="my-1 mr-2" for="direction">Direction</label>
      <select name="direction" class="form-control col mr-1">
        <option value="N">North</option>
        <option value="S">South</option>
      </select>

      <input type="submit" class='col-3 btn btn-success' id='add_instructor_button' value='Add Suburb'>
</div>
    </form>
<hr>
<small class="text-muted">Suburb Details</small>
<div class="mt-2 container table-responsive">
	<table class="table table-sm table-bordered table-hover">
  <thead class="text-primary">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Direction</th>
      <th scope="col">Instructor</th>
      <th scope="col">Action</th>

    </tr>
  </thead>
  <tbody>
  	@foreach ($suburbs as $suburb)
	<tr>
      <th scope="row">{{$suburb->id}}</th>
      <td>{{$suburb->suburb_name}}</td>
      <td>{{$suburb->direction}}</td>
      <td>{{$suburb->instructor->name}}</td>
      <td><a class="btn btn-danger">Delete</a></td>
    </tr>
	@endforeach

  </tbody>
</table>

</div>
</div>
@endsection

