@extends('layouts.admin')
@section('content')
<div class="container table-responsive">
  <form method="get" action="/admin/bookings">
  <div class="form-row">
      <label class="my-1 mr-2" for="start_date">User Creation From</label>
      <input class="col mr-5 form-control d-inline" type="date" id="start_date" name="start_dt"> 

      <label class="my-1 mr-2" for="end_date">User Creation To</label>
      <input class="col mr-5 form-control" type="date" id="end_date" name="end_dt"> 

      <label class="my-1 mr-2" for="instructor_id">Instructor</label>
      <select class="col mr-5 form-control" id="instructor_id" name="instructor_id"> 
        <option>Milan S</option>
        <option>Umesh S</option>
      </select>

      <input type="submit" class='btn btn-success col' id='search_booking_button' value='Search'>
</div>
    </form>
<hr>
<small class="text-muted">Customer Details</small>
	<table class="table table-sm table-bordered table-hover">
  <thead class="text-primary">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Phone</th>
      <th scope="col">Address</th>
      <th scope="col">Instructor</th>
      <th scope="col">Actions</th>

    </tr>
  </thead>
  <tbody>
  	@foreach ($users as $user)
	<tr>
      <th scope="row">{{$user->id}}</th>
      <td><a href="/admin/bookings/{{$user->id}}">{{$user->name}}</td>
      <td>{{$user->phone}}</td>
      <td>{{$user->st_address}},{{$user->suburb}}</td>
      <td>{{$user->instructor_id}}</td>
      <td><a class="btn btn-outline-success btn-sm" href="/admin/bookings/{{$user->id}}">Classes</a><a class="ml-2 btn btn-outline-danger btn-sm" href="/admin/edituser/{{$user->id}}">Edit User</a></td>
    </tr>
	@endforeach

  </tbody>
</table>

</div>
@endsection
