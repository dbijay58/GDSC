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
        <form action="image_upload" method="post" id="payment_form" enctype="multipart/form-data">

        <span class="text-danger">Total Classes :</span>
        <input class="form-control" name="class_count" disabled value="{{$user_bookings->where('booking_status','ENTRY')->count()}}">

        <span class="text-danger">Total Amount(in AUD) :</span>
        @if ($user_bookings->count()>=10)
        <input class="form-control" name="amount" disabled value="{{$user_bookings->where('booking_status','ENTRY')->count()*65}}">
        @else
        <input class="form-control" name="amount" disabled value="{{$user_bookings->where('booking_status','ENTRY')->count()*75}}">
        @endif

        <hr>
        <small class="text-muted">Please Pay the amount to the following account and upload the screenshot. <br>Tip: Use mobile phone for ease.</small><br>
        <span class="text-muted"><u>Account Name</u>: Global Driving School Canberra<br><u>BSB</u>:XXXX<br> <u>Account</u>: XXXXXX</span><hr>
          @csrf
          <input type="file" name="image">
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" form="payment_form">Finalise</button>
      </div>
    </div>
  </div>
</div>
</div>