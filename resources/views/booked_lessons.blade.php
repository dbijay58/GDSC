<div class="container flex">
<table class="table">
	<thead>
		<tr>
			<th>SN</th>
			<th>Date</th>
			<th>Time</th>
			<th>Status</th>
		</tr>
		@foreach ($user_bookings as $user_booking)
		<tr>
			<td>{{$loop->iteration}}</td>
			<td>{{\Carbon\Carbon::parse($user_booking->lesson_date)->format('j M')}}</td>
			<td>{{\Carbon\Carbon::parse($user_booking->lesson_time)->format('g:i A')}}</td>
			<td>{{$user_booking->booking_status}}</td>
			
		</tr>
		@endforeach
	</thead>
</table>
@if ($user_bookings->count()>0)
<button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">Confirm and Pay</button>
@endif


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
</div>