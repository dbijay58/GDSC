 
@extends('layouts.admin')
@section('content')
<div class="container">
    <form method="get" action="">
  <div class="form-row">
      

      
      <label class="my-1 mr-2" for="instructor_id">Customer</label>
      <select name="instructor_id" class="form-control col mr-1">
        @foreach ($users as $user)
        <option value="{{$user->id}}">{{$user->name}}</option>
        @endforeach
      </select>


      <input type="submit" class='col-3 btn btn-success' id='add_instructor_button' value='Search'>
</div>
    </form>
<hr>
<small class="text-muted">Account Details</small>
<div class="mt-2 container table-responsive">
	<table class="table table-sm table-bordered table-hover">
  <thead class="text-primary">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Class Count</th>
      <th scope="col">Amount</th>
      <th scope="col">Status</th>
      <th scope="col">Image</th>
      <th scope="col">Action</th>

    </tr>
  </thead>
  <tbody>
  	@foreach ($accounts as $account)
	<tr>
      <th scope="row">{{$account->id}}</th>
      <th scope="row">{{$account->user->name}}</th>
      <td>{{$account->class_count}}</td>
      <td>{{$account->amount}}</td>
      <td>{{$account->status}}</td>
      <td><a href= "{{ url('/') }}/images/{{$account->image}}" target="_blank">{{$account->image}}</a></td>
      <td><a class="btn btn-outline-success">Approve</a></td>
    </tr>
	@endforeach

  </tbody>
</table>

</div>
</div>
@endsection

