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
        <h5 class="modal-title" id="exampleModalLabel">Payment Summary</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        @if ($user_bookings->count()>=10)
        <span class="text-danger">Total Classes :</span> 10<br>
        <span class="text-danger">Total Cost :</span> {{$user_bookings->count()}}* AUD65 = AUD{{$user_bookings->count()*65}}
        @else
        <span class="text-danger">Total Classes :</span> {{$user_bookings->count()}}<br>
        <span class="text-danger">Total Cost :</span> {{$user_bookings->count()}}* AUD75 = AUD{{$user_bookings->count()*75}}
        @endif
        <hr>
        <small class="text-muted">Please Pay the amount to the following account and upload the screenshot. <br>Tip: Use mobile phone for ease.</small><br>
        <span class="text-muted"><u>Account Name</u>: Global Driving School Canberra<br><u>BSB</u>:XXXX<br> <u>Account</u>: XXXXXX</span><hr>
        <input type="file">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Finalise</button>
      </div>
    </div>
  </div>
</div>
</div>