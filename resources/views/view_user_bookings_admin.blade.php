@extends('layouts.admin')
@section('content')
<div class="container">
    
<hr>
<u class="text-muted ">Customer Details</u>
<div class="row ">
  <p class="col"><span class="text-primary" >User Id:</span> {{$user->id}}</p>
  <p class="col"><span class="text-primary" >User Name:</span> {{$user->name}}</p>
  <p class="col"><span class="text-primary" >Phone:</span> {{$user->phone}}</p>
  <p class="col"><span class="text-primary" >Address:</span> {{$user->st_address}}</p>
  <p class="col"><span class="text-primary" >Instructor:</span> {{$user->instructor}}</p>
</div>
<hr>
<u class="text-muted">Customer Bookings</u>
<div class="mt-2 container table-responsive">
	<table class="table table-sm table-bordered table-hover">
  <thead class="text-primary">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Lesson Date</th>
      <th scope="col">Lesson Time</th>
      <th scope="col">Instructor</th>

    </tr>
  </thead>
  <tbody>
  	@foreach ($user->bookings as $booking)
	<tr>
      <th scope="row">{{$booking->id}}</th>
      <td>{{$booking->lesson_date}}</td>
      <td>{{$booking->lesson_time}}</td>
      <td>{{$booking->instructor}}</td>
    </tr>
	@endforeach

  </tbody>
</table>

</div>
</div>


@endsection
