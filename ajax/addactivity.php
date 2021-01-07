<?php

var_dump($_POST);
if(!empty($_GET['addbutton']))
{
	echo "clicked";
	header("Location: MCHOIMS2/homeOIC.php#ajax/addactivity.php");
}

?> 
<div class="row">
	<div id="breadcrumb" class="col-md-12">
		<ol class="breadcrumb">
			<li><a href="homeOIC.php">Home</a></li>
			<li><a href="#">Activities/Programs</a></li>
			<li><a href="#">Add</a></li>
		</ol>
	</div>
</div>
<div class="row">
	<div class="col-xs-12 col-sm-12">
		<div class="box">
			<div class="box-header">
				<div class="box-name">
					<i class="fa fa-search"></i>
					<span>Add Activity/Program</span>
				</div>
				<div class="box-icons">
					<a class="collapse-link">
						<i class="fa fa-chevron-up"></i>
					</a>
					<a class="expand-link">
						<i class="fa fa-expand"></i>
					</a>
					<a class="close-link">
						<i class="fa fa-times"></i>
					</a>
				</div>
				<div class="no-move"></div>
			</div>
			<div class="box-content">
				<h4 class="page-header">Add Activity form</h4>
				<form class="form-horizontal" role="form" method="get" enctype='multipart/form-data' action='/MCHOIMS2/homeOIC.php' >

					<div class="form-group">
						<label class="col-sm-2 control-label">Activity Identity Number</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" placeholder="Identity Number" data-toggle="tooltip" data-placement="bottom" title="Tooltip for name" name="f_actnumber" required>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Activity Title</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" placeholder="Title" data-toggle="tooltip" data-placement="bottom" title="Tooltip for name" name="f_title" required>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Date Conducted</label>
						<div class="col-sm-9">
							<input type="date" class="form-control" placeholder="Date" data-toggle="tooltip" data-placement="bottom" title="Tooltip for name" name="f_dateconducted" required>
						</div>
					</div>
                               	                
					<div class="form-group">
						<label class="col-sm-2 control-label" for="form-styles">Description</label>
						<div class="col-sm-9">
								<textarea class="form-control" rows="5" name="f_description" required></textarea>
						</div>
					</div>
						 <input type="submit" name="addbutton" class="btn btn-primary" value="Submit">
                                <button type="reset" class="btn btn-default">Reset</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
// Run Select2 plugin on elements
function DemoSelect2(){
	$('#s2_with_tag').select2({placeholder: "Select OS"});
	$('#s2_country').select2();
}
// Run timepicker
function DemoTimePicker(){
	$('#input_time').timepicker({setDate: new Date()});
}
$(document).ready(function() {
	// Create Wysiwig editor for textare
	TinyMCEStart('#wysiwig_simple', null);
	TinyMCEStart('#wysiwig_full', 'extreme');
	// Add slider for change test input length
	FormLayoutExampleInputLength($( ".slider-style" ));
	// Initialize datepicker
	$('#input_date').datepicker({setDate: new Date()});
	// Load Timepicker plugin
	LoadTimePickerScript(DemoTimePicker);
	// Add tooltip to form-controls
	$('.form-control').tooltip();
	LoadSelect2Script(DemoSelect2);
	// Load example of form validation
	LoadBootstrapValidatorScript(DemoFormValidator);
	// Add drag-n-drop feature to boxes
	WinMove();
});
</script>
