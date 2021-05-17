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
</div>