<?php 
session_start();
include_once 'config.php';
if (!isset($_SESSION['user'])){
  header("Location: login.php");
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>PHP Phone Directory</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
</head>
<input type="checkbox" name="" class="form-check-input" id="">
<body class="bg-light">
	<div class="container">
		<div class="row" >
			<div class="col-md-8 mx-auto bg-dark rounded shadow py-3">
				<h1 class="text-center text-light">PHP Phone Directory</h1>
			</div>
		</div>
		<div class="col-md-8 mx-auto">
            <?php if (!empty($_REQUEST['resback'])){
                echo '<div class="alert " id="alert">
                '.$_REQUEST['resback'].'
            </div>';

            } ?>
                
			<div class="alert " id="alert">
				
			</div>
		</div>
		<div class="row my-1">
			<div class="col-md-8 mx-auto form-inline">
			<input type="search" name="item" id="item" onkeyup="LoadData()" class="form-control w-75 mx-0" placeholder="Search Item">
				<button class="btn btn-info ml-auto" onclick="show_model()" data-toggle="modal" data-target="data_model" data-whatever="@getbootstrap">Add Record <i class="fas fa-user-plus"></i></button>
                <a href="export_to_csv.php" class="btn btn-secondary my-2">Export CSV <i class="fas fa-file-csv"></i></a>
                <button class="ml-1 btn btn-primary my-2" id="importCSV" onclick="importCSV()" data-toggle="modal" data-target="importCSV_model" data-whatever="@getbootstrap">Import CSV <i class="fas fa-file-csv"></i></button>
                <a href="save_to_pdf.php" class="ml-1 btn btn-warning my-2">Save PDF <i class="fas fa-file-pdf"></i></a>
                <button class="ml-1 btn btn-danger my-2" id="deleteChecked" >Delete Checked <i class="fas fa-trash-alt"></i> </buttobutton>
			</div>
		</div>

		<div class="row">
			<div class="col-md-8 mx-auto bg-light shadow p-0 ">
				<table class="table table-hover table-white table-striped ">
					<thead class="bg-warning">	
						<th>#</th>
						<th>Name</th>
						<th>Phone</th>
						<th>Action</th>
					</thead>
					<tbody class="table-bordered " id="tbody">
						
					</tbody>
				</table>
			</div>
		</div>
	</div>
  <br>
    <footer class="mt-4">
        <div class="container mt-auto ">
        <div class="row">
            <div class="col-md-8 mx-auto bg-dark rounded shadow py-1">
                <p class="text-center text-light  ">&copy By <a href="www.githib.com/tauseedzaman">Tauseed Zaman</a></p>
            </div>
        </div>    </footer>

    <!-- Import csv Modal  -->
    <div class="modal fade" id="importCSV_model" tabindex="-1" role="dialog" aria-labelledby="importCSV_model" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="import_data_model">Import Data From CSV File</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="">
        <form id="importCSV_form" method="post" action="import_csv.php" enctype="multipart/form-data" >
          <div class="form-group" >
            <label for="recipient-name" class="col-form-label" >Choose .csv file</label>
            <input type="file" required="" name="file" class="form-control-file" id="">
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success " id="">Import</button>
      </div>
        </form>
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
<script type="text/javascript" >

function importCSV() {
        $("#importCSV_model").modal('show');

}


function show_model() {
    $("#data_model").modal('show');
}

/*
 * Add Data
 */
$(document).ready(function() {
    $("#alert").hide();
			
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
                             $("#alert").removeClass("alert-info");
                            $("#alert").removeClass("alert-danger");
                            $("#alert").addClass("alert-success");
                            $("#alert").html("Added Successfully!")
                            $("#data_model").modal('hide');
                            $("#phone").val('');
                            $("#name").val('');
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
                        $("#alert").removeClass("alert-danger");
                            $("#alert").removeClass("alert-success");
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
                            $("#alert").removeClass("alert-info");
                            $("#alert").removeClass("alert-success");
                            $("#alert").addClass("alert-danger");
                            $("#alert").html("Deleted Successfully!")
                            LoadData();

                        }
                    });
                }
            });





        });
            function LoadData() {
                var item = $("#item").val();
                $.ajax({
                    url: "./operate.php",
                    type: "GET",
                    data: {
                        type: "load",
                        item: item,
                    },
                    success: function(dataResult) {
                        if (dataResult) {
                            $("#tbody").html(dataResult);
                        }else
                        {
                            $("#tbody").html('<h1 class="text-danger p-3">No Data!!</h1>');
                        }
                    },
                    error: function(error) {
                        console.log(error)
                    }
                });
            }



            $(document).on('click',"#checked",function () {
              let x = $(this).data('id');
              alert(x);
            });

            
$(document).on('click','#deleteChecked',function () {
  
  let x = document.querySelectorAll("#check");
  let list = Array();
  let i=0;
  if(confirm("Are You Sure?")){

    x.forEach(element => {
      
      if(element.checked){
        list[i] = element.getAttribute("data-id");
        i++;
      }
    });
    
    if(list.length > 0){
      $.ajax({
                        url: "./operate.php",
                        type: "POST",
                        data: {
                            type: "deleteChecked",
                            ids: list
                        },
                        success: function(dataResult) {
                            $("#alert").removeClass("alert-info");
                            $("#alert").removeClass("alert-success");
                            $("#alert").addClass("alert-danger");
                            $("#alert").html("Deleted Successfully!")
                            LoadData();
                             }
                    });
    }else{
      alert("Please Check Rows You wants to delete!");
    }
                      
                    }
});
                    
                    
                

</script>
<!-- <script src="js/script.js"></script> -->

</body>
</html>	