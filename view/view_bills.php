<?php include_once 'header.php'; ?>
		<table class="table">
			<tr>
				<td>
					<input type="date" class="form-control transparent-input" id="start_date"  name="start_date" 
					value=<?php echo date('Y-m-d'); ?> placeholder="Start Date">
				</td>
				<td>
					<input class="form-control transparent-input" type="date" id="end_date" name="end_date" id="no_Uprice1" value=<?php echo date('Y-m-d'); ?> placeholder="End Date">
				</td>
				<td>
					<button class="btn btn-default" id="get_bill">view</button>
				</td>
			</tr>
			<tr>
				<td>
					Bill no
				</td>
				<td>
					Items
				</td>
				<td>
					Total
				</td>
			</tr>
		</table>
		<div id="view_bill"></div>
	<script>
	
		$("#get_bill").click(function(){
			var start = $('#start_date').val();
			var end = $('#end_date').val();
			$.ajax({
				type: "POST",
				url: "../controller/get_bill.php",
				data: {start_date : start, end_date : end},
				success: function(data){
					$('#view_bill').html('<table class="table">	'+ data+'</table>');
				}
			});
		});

	</script>