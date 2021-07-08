@extends('layouts.admin')
@section('content')
<div class="container table-responsive">
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
      <td><a href='/bookings/{{$user->id}}'>{{$user->name}}</td>
      <td>{{$user->phone}}</td>
      <td>{{$user->st_address}},{{$user->suburb}}</td>
      <td>{{$user->instructor_id}}</td>
      <td><a class="btn btn-outline-success btn-sm" href="/admin/bookings?user_id={{$user->id}}">Classes</a><a class="ml-2 btn btn-outline-danger btn-sm" href="/admin/edit_user?user_id={{$user->id}}">Edit User</a></td>
    </tr>
	@endforeach

  </tbody>
</table>

</div>
@endsection
