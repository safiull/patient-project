<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Print Patient card</title>
  <script src="{{ asset('dashboard_assets') }}/plugins/jquery/jquery.min.js"></script>
  <link rel="stylesheet" href="{{ asset('dashboard_assets') }}/dist/css/adminlte.min.css">
  <link rel="stylesheet" href="{{ asset('') }}css/style.css">
</head>
<body>
<div class="wrapper">
  <!-- Main content -->
  <section class="invoice">
    <!-- Table row -->
    <div class="row">
      <div id="patient-card-print" class="p-2 border bg-light mt-3">
        <div class="text-center header">
          <img src="{{ asset('dashboard_assets') }}/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
          <h4 class="mb-0 mt-1">BRIT Medicare</h4>
          <p>H#452, R#08, Baridhara DOHS, Dhaka</p>
        </div>
        <div id="user-detail mt-4" style="font-size: 15px;">
          <p id="id" class="text-center mt-2" style="margin-bottom: 20px;font-size: 26px;"><span class="">ID: </span><span id="cardPatientID"></span></p>
          <p class="mb-1"><span class="font-weight-bold">Name: </span><span id="cardName"></span></p>
          <p class="mb-1"><span class="font-weight-bold">Mobile: </span><span id="cardMobile"></span></p>
          <p class="mb-1"><span class="font-weight-bold">Blood Group: </span><span id="cardBloodGroup"></span></p>
          <p class="mb-1"><span class="font-weight-bold">Sex: </span><span id="cardSex"></span></p>
        </div>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
<!-- ./wrapper -->
<!-- Page specific script -->
<!-- Bootstrap -->
<script src="{{ asset('dashboard_assets') }}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="{{ asset('dashboard_assets') }}/dist/js/adminlte.min.js"></script>


<!-- Page specific script -->
<script type="text/javascript">
    
    var id              = "";
    var $cardPatientID  = $('#cardPatientID');
    var $cardName       = $('#cardName');
    var $cardMobile     = $('#cardMobile');
    var $cardBloodGroup = $('#cardBloodGroup');
    var $cardSex        = $('#cardSex');
    
    // fetch data for card
    function fetchPatient(){
        id = {{ $id }};
        
        if(id){
            $.ajax({
              'url': "/api/patient/fetchPatient",
              'type': 'POST',
              'data': {'id' : id},
              'dataType': "json",
              'success': function (data) {
                  if (data) {
                      //$cardModal.modal('show');

                      setTimeout(function() {
                          $cardPatientID.html(data.patient_id);
                          $cardName.html(data.patient_name);
                          $cardMobile.html(data.mobile);
                          $cardBloodGroup.html(data.blood_group);
                          $cardSex.html(data.sex);
                          window.addEventListener("load", window.print());
                       }, 500);
                      
                  }
              }
            });
        }
        else{
            alert("Error");
        }
    }

    
    window.onload = function(){
      fetchPatient();
      
    }


</script>
</body>
</html>
