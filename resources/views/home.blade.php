@extends('layouts.app')

@section('content')
        

<div class="container">
    <div class="row justify-content-center">
        @if ($user_details -> suburb)
        @include('booking_calendar')
        @include('mid-row')
        @else 
        @include('add_details')
        @endif
         <div class="mt-2 col-sm-4">
            <div class="card">
                <div class="card-header">{{$user_details->name}}: Your Lessons</div>
                <div class="card-body">
                    @if (!$user_details->suburb)
<div class="alert alert-danger fade show" role="alert">
  Please fill in the details before booking your lessons!
  </button>
</div>
                    @elseif (!$user_bookings && $user_details->suburb)
<div class="alert alert-danger fade show" role="alert">
  Please chose your lessons from the calendar!. Lessons are available after: <strong>date</strong> 
  </button>
</div>

                    @elseif ($user_bookings)
<div class="alert alert-primary alert-dismissible fade show" role="alert">
  The next Lesson is available after: <strong id = "next-date">date</strong> 
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
   <button class="btn btn-danger float-right" onclick="clearAll()">Clear All</button>

                    @include('booked_lessons')
                    @endif
                </div>
            </div>
         </div>
   </div>
</div>
@endsection

<script type="text/javascript">
  function clearAll(){
var r = confirm("Are you sure?");
if (r == true) {
            var $j = jQuery.noConflict();
            $j.ajax({
            url: '/clear_all',
            type: 'GET',
            success: function (data){
              alert(data);
              location.reload();            },
            error: function(error){
              alert("Something went wrong");
            }
});
} else {
  location.reload();
}
  }
</script>