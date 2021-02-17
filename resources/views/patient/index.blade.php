@extends('layouts.dashboard_app')


@section('patientlist')
  menu-open
@endsection
@section('patient-active')
  active
@endsection
@section('dashboard_content')
    <!-- Main content -->

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Patient list</h1>
          </div><!-- /.col -->
            <div class="col-sm-12 col-md-6">
              <button type="button" class="btn btn-primary float-right" id="addRow">Add patient registration</button>

					    <div class="modal fade" id="patientModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    					  <div class="modal-dialog" role="document">
    					    <div class="modal-content">
    					      <div class="modal-header">
    					        <h5 class="modal-title" id="exampleModalLabel">Patient</h5>
    					        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    					          <span aria-hidden="true">&times;</span>
    					        </button>
    					      </div>
    					      <div class="modal-body">
    					          <div class="form-group m-0">
    					            <div class="row">
    					            	<div class="col-6">
    					            		<label for="patient_name" class="col-form-label">Name <span class="text-danger">*</span></label>
    					            		<input type="text" class="form-control" id="patient_name" name="patient_name" placeholder="name">
                              
    					            	</div>
                            <div class="col-6">
                              <label for="address" class="col-form-label">Address <span class="text-danger">*</span></label>
                              <input type="text" class="form-control" id="address" name="address" placeholder="Address">
                            </div>
    					            </div>
    					          </div>
                        <div class="form-group m-0">
                          <div class="row">
                            <div class="col-6">
                              <label for="mobile" class="col-form-label">Mobile <span class="text-danger">*</span></label>
                              <input type="number" class="form-control" id="mobile" name="mobile" placeholder="Mobile">

                              <div id="mobile-error" class="text-danger"></div>
                            </div>
                            <div class="col-6">
                              <label for="blood_group" class="col-form-label">Blood group <span class="text-danger">*</span></label>
                              <select class="form-control" id="blood_group" name="blood_group">
                                <option value="">Select</option>
                                <option value="A+">A+</option>
                                <option value="AB+">A-</option>
                                <option value="AB+">AB+</option>
                                <option value="AB-">AB-</option>
                                <option value="B+">B+</option>
                                <option value="B-">B-</option>
                                <option value="O+">O+</option>
                                <option value="O-">O-</option>
                              </select>
                            </div>
                          </div>
                        </div>
                        <div class="form-group m-0">
                          <div class="row">
                            <div class="col-6">
                              <label for="age" class="col-form-label">Age <span class="text-danger">*</span></label>
                              <input type="text" class="form-control" id="age" name="age" placeholder="Age">
                            </div>
                            <div class="col-6">
                              <label for="sex" class="col-form-label">Sex <span class="text-danger">*</span></label>
                              <select class="form-control" id="sex" name="sex">
                                <option value="">Select</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                                <option value="Others">Others</option>
                              </select>
                            </div>
                          </div>
                        </div>
    					      </div>
    					      <div class="modal-footer">
    					        <button type="button" id="saveForm" class="btn btn-primary">Submit</button>
    					      </div>
    					    </div>
    					  </div>
					    </div>
              {{-- Patient card modal --}}

              <div class="modal fade" id="cardModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-sm" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Patient Card</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <div id="patient-card" class="p-2 border">
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
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-success printRow"><i class="fas fa-print"></i> Print</button>
                    </div>
                  </div>
                </div>
              </div>

              <div class="modal fade" id="prescriptionModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Patient Prescription</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      {{-- ####### Doctor and hospital detail part ###### --}}
                      {{-- ####### Doctor and hospital detail part ###### --}}
                      <div style="border-bottom: 1px solid black;" id="" class="bg-info">
                        <div class="row justify-content-between p-2">
                          <div class="col-sm-6">
                            <p class="mb-0">
                              <span class="font-weight-bold">Doctor name : </span><span>Dr. Md. Hamidul Karim</span>
                            </p>
                            <p class="mb-0">
                              <span class="font-weight-bold">Doctor designation: </span><span>Professor & Chairman</span>
                            </p>
                            <address class="mb-0">
                              <p class="mb-0">H#452, R#08, Baridhara DOHS, Dhaka</p>
                            </address>
                            <p>
                              <span class="font-weight-bold">Mobile: </span> <span> 01878773424</span>
                            </p>
                          </div>
                          <div class="col-sm-4 p-2">
                            <div class="">
                              <div class="text-right">
                                <img src="{{ asset('dashboard_assets') }}/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8; width: 50px;">
                              </div>
                              <div class="text-right">
                                <h4 class="mb-0 mt-1 font-weight-bold">BRIT Medicare</h4>
                                <p class="mb-0">H#452, R#08, Baridhara DOHS, Dhaka</p>
                                <p class="mb-0">
                                  <span>Mobile: </span> <span>0154646546</span>
                                </p>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      {{-- ####### Patient detail part ###### --}}
                      {{-- ####### Patient detail part ###### --}}
                      <div style="padding-bottom: 0 !important;" class="p-2">
                        <div class="row pb-2" style="border-bottom: 1px solid black;">
                          <div class="col-md-4 text-center">
                            <span>Name: </span> <span>Mahbubur Rahman</span>
                          </div>
                          <div class="col-md-2">
                            <span>Age: </span> <span>41</span>
                          </div>
                          <div class="col-md-2">
                            <span>Sex: </span> <span>Male</span>
                          </div>
                          <div class="col-md-4">
                            <span>Date: </span> <span>12/12/2200</span>
                          </div>
                        </div>
                      </div>

                      {{-- ######## Office main part ####### --}}
                      {{-- ######## Office main part ####### --}}

                      <div class="pl-2">
                        <div class="row">
                          <div style="border-right: 1px solid black;" class="col-md-3">
                            <p>O/E</p>
                            <br>
                            <br>
                            <p>C/C</p>
                            <br>
                            <br>
                            <p>Diagnosis</p>
                            <br>
                            <br>
                            <p>Test</p>
                            <br>
                            <br>
                          </div>
                          <div class="col-md-2">
                            <p>Rx</p>
                            <br><br><br>
                            <br><br><br>
                            <br><br><br>
                            <p>Advice</p>
                          </div>
                          <div class="col-md-7 mt-5">
                            <p>
                              <span>Napa - </span> <span>1+0+1 - </span> <span>খাবার পরে - </span> <span>7 din</span>
                            </p>
                            <p>
                              <span>Napa Extra - </span> <span>1+0+1 - </span> <span>খাবার পরে - </span> <span>7 din</span>
                            </p>
                            <p>
                              <span>Napa Model - </span> <span>1+0+1 - </span> <span>খাবার পরে - </span> <span>7 din</span>
                            </p>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="modal-footer bg-light">
                      <button type="button" class="btn btn-success printPrescription"><i class="fas fa-print"></i> Print</button>
                      <button type="button" class="btn btn-success saveRow"><i class="fas fa-save"></i> Save</button>
                    </div>
                  </div>
                  </div>
                </div>
              </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div><!-- /.content-header -->
    

    <div class="content">
      <div class="container-fluid">

        <div class="row">
          <div class="col-12">

          	<div class="card">
              <div class="card-body">
                  <div class="row mt-3">
                    <div class="col-sm-12">
                      <table id="patientTable" class="table table-bordered table-striped dtr-inline data-table" role="grid" aria-describedby="example1_info">
                        <thead>
                          <tr>
                            <th>Patient ID</th>
                            <th>Name</th>
                            {{-- <th>Created Date</th> --}}
                            <th>Address</th>
                            <th>Mobile</th>
                            <th>Blood Group</th>
                            <th>Age</th>
                            <th>Sex</th>
                            <th class="not-export-col">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                        </tbody>
                      </table>
                    </div>
                  </div>


                </div><!-- /.card-body -->
            </div>

          </div>
        </div>

      </div>
    </div><!-- /.content -->

</div><!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
<script type="text/javascript">
    var data_all      = {};
    var $patient_name = $('#patient_name');
    var $address      = $('#address');
    var $mobile       = $('#mobile');
    var $blood_group  = $('#blood_group');
    var $age          = $('#age');
    var $sex          = $('#sex');
    var $patientModal   = $('#patientModal');
    var $cardModal   = $('#cardModal');
    var $prescriptionModal   = $('#prescriptionModal');
    var id            = "";
    var $cardPatientID       = $('#cardPatientID');
    var $cardName       = $('#cardName');
    var $cardMobile       = $('#cardMobile');
    var $cardBloodGroup = $('#cardBloodGroup');
    var $cardSex       = $('#cardSex');

    // add / update
    $(document).on("click", "#addRow", function(){
        id = "";
        $patientModal.modal('show');
    });
    $("#saveForm").on("click",function(){
        data_all = Object.assign({},{'patient_name': $.trim($patient_name.val()), 'address': $.trim($address.val()), 'mobile': $.trim($mobile.val()), 'blood_group': $.trim($blood_group.val()), 'age': $.trim($age.val()), 'sex': $.trim($sex.val()), 'id': id });
        
        if( data_all.patient_name && data_all.address && data_all.mobile && data_all.blood_group && data_all.age && data_all.sex ){
            $.ajax({
                'url': "api/e_prescription/storeE_Prescription",
                'type': 'POST',
                'data': data_all,
                'dataType': "json",
                'success': function (data) {
                	//console.log(data);
                    if(data && data.id){
                        alert("Patient saved successfully");
                        id = "";
                        $patientModal.modal('hide');
                        dataTable.ajax.reload();
                    }
                },
                error: function (request, status, error) {
    			       if(request.responseText){
    			       	 response = JSON.parse(request.responseText);
    			       	 message = response.message;
    			       	 errors = response.errors;
    			       	 for (const [key, value] of Object.entries(errors)) {
          						//console.log(`${key}: ${value}`);
          						message += "\n" + `${key}: ${value}`;
          					 }
          					 alert(message);

                    // here is code for error message below the input field.
                    // if(errors.mobile) {
                    //     const element = document.getElementById('mobile-error');
                    //     element.textContent = errors.mobile;
                    // }

          			}
      			  }
          });
        }
        else{
          alert('Field must not be empty');
        }
    });
    // edit fetch data
    $(document).on("click", ".editRow", function(){
        id = $(this).data("id");
        
        if(id){
            $.ajax({
                'url': "api/patient/fetchPatient",
                'type': 'POST',
                'data': {'id' : id},
                'dataType': "json",
                'success': function (data) {
                    if (data) {
                        $patientModal.modal('show');

                        setTimeout(function() {
                            $patient_name.val(data.patient_name);
                            $address.val(data.address);
                            $mobile.val(data.mobile);
                            $blood_group.val(data.blood_group);
                            $age.val(data.age);
                            $sex.val(data.sex);
                         }, 500);
                        
                    }
                }
            });
        }
        else{
            alert("Error");
        }
    });

    // delete
    $(document).on("click", ".deleteRow", function(){
        id = $(this).data("id");
        
        if(id && confirm("Are you sure?") ){
            $.ajax({
                'url': "api/patient/destroyPatient",
                'type': 'POST',
                'data': {'id' : id},
                'dataType': "json",
                'success': function (data) {
                	//console.log(data);
                    if (data && data.success) {
                        alert("Patient deleted successfully.");
                        //dataTable.ajax.reload();
                        window.location.href = "/patients";
                    }
                    else{
                    	alert('Error');
                    }
                }
            });
        }
        else{
            //alert("Error");
            return false;
        }
    });

    // fetch data for card
    $(document).on("click", ".cardRow", function(){
        id = $(this).data("id");
        
        if(id){
            $.ajax({
                'url': "api/patient/fetchPatient",
                'type': 'POST',
                'data': {'id' : id},
                'dataType': "json",
                'success': function (data) {
                    if (data) {
                        $cardModal.modal('show');

                        setTimeout(function() {
                            $cardPatientID.html(data.patient_id);
                            $cardName.html(data.patient_name);
                            $cardMobile.html(data.mobile);
                            $cardBloodGroup.html(data.blood_group);
                            $cardSex.html(data.sex);
                         }, 500);
                        
                    }
                }
            });
        }
        else{
            alert("Error");
        }
    });

    // Prescription 
    $(document).on("click", ".prescriptionRow", function(){
        id = $(this).data("id");
        
        if(id){
            $.ajax({
                'url': "api/patient/fetchPatient",
                'type': 'POST',
                'data': {'id' : id},
                'dataType': "json",
                'success': function (data) {
                    if (data) {
                        $prescriptionModal.modal('show');

                        setTimeout(function() {
                            // $cardPatientID.html(data.patient_id);
                            // $cardName.html(data.patient_name);
                            // $cardMobile.html(data.mobile);
                            // $cardBloodGroup.html(data.blood_group);
                            // $cardSex.html(data.sex);
                         }, 500);
                        
                    }
                }
            });
        }
        else{
            alert("Error");
        }
    });


    // ##################  Custom code for print button  #############
    // ##################  Custom code for print button  #############

    $(document).on("click", ".printRow", function(){
        if (id) {
          window.location.href = "/patient/card/" + id;
        }
    });


    $patientModal.on('hidden.bs.modal', function (e) {
        clearFields();
        id = "";
    })
    function clearFields(){
        $patient_name.val("");
        $address.val("");
        $mobile.val("");  
        $blood_group.val("");
        $age.val("");
        $sex.val("");
    }

    var patientTable = "";
    function initializeTable() {

        patientTable = $('#patientTable').DataTable({
            "responsive": true, "lengthChange": true, "autoWidth": false,
            buttons: ["copy", "csv", "excel", "pdf", "print", "colvis"],
            processing: true,
            serverSide: true,
            ajax: "api/patient/fetchPatientList",
            order: [0, 'desc'],
            columns: [
                {data: 'patient_id', name: 'patient_id'},
                {data: 'patient_name', name: 'patient_name'},
                {data: 'address', name: 'address'},
                {data: 'mobile', name: 'mobile'},
                {data: 'blood_group', name: 'blood_group'},
                {data: 'age', name: 'age'},
                {data: 'sex', name: 'sex'},
                {data: 'id', name: 'action', orderable: false, searchable: false,
                  "render": function ( data, type, row, meta ) {
                      return `<div class="btn-group" role="group" aria-label="Button group with nested dropdown" >
                              <div class="btn-group" role="group">
                                <button style="" id="btnGroupDrop1" type="button" class="btn btn-info dropdown-toggle btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  Option
                                </button>
                                <div class="dropdown-menu show-left" aria-labelledby="btnGroupDrop1" style="left: inherit !important;right: 0 !important;">
                                  <a data-id="${data}" class="dropdown-item prescriptionRow" href="javascript:void(0)" type="button">
                                    Prescription
                                  </a>
                                  <a data-id="${data}" class="dropdown-item cardRow" href="javascript:void(0)" type="button">
                                    Patient Card
                                  </a>
                                  <a data-id="${data}" class="dropdown-item editRow" href="javascript:void(0)" type="button">
                                    Edit
                                  </a>
                                  <a data-id="${data}" class="dropdown-item deleteRow" href="javascript:void(0)" type="button">
                                    Delete
                                  </a>
                                </div>
                              </div>
                            </div>`;
                    }
              },

            ],
        });
        
        //  This code for copy print pdf button
        new $.fn.dataTable.Buttons( patientTable, {buttons: dataTableButtons} );
        patientTable.buttons().container().appendTo('#patientTable_wrapper .col-md-6:eq(0)');
    }
      // when full page loaded successfully then open a new window
    window.onload = function(){
      initializeTable();
    }

</script>
@endsection