        <div class="col-md-7">
            <div class="card">
                <div class="card-header">{{ __('Additional Student Details') }}</div>

                <div class="card-body">
                    <form method="POST" action = "{{url('submit_add_details')}}">
                        @csrf
                        Phone Number
               <input type="text" class="form-control" name="phone" placeholder="Enter your Phone Number" required><br>

                        Street Address
              <input type="text" class="form-control" name="st_address" placeholder="Enter Full Address" required><br>
            Suburb
              <select class="form-control" name="suburb" required>

                  <option value = '1'>Belconnen</option>
                 <option value = '2'>Gungahlin</option>
                  <option value = '3'>Franklin</option>

              </select><br>
              Post Code
            <input type="text" class="form-control" name="post_code" placeholder="Enter Your Post Code" required><br>


              Previous Driving Experience
              <select class="form-control" name="driving_exp" required>
                  <option value = '1'>less than 6 months</option>
                 <option value = '2'>6 months - 1 year</option>
                  <option value = '3'>1 year+</option>

              </select><br>
              Lesson Package
              <select class="form-control" name="lesson_package" required>
                 <option value='1'>10 hour : $650</option>
                 <option value='2'>5 hour : $350</option>
                <option value='3'>Free Classes</option>
                <option value='4'>Other</option>

              </select><br>
Learner licence expiry date
              <input type="date" class="form-control" name="l_licence_date" placeholder="Enter Full Address" required><br>
              Learner licence issue state
              <select class="form-control" name="l_licence_state">
                 <option>ACT</option>
                 <option>NSW</option>
                 <option>VIC</option>

              </select><br>
Date of Birth
              <input type="date" class="form-control" name="dob" placeholder="" required><br>
                            Do you have valid international licence?
              <select class="form-control" name="intl_licence" required>
                 <option value='1'>Yes</option>
                 <option value='0'>No</option>

              </select><br>

        <input type="submit" class="btn btn-primary" value="Ready to drive !">
                    </form>
                </div>
            </div>
        </div>
