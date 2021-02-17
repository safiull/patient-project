@extends('layouts.dashboard_app')

@section('e-prescription')
  menu-open
@endsection
@section('user-active')
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
            <h1 class="m-0">User list</h1>
          </div><!-- /.col -->
            <div class="col-sm-12 col-md-6">
            <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#firstModal" data-whatever="@mdo">Add user</button>
                </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->



    @yield('dashboard_content')


    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
          	<div class="card">
              <div class="card-body">


                <table class="table table-bordered data-table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Created Date</th>
                            <th width="150px">Action</th>
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
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->


  <!-- Page specific script -->

  <!-- Add User Modal-->
<div class="modal modal-primary fade" id="firstModal" role="dialog" aria-labelledby="" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            	<h3>User</h3>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div> 
            <div class="modal-body formContainer">

                	<div class="row">
                    <div class="col-md-6">
                        <div class="form-group m-0">
                            <label for="name" class="col-form-label">Name:</label>
		            		<input type="text" class="form-control" id="name" placeholder="Name" name="name" value="{{ old('name') }}">
                        </div>
                        <div class="form-group m-0">
                            <label for="email" class="col-form-label">E-mail:</label>
		            		<input type="email" class="form-control" id="email" placeholder="E-mail" name="email" value="{{ old('email') }}">
                            <div id="email-error" class="text-danger"></div>

                        </div>
                    </div>
                   <div class="col-md-6">
                        <div class="form-group m-0">
                            <label for="password" class="col-form-label">Password:</label>
		            		<input type="password" class="form-control" id="password" placeholder="Password" name="password" value="{{ old('password') }}">
                            
                        </div>
                        <div class="form-group m-0">
                            <label for="password_confirmation" class="col-form-label">Confirm Password:</label>
		            		<input type="password" class="form-control" id="password_confirmation" placeholder="Confirm password" name="password_confirmation" value="{{ old('password_confirmation') }}">
                            <div id="password-error" class="text-danger"></div>
                            
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

<script type="text/javascript">
    var data_all = {};
    var $name = $('#name');
    var $email = $('#email');
    var $password = $('#password');
    var $password_confirmation = $('#password_confirmation');
    var $firstModal = $('#firstModal');
    var id = "";

    // add / update
    $("#saveForm").on("click",function(){
        data_all = Object.assign({},{'name': $.trim($name.val()), 'email': $.trim($email.val()), 'password': $.trim($password.val()), 'password_confirmation': $.trim($password_confirmation.val()), 'id': id });
        
        if( data_all.name && data_all.email && data_all.password && data_all.password_confirmation ){
            $.ajax({
                'url': "api/users/storeUser",
                'type': 'POST',
                'data': data_all,
                'dataType': "json",
                'success': function (data) {
                	//console.log(data);
                    if(data && data.id){
                        alert("saved successfully");
                        id = "";
                        $firstModal.modal('hide');
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
                            if(errors.password) {
                                const element = document.getElementById('password-error');
                                element.textContent = errors.password;
                            } else if (errors.email) {
                                const element = document.getElementById('email-error');
                                element.textContent = errors.email;
                            }
          			   }
      			    }
            });
        }
        else{
            alert("Field must not be empty");
        }
    });
    // edit fetch data
    $(document).on("click", ".editRow", function(){
        id = $(this).data("id");
        
        if(id){
            $.ajax({
                'url': "api/users/fetchUser",
                'type': 'POST',
                'data': {'id' : id},
                'dataType': "json",
                'success': function (data) {
                    if (data) {
                        $firstModal.modal('show');

                        setTimeout(function() {
                            $name.val(data.name);
                            $email.val(data.email);
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
                'url': "api/users/destroyUser",
                'type': 'POST',
                'data': {'id' : id},
                'dataType': "json",
                'success': function (data) {
                	//console.log(data);
                    if (data && data.success) {
                        alert("Deleted successfully.");
                        window.location.href = "/users";
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

    $firstModal.on('hidden.bs.modal', function (e) {
        clearFields();
        id = "";
    })
    function clearFields(){
        $name.val("");
        $email.val("");
        $password.val("");
        $password_confirmation.val("");
    }


    // dataTable js code start form here

    var dataTable = "";
    $(function () { 
        dataTable = $('.data-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "api/users/fetchUserList",
            columns: [
                {data: 'DT_RowIndex', name: 'id', orderable: false, searchable: false},
                {data: 'name', name: 'name'},
                {data: 'email', name: 'email'},
                {data: 'created_at', name: 'created_at'},
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

