@extends('layouts.dashboard_app')

@section('e-prescription')
  menu-open
@endsection
@section('e-prescription-active')
  active
@endsection
@section('dashboard_content')
    <!-- Main content -->

<div class="content-wrapper">
    @yield('dashboard_content')

    <div class="content">
      <div class="container-fluid">
        <div class="row">
        	<h3 class="pt-2 pl-3">E-Prscription settings</h3>
          <div class="col-12 mt-2">
          	<!-- /.row -->
	        <div class="card card-primary card-outline">
	          <div class="card-body">
	            <div class="row">
	              <div class="col-7 col-sm-9">
	                <div class="tab-content" id="vert-tabs-right-tabContent">
	                  <div class="tab-pane fade show active" id="vert-tabs-right-o-e" role="tabpanel" aria-labelledby="o/e">
	                     
					    <div class="content">
					      <div class="container-fluid">
					        <div class="row">
					          <div class="col-12">
					          	<div class="row">
					          		<div class="col-12">
					          			<div class="row mb-2">
					          				<div class="col-sm-6">
						            			<h4 class="pl-2">O/E</h4>
							            	</div>
							            	<div class="col-sm-6">
							            		<button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#addWeModal" data-whatever="@mdo">Add we</button>
							            	</div>
					          			</div>
					          		</div>
					            	  <!-- Add User Modal-->
									<div class="modal modal-primary fade" id="addWeModal" role="dialog" aria-labelledby="" aria-hidden="true" style="display: none;">
									    <div class="modal-dialog modal-sm">
									        <div class="modal-content">
									            <div class="modal-header">
									            	<h3>Add we</h3>
									                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
									            </div> 
									            <div class="modal-body formContainer">
									                <div class="row">
									                    <div class="col-12">
									                        <div class="form-group m-0">
									                            <label for="name" class="col-form-label">Name:</label>
											            		<input type="text" class="form-control" id="name" placeholder="Name" name="name" value="{{ old('name') }}">
									                        </div>
									                    </div>
									                </div>
									            </div>
									            <div class="modal-footer">
									                <button type="button" id="saveForm" class="btn btn-primary">Submit</button>
									            </div>

									        </div><!-- /.modal-content -->
									    </div><!-- /.modal-dialog -->
									</div>
					          	</div>
					          	<div class="card">
					              <div class="card-body">
					                <table class="table table-bordered data-table">
					                    <thead>
					                        <tr>
					                            <th>#</th>
					                            <th>Name</th>
					                            <th width="200px">Action</th>
					                        </tr>
					                    </thead>
					                    <tbody>
					                    </tbody>
					                </table>
					              <!-- /.card-body -->
					            </div>
					          </div>
					        </div>
					    </div>

					    </div>
					      <!-- /.container-fluid -->
					    </div>
					    <!-- /.content -->
	                  </div>
	                  <div class="tab-pane fade" id="vert-tabs-right-c-c" role="tabpanel" aria-labelledby="c/c-tab">
	                     -C/c Mauris tincidunt mi at erat gravida, eget tristique urna bibendum. Mauris pharetra purus ut ligula tempor, et vulputate metus facilisis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Maecenas sollicitudin, nisi a luctus interdum, nisl ligula placerat mi, quis posuere purus ligula eu lectus. Donec nunc tellus, elementum sit amet ultricies at, posuere nec nunc. Nunc euismod pellentesque diam.
	                  </div>
	                  <div class="tab-pane fade" id="vert-tabs-right-diagnosis" role="tabpanel" aria-labelledby="vert-tabs-right-diagnosis-tab">
	                     -diagnosis Morbi turpis dolor, vulputate vitae felis non, tincidunt congue mauris. Phasellus volutpat augue id mi placerat mollis. Vivamus faucibus eu massa eget condimentum. Fusce nec hendrerit sem, ac tristique nulla. Integer vestibulum orci odio. Cras nec augue ipsum. Suspendisse ut velit condimentum, mattis urna a, malesuada nunc. Curabitur eleifend facilisis velit finibus tristique. Nam vulputate, eros non luctus efficitur, ipsum odio volutpat massa, sit amet sollicitudin est libero sed ipsum. Nulla lacinia, ex vitae gravida fermentum, lectus ipsum gravida arcu, id fermentum metus arcu vel metus. Curabitur eget sem eu risus tincidunt eleifend ac ornare magna.
	                  </div>
	                  <div class="tab-pane fade" id="vert-tabs-right-test" role="tabpanel" aria-labelledby="vert-tabs-right-test-tab">
	                     <div class="row">
					          		<div class="col-sm-6">
				            			<h4 class="mt-4 pl-2">O/E</h4>
					            	</div>
					            	<div class="col-sm-6">
					            		<button id="addWeRow" type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#addWeModal" data-whatever="@mdo">Add we</button>
					            	</div>
					            	  <!-- Add User Modal-->
									<div class="modal modal-primary fade" id="addWeModal" role="dialog" aria-labelledby="" aria-hidden="true" style="display: none;">
									    <div class="modal-dialog modal-sm">
									        <div class="modal-content">
									            <div class="modal-header">
									            	<h3>Add</h3>
									                <button type="
									                " class="close" data-dismiss="modal" aria-hidden="true">×</button>
									            </div> 
									            <div class="modal-body formContainer">
									                <div class="row">
									                    <div class="col-12">
									                        <div class="form-group m-0">
									     
									                            <label for="name" class="col-form-label">Name:</label>
											            		<input type="text" class="form-control" id="name" placeholder="Name" name="name" value="{{ old('name') }}">
									                        </div>
									                    </div>
									                </div>
									            </div>
									            <div class="modal-footer">
									                <button type="button" id="saveForm" class="btn btn-primary">Submit</button>
									            </div>

									        </div><!-- /.modal-content -->
									    </div><!-- /.modal-dialog -->
									</div>
					          	</div>
						        <div class="card">
						              <div class="card-body">
						                <table id="OE_Table" class="table table-bordered">
						                    <thead>
						                        <tr>
						                            <th>#</th>
						                            <th>Name</th>
						                            <th width="200px">Action</th>
						                        </tr>
						                    </thead>
						                    <tbody>
						                    </tbody>
						                </table>
						              <!-- /.card-body -->
						            </div>
						        </div>
	                  </div>
	                  <div class="tab-pane fade" id="vert-tabs-right-advice" role="tabpanel" aria-labelledby="vert-tabs-right-advice-tab">
	                     -Advice Pellentesque vestibulum commodo nibh nec blandit. Maecenas neque magna, iaculis tempus turpis ac, ornare sodales tellus. Mauris eget blandit dolor. Quisque tincidunt venenatis vulputate. Morbi euismod molestie tristique. Vestibulum consectetur dolor a vestibulum pharetra. Donec interdum placerat urna nec pharetra. Etiam eget dapibus orci, eget aliquet urna. Nunc at consequat diam. Nunc et felis ut nisl commodo dignissim. In hac habitasse platea dictumst. Praesent imperdiet accumsan ex sit amet facilisis.
	                  </div>
	                  <div class="tab-pane fade" id="vert-tabs-right-madicine" role="tabpanel" aria-labelledby="vert-tabs-right-madicine-tab">
	                     -Medicine Pellentesque vestibulum commodo nibh nec blandit. Maecenas neque magna, iaculis tempus turpis ac, ornare sodales tellus. Mauris eget blandit dolor. Quisque tincidunt venenatis vulputate. Morbi euismod molestie tristique. Vestibulum consectetur dolor a vestibulum pharetra. Donec interdum placerat urna nec pharetra. Etiam eget dapibus orci, eget aliquet urna. Nunc at consequat diam. Nunc et felis ut nisl commodo dignissim. In hac habitasse platea dictumst. Praesent imperdiet accumsan ex sit amet facilisis.
	                  </div>
	                  <div class="tab-pane fade" id="vert-tabs-right-doseage" role="tabpanel" aria-labelledby="vert-tabs-right-doseage-tab">
	                     -Doseage Pellentesque vestibulum commodo nibh nec blandit. Maecenas neque magna, iaculis tempus turpis ac, ornare sodales tellus. Mauris eget blandit dolor. Quisque tincidunt venenatis vulputate. Morbi euismod molestie tristique. Vestibulum consectetur dolor a vestibulum pharetra. Donec interdum placerat urna nec pharetra. Etiam eget dapibus orci, eget aliquet urna. Nunc at consequat diam. Nunc et felis ut nisl commodo dignissim. In hac habitasse platea dictumst. Praesent imperdiet accumsan ex sit amet facilisis.
	                  </div>
	                  <div class="tab-pane fade" id="vert-tabs-right-dose-type" role="tabpanel" aria-labelledby="vert-tabs-right-dose-type-tab">
	                     -Dose Type Pellentesque vestibulum commodo nibh nec blandit. Maecenas neque magna, iaculis tempus turpis ac, ornare sodales tellus. Mauris eget blandit dolor. Quisque tincidunt venenatis vulputate. Morbi euismod molestie tristique. Vestibulum consectetur dolor a vestibulum pharetra. Donec interdum placerat urna nec pharetra. Etiam eget dapibus orci, eget aliquet urna. Nunc at consequat diam. Nunc et felis ut nisl commodo dignissim. In hac habitasse platea dictumst. Praesent imperdiet accumsan ex sit amet facilisis.
	                  </div>
	                  <div class="tab-pane fade" id="vert-tabs-right-dose-duration" role="tabpanel" aria-labelledby="vert-tabs-right-dose-duration-tab">
	                     -Dose Duration Pellentesque vestibulum commodo nibh nec blandit. Maecenas neque magna, iaculis tempus turpis ac, ornare sodales tellus. Mauris eget blandit dolor. Quisque tincidunt venenatis vulputate. Morbi euismod molestie tristique. Vestibulum consectetur dolor a vestibulum pharetra. Donec interdum placerat urna nec pharetra. Etiam eget dapibus orci, eget aliquet urna. Nunc at consequat diam. Nunc et felis ut nisl commodo dignissim. In hac habitasse platea dictumst. Praesent imperdiet accumsan ex sit amet facilisis.
	                  </div>
	                </div>
	              </div>
	              <div class="col-5 col-sm-3">
	                <div class="nav flex-column nav-tabs nav-tabs-right h-100" id="vert-tabs-right-tab" role="tablist" aria-orientation="vertical">
	                  <a class="nav-link active" id="o/e" data-toggle="pill" href="#vert-tabs-right-o-e" role="tab" aria-controls="vert-tabs-right-o-e" aria-selected="true">O/E</a>
	                  <a class="nav-link" id="c/c-tab" data-toggle="pill" href="#vert-tabs-right-c-c" role="tab" aria-controls="vert-tabs-right-c-c" aria-selected="false">C/C</a>
	                  <a class="nav-link" id="vert-tabs-right-diagnosis-tab" data-toggle="pill" href="#vert-tabs-right-diagnosis" role="tab" aria-controls="vert-tabs-right-diagnosis" aria-selected="false">Diagnosis</a>
	                  <a class="nav-link" id="vert-tabs-right-test-tab" data-toggle="pill" href="#vert-tabs-right-test" role="tab" aria-controls="vert-tabs-right-test" aria-selected="false">Test</a>

	                  <a class="nav-link" id="vert-tabs-right-advice-tab" data-toggle="pill" href="#vert-tabs-right-advice" role="tab" aria-controls="vert-tabs-right-advice" aria-selected="false">Advice</a>

	                  <a class="nav-link" id="vert-tabs-right-madicine-tab" data-toggle="pill" href="#vert-tabs-right-madicine" role="tab" aria-controls="vert-tabs-right-madicine" aria-selected="false">Medicine</a>
	                  <a class="nav-link" id="vert-tabs-right-doseage-tab" data-toggle="pill" href="#vert-tabs-right-doseage" role="tab" aria-controls="vert-tabs-right-doseage" aria-selected="false">Doseage</a>
	                  <a class="nav-link" id="vert-tabs-right-dose-type-tab" data-toggle="pill" href="#vert-tabs-right-dose-type" role="tab" aria-controls="vert-tabs-right-dose-type" aria-selected="false">Dose Type</a>
	                  <a class="nav-link" id="vert-tabs-right-dose-duration-tab" data-toggle="pill" href="#vert-tabs-right-dose-duration" role="tab" aria-controls="vert-tabs-right-dose-duration" aria-selected="false">Dose Duration</a>

	                </div>
	              </div>
	            </div>
	          </div>
	          <!-- /.card -->
	        </div>
	        <!-- /.card -->
          </div>
    	</div>
	  </div>
      <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->




<script type="text/javascript">
    var data_all      = {};
    var id            = "";
    var $name = $('#name');
    var $addWeModal = $('#addWeModal');

    // add / update
    $(document).on("click", "#addWeRow", function(){
        id = "";
    var $addWeModal = $('#addWeModal');
        $addWeModal.modal('show');
    });
    $("#saveForm").on("click",function(){
        data_all = Object.assign({},{'name': $.trim($name.val()), 'id': id });
        
        if( data_all.name ){
            $.ajax({
                'url': "api/e_prescription/storeE_prescription",
                'type': 'POST',
                'data': data_all,
                'dataType': "json",
                'success': function (data) {
                	//console.log(data);
                    if(data && data.id){
                        alert("O/E saved successfully");
                        id = "";
    				var $addWeModal = $('#addWeModal');
                        $addWeModal.modal('hide');
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
                'url': "api/e_prescription/fetchEO",
                'type': 'POST',
                'data': {'id' : id},
                'dataType': "json",
                'success': function (data) {
                    if (data) {
    				var $addWeModal = $('#addWeModal');
                        $addWeModal.modal('show');

                        setTimeout(function() {
                            $name.val(data.name);
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
                'url': "api/e_prescription/destroyE_prescription",
                'type': 'POST',
                'data': {'id' : id},
                'dataType': "json",
                'success': function (data) {
                	//console.log(data);
                    if (data && data.success) {
                        alert("E-prescription deleted successfully.");
                        //dataTable.ajax.reload();
                        window.location.href = "/e_prescription";
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

    var $addWeModal = $('#addWeModal');
    $addWeModal.on('hidden.bs.modal', function (e) {
        clearFields();
        id = "";
    })
    function clearFields(){
        $name.val("");
    }

    
    // dataTable js code start form here

    var dataTable = "";
    $(function () { 
        dataTable = $('.data-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "/api/e_prescription/E_prescriptionList",
            columns: [
                {data: 'DT_RowIndex', name: 'id', orderable: false, searchable: false},
                {data: 'name', name: 'name'},
                {data: 'id', name: 'action', orderable: false, searchable: false, 
                    "render": function ( data, type, row, meta ) {
                      return `<div class="btn-group" role="group">
                                <button id="btnGroupDrop1" type="button" class="btn btn-info dropdown-toggle btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  Option
                                </button>
                                <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                  <a data-id="${data}" class="dropdown-item editRow" href="javascript:void(0)" type="button">
                                    Edit
                                  </a>
                                  <a data-id="${data}" class="dropdown-item deleteRow" href="javascript:void(0)" type="button">
                                    Delete
                                  </a>
                                </div>
                              </div>`;
                    }
                },
            ],
        });
        
    });

</script>
@endsection

