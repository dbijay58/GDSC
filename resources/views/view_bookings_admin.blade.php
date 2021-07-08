@extends('layouts.admin')
@section('content')
<div class="container">
    <form method="get" action="/admin/bookings">
  <div class="form-row">
      <label class="my-1 mr-2" for="start_date">Start Date</label>
      <input class="col mr-5 form-control d-inline" type="date" id="start_date" name="start_dt"> 

      <label class="my-1 mr-2" for="end_date">End Date</label>
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
<small class="text-muted">Customer Bookings</small>
<div class="mt-2 container table-responsive">
	<table class="table table-sm table-bordered table-hover">
  <thead class="text-primary">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Phone</th>
      <th scope="col">Address</th>
      <th scope="col">Lesson Date</th>
      <th scope="col">Lesson Time</th>
      <th scope="col">Instructor</th>

    </tr>
  </thead>
  <tbody>
  	@foreach ($bookings as $booking)
	<tr>
      <th scope="row">{{$booking->id}}</th>
      <td>{{$booking->user->name}}</td>
      <td>{{$booking->user->phone}}</td>
      <td>{{$booking->user->st_address}},{{$booking->user->suburb}}</td>
      <td>{{$booking->lesson_date}}</td>
      <td>{{$booking->lesson_time}}</td>
      <td>{{$booking->user->instructor_id}}</td>
    </tr>
	@endforeach

  </tbody>
</table>

</div>
</div>


@endsection
