<ul class="nav nav-tabs d-lg-none d-sm-block" id="nav-tab" >
  <li class="nav-item">
    <a class="nav-link active" aria-current="page" id="calendar-button" href="#">Calendar</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#" id="bookings-button">Bookings(@if($user_bookings){{count($user_bookings)}}@endif)</a>
  </li>
</ul>

<div class="mt-2 col-sm-4 d-flex justify-content-center" id="datepicker" style=""></div>
      <script>
          var $j = jQuery.noConflict();
          $j(function() {

            $j('#bookings-button').click(function(){
                $j("#datepicker").datepicker('destroy');
                $j('#available-lessons').hide();
                $j(this).addClass('active');
                $j('#calendar-button').removeClass('active');
            });
            $j('#calendar-button').click(function(){
                $j("#datepicker").datepicker();
                $j('#available-lessons').show();
                $j(this).addClass('active');
                $j('#bookings-button').removeClass('active');
            });

         $j('#loading-image').hide();

          $j("#datepicker").datepicker({dateFormat: "yy-mm-dd", });
          $j("#datepicker").on("change",function(){
            var selected = $(this).val();
            $j('#mid-row-text').hide();
            $j('#selected-date-header').text(selected);
            $j('#selected-date').text("");
            $j('#loading-image').show();
          $j.ajax({
            url: '/get_available_slots',
            type: 'GET',
            data: {date: selected},

            success: function (data){
            $j.each(data, function(i,item){
                var button = $("<a class='btn btn-success m-1'></a").text(data[i]);
                //button.attr("href","/insert?date="+selected+"&time="+data[i]);
                button.click(function(){
                            $j.ajax({
            url: '/insert',
            type: 'GET',
            data: {date: selected, time: data[i]},

            success: function (data){
              alert('Success');
              location.reload();
            },
            error: function(error){
              alert("Some error occured. Please contact GDSC");
            }
          });

                });
                $j('#selected-date').append(button);
            $j('#loading-image').hide();

            });
    },
    error: function(error){
      console.log(error);
      $j('#loading-image').hide();

    }
        });
        });
        });

      </script>
