<?php

function studentInformation($first_name, $last_name, $gender, $address, $email_id, $mobile, $category, $department, $programme, $roll_number){
echo'
        <br/>
        <div class="card">
            <div class="card-body">
              <center>Personal Information</center>
              <br/><hr/>
              
              <div class="row">
                <div class="col-sm-3 col-md-6">
                    First Name : '.$first_name.'
                </div>
                <div class="col-sm-9 col-md-6">
                  Last Name : '.$last_name.'
                </div>
                <br/>
                <div class="col-sm-3 col-md-6">
                    Gender : '.$gender.'
                </div>
                <div class="col-sm-9 col-md-6">
                  Address : '.$address.'
                </div>
                <div class="col-sm-9 col-md-6">
                  Email ID : '.$email_id.'
                </div>
                <div class="col-sm-9 col-md-6">
                  Mobile Number : '.$mobile.'
                </div>
              </div>

              <br/><br/><hr/>

                <center>Educational Details</center>
                <br/><hr/>

                <div class="row">
                    <div class="col-sm-3 col-md-6">
                        Category : '.$category.'
                    </div>
                    <div class="col-sm-9 col-md-6">
                      Department : '.$department.'
                    </div>
                    <br/>
                    <div class="col-sm-3 col-md-6">
                        Programme : '.$programme.'
                    </div>
                    <div class="col-sm-9 col-md-6">
                      Roll Number : '.$roll_number.'
                    </div>
                  </div>

              </div>
            </div>
';
}
?>