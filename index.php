<?php 
include_once 'config.php';
 ?>

<!DOCTYPE html>
<html>
<head>
	<title>PHP CRUD Test</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
</head>
<body class="bg-light">
	<div class="container">
		<div class="row">
			<div class="col-md-8 mx-auto bg-dark rounded shadow py-3">
				<h1 class="text-center text-light  ">PHP CRUD TEST</h1>
			</div>
		</div>
		<div class="col-md-8 mx-auto">
			<div class="alert " id="alert">
				
			</div>
		</div>
		<div class="row my-1">
			<div class="col-md-8 mx-auto form-inline">
			<input type="search" name="item" class="form-control w-75 mx-0" placeholder="Search Item">
				<button class="btn btn-info ml-auto" onclick="show_model()" data-toggle="modal" data-target="data_model" data-whatever="@getbootstrap">Add Record</button>
			</div>
		</div>

		<div class="row">
			<div class="col-md-8 mx-auto bg-light shadow p-0">
				<table class="table table-hover table-white table-striped ">
					<thead class="bg-warning">	
						<th>#</th>
						<th>Name</th>
						<th>Phone</th>
						<th>Action</th>
					</thead>
					<tbody class="table-bordered" id="tbody">
						
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<!-- modal create and edit -->


	<div class="modal fade" id="data_model" tabindex="-1" role="dialog" aria-labelledby="data_model" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="data_model">Add Record</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="">
        <form id="data_form">
          <div class="form-group">
            <label for="recipient-name" class="col-form-label" >Name</label>
            <input type="text" required="" class="form-control" id="name">
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label" >Phone</label>
            <input type="number" required="" min="100000000" max="100000000000" class="form-control" id="phone">
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary save_data" id="save_data">Save</button>
      </div>
    </div>
  </div>
</div>

<!-- edit modal -->
	<div class="modal fade" id="edit_modal" tabindex="-1" role="dialog" aria-labelledby="edit_modal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="">Edit Record</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="modal_body">
       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-success" id="update_data">Update</button>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript">
function show_model() {
    $("#data_model").modal('show');
}

/*
 * Add Data
 */
$(document).ready(function() {
			
$(document).on('click',"#edit",function () {

    $("#edit_modal").modal('show');

    var id = $(this).data('id')
    $('#update_data').attr('data-id',id);

    $.ajax({
    	url:"./operate.php",
    	type:"GET",
    	data:{
    		type:"edit",
    		id:id
    	},
    	success: function (data) {
    		$("#modal_body").html(data)
	    	}

    })

});

            LoadData()
            
            $("#save_data").click(function() {
                var name = $("#name").val();
                var phone = $("#phone").val();
                $.ajax({
                    type: 'POST',
                    url: "./operate.php",
                    data: {
                        type: "create",
                        name:name,
                        phone:phone,
                    },

                    success: function(data) {
                    	console.log(data)
                            $("#alert").addClass("alert-success");
                            $("#alert").html("Added Successfully!")
                            $("#data_model").modal('hide');
                            LoadData()
                    }
                });
            });

            $("#update_data").click(function() {
                var id = $(this).data('id');
                var name = $("#ename").val();
                var phone = $("#ephone").val();
                console.log(id,name,phone)

                $.ajax({
                    data: {
                    	type:"update",
                    	id:id,
                    	name: name,
                    	phone: phone
                    },
                    type: "POST",
                    url: "./operate.php",
                    success: function(dataResult) {
                    	 $("#alert").addClass("alert-info");
                            $("#alert").html("Updated Successfully!")
                        LoadData()
				    $("#edit_modal").modal('hide');


                    }
                });
            });




            /*
             * Delete Data
             */
            $(document).on("click", "#delete", function() {

                if (confirm("Are You Sure?")) {
                    $.ajax({
                        url: "./operate.php",
                        type: "POST",
                        data: {
                            type: "delete",
                            id: $(this).data('id')
                        },
                        success: function(dataResult) {
                            LoadData();
                        }
                    });
                }
            });

            function LoadData() {
                $.ajax({
                    url: "./operate.php",
                    type: "GET",
                    data: {
                        type: "load",
                    },
                    success: function(dataResult) {
                    	
                        $("#tbody").html(dataResult);
                    },
                    error: function(error) {
                        console.log(error)
                    }
                });
            }
        });
</script>
</body>
</html>	