<html>
<head>
	<title>Advanced Info</title>
</head>	
<?php include('options.php'); ?>

<!-- Font Awesome library -->
<script src="https://kit.fontawesome.com/aec5ef1467.js"></script>

<!-- JS libraries for datatables buttons-->
<script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.7.1/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.5/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.5/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>

<script src="../js/user-np.js"></script>

<!-- CSS for datatables buttons -->
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css"/>


<div class="container-fluid mt-3 mb-3">
	<h4>Employees</h4>
	
	<div class="pb-3">
		<button type="button" id="addEmployee" class="btn btn-primary btn-sm">Add Employee</button>
	</div> 
        	
	<div>
		<table id="table-employee" class="table table-bordered table-striped">
			<thead>
				<tr>
					<th>1</th>
					<!-- <th>2</th> -->
					<!-- <th>Email</th>
					<th>Job</th>
					<th>Store ID</th>
					<th>Salary</th>
					<th>DOB</th>
					<th>Address</th>
					<th>Actions</th> -->
				</tr>
			</thead>
		</table>
	</div>
</div>

<div id="employee-modal" class="modal fade">
	<div class="modal-dialog">
		<form method="post" id="employee-form">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Edit Employee</h4>
				</div>
				<div class="modal-body">
					<div class="form-group">

						<label>First name</label><input type="text" class="form-control" id="firstname" placeholder="Enter first name" required>
						
						<label>Last name</label> <input type="text" class="form-control" id="lastname" placeholder="Enter last name" required>
						
						<label>Email</label> <input type="email" class="form-control" id="email" placeholder="Enter email" required>

						<label>Address</label> <input type="text" class="form-control" id="address" placeholder="Enter address" required>
						
						<label>Salary</label> <input type="number" class="form-control" min="0.01" step="0.01" size="8" value="0" id="salary">
						
						<label>Job</label>
						<select class="form-control" id="job">
            			    <?php
            			        $sqlQuery = "SELECT DISTINCT(typeEMP) FROM EMPLOYEES ORDER BY typeEMP ASC";
            			        $stmt = $conn->prepare($sqlQuery);
            			        $stmt->execute();
            			        while ($row = $stmt->fetch()) {
            			            echo "<option value=\"" . $row["typeEMP"] . "\">" . $row["typeEMP"] . "</option>";
            			        }
                            ?>
            			</select>

					</div>
				</div>
				<div class="modal-footer">
					<input type="hidden" name="ID" id="ID"/>
					<input type="hidden" name="action" id="action" value=""/>
					<input type="submit" name="save" id="save" class="btn btn-info" value="Save" />
					<button type="button" class="btn btn-default" data-bs-dismiss="modal">Close</button>
				</div>
			</div>
		</form>
	</div>
</div>

</body>
</html>