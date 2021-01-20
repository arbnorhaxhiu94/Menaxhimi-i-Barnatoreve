@extends('layouts.main')
@include('layouts.navbar')
@section('content')

    <style type="text/css">
        
        #submit_button{
            width: 30%;
            padding: 10px 5px;
            background-color: #099619;
            border: 1px solid #099619;
            font-size: 14px;
            color: white;
            letter-spacing: 1px;
        }

        #submit_button:hover {
            background-color: white;
            color: #099619;
        }

    </style>


    <script type="text/javascript">

        // Data Picker Initialization        
            $(document).ready(function(){
                var date_input=$('input[name="date"]'); //our date input has the name "date"
                var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
                var options={
                    format: 'mm/dd/yyyy',
                    container: container,
                    todayHighlight: true,
                    autoclose: true,
                };
                date_input.datepicker(options);

            	
            })

    </script>
            <!-- Material form register -->
<div class="card col-8 offset-2" style="margin-top: 7em">

    <h5 class="card-header white-text text-center py-4" style="background-color: #099619; ">
        <strong>WORK TIME MANAGEMENT</strong>
    </h5>

    <!--Card content-->
    <div class="card-body px-lg-5 pt-0">
        
        
        <!-- Form -->
        <form class="text-center" id="worktimeForm" action="{{ route('workingTime') }}" method="POST" style="color: #757575;" >
            @csrf
            <div class="form-row">
                <div class="col">
                    <!-- First name -->
                    <div class="md-form">
                        <input type="text" name="firstname" id="materialRegisterFormFirstName" class="form-control">
                        <label for="materialRegisterFormFirstName">First name</label>
                    </div>
                </div>
                <div class="col">
                    <!-- Last name -->
                    <div class="md-form">
                        <input type="text" name="lastname" id="materialRegisterFormLastName" class="form-control">
                        <label for="materialRegisterFormLastName">Last name</label>
                    </div>
                </div>
            </div>

            <!-- E-mail -->
            <div class="md-form mt-0">
                <input type="email" name="email" id="materialRegisterFormEmail" class="form-control">
                <label for="materialRegisterFormEmail">E-mail</label>
            </div>

            <!-- Date picker -->
            <div class="form-row">
                <div class="col-md-6">
                    <div id="date-picker-example" class="md-form md-outline input-with-post-icon datepicker">
                      <input placeholder="Select date" name="date" type="text" class="form-control">
                      <label for="example">Date</label>
                      <i class="fas fa-calendar input-prefix" tabindex=0></i>
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="md-form md-outline input-with-post-icon timepicker" darktheme="true">
                      <input type="text" name="time" id="dark-version-example" class="form-control" placeholder="Select time">
                      <label for="dark-version-example">Time</label>
                      <i class="fas fa-clock  input-prefix"></i>
                    </div>
                  </div>
            </div>

            <!-- Phone number -->
            <div class="md-form">
                <input type="radio" name="action" value="checkin" /> Check in
                <input type="radio" name="action" value="checkout" /> Check out
                <input type="radio" name="action" value="pause" /> Pause
            </div>


            <!-- Sign up button -->
            <button id="submit_button" type="submit">SUBMIT</button>
        </form>

    </div>

</div>
<!-- Material form register -->
        </div>

@endsection
