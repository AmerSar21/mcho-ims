<?php
include "db_connect.php";
?>
<div class="row">
	<div id="breadcrumb" class="col-md-12">
		<ol class="breadcrumb">
			<li><a href="homeOIC.php">Home</a></li>
		</ol>
	</div>
</div>

<div class="row">
		<div class="box">
			
			<div class="box-content" id="accordion">
			<?php
                $sql = "SELECT * from activity";
                $result = mysqli_query($con, $sql) or die("Query fail: " . mysqli_error());

            ?>

                 <?php while ($row = mysqli_fetch_array($result)) {
				echo "<h3>" . $row['name'] . "</h3>
				<div>
					<p>
						" . $row['description'] . "
					</p>
					<p>
						" . $row['actdate'] .   "
					</p>
				</div>
								
				";
				}
				?>
			</div>
		</div>
	
</div>
<script type="text/javascript">
$(document).ready(function() {
	// Load TimePicker plugin and callback all time and date pickers
	LoadTimePickerScript(AllTimePickers);
	// Create jQuery-UI tabs
	$("#tabs").tabs();
	// Sortable for elements
	$(".sort").sortable({
		items: "div.col-sm-2",
		appendTo: 'div.box-content'
	});
	// Droppable for example of trash
	$(".drop div.col-sm-2").draggable({containment: '.dropbox' });
	$('#trash').droppable({
		drop: function(event, ui) {
			$(ui.draggable).remove();
		}
	});
	var icons = {
		header: "ui-icon-circle-arrow-e",
		activeHeader: "ui-icon-circle-arrow-s"
	};
	// Make accordion feature of jQuery-UI
	$("#accordion").accordion({icons: icons });
	// Create UI spinner
	$("#ui-spinner").spinner();
	// Add Drag-n-Drop to boxes
	WinMove();
});
</script>
