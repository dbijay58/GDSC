 
@extends('layouts.admin')
@section('content')
<div class="container">
    <form method="get" action="">
  <div class="form-row">
      

      <label class="my-1 mr-2" for="instructor_name">Instructor Name</label>
      <input id = "instructor_name" type="text" class="col form-control mr-1" name="name" placeholder="Enter Name" required>
      
      <label class="my-1 mr-2" for="instructor_phone">Phone</label>
      <input id = "instructor_phone" type="text" class="col form-control mr-1" name="phone" placeholder="Enter Phone" required>
      
      <label class="my-1 mr-2" for="instructor_email">Email</label>
      <input id = "instructor_email" type="text" class="col form-control mr-1" name="email" placeholder="Enter Email" required>

      <label class="my-1 mr-2" for="instructor_suburb">Home Suburb</label>
      <input id = "instructor_suburb" type="text" class="col form-control mr-1" name="start_suburb" placeholder="Enter Suburb" required>

      <input type="submit" class='col btn btn-success' id='add_instructor_button' value='Add Instructor'>
</div>
    </form>
<hr>
<small class="text-muted">Instructor Details</small>
<div class="mt-2 container table-responsive">
	<table class="table table-sm table-bordered table-hover">
  <thead class="text-primary">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Phone</th>
      <th scope="col">Email</th>
      <th scope="col">Start Suburb</th>
      <th scope="col">Suburbs</th>

    </tr>
  </thead>
  <tbody>
  	@foreach ($instructors as $instructor)
	<tr>
      <th scope="row">{{$instructor->id}}</th>
      <td>{{$instructor->name}}</td>
      <td>{{$instructor->phone}}</td>
      <td>{{$instructor->email}}</td>
      <td>{{$instructor->start_suburb}}</td>
      <td></td>
    </tr>
	@endforeach

  </tbody>
</table>

</div>
</div>
@endsection

