<?php 
include_once 'header.php';
if(isset($_GET['number'])){
	$number = $_GET['number'];
}else{
	$number = "";
}
?>
<br/>
<br/>

	<input type="number" name="number_search" placeholder="Enter Customer Number" class="form-control transparent-input" id="textbox-customer-number" value="<?php echo $number;?>" required>

	<div id="output_text"></div>



	<script type="text/javascript">
		
		$('#textbox-customer-number').keypress(function(event){
			var customer_numer = $('#textbox-customer-number').val();
			var keycode = (event.keyCode ? event.keyCode : event.which);
			if(keycode == '13'){
		        if(customer_numer.length > 0){
		          $.ajax({
		            type: "POST",
		            url: '../controller/customer_details.php',
		            data: {customer_numer : customer_numer},
		            success: function(data) {
		              $( "#output_text" ).html( data );
		            }
		          });
		        }
			}
		});

		$( document ).ready(function() {

			$('#textbox-paying-amount').keypress(function(event){
						console.log("hello");
						var keycode = (event.keyCode ? event.keyCode : event.which);
						if(keycode == '13'){
							var customer_numer = $('#textbox-customer-number').val();
							var paying_amount = $('#textbox-paying-amount').val();
					        if(paying_amount.length > 0){
					          $.ajax({
					            type: "POST",
					            url: '../controller/pay_bill.php',
					            data: {paying_amount : paying_amount, customer_numer : customer_numer},
					            success: function(data) {
					              $( "#output_text" ).html( data );
					            }
					          });
					        }
						}
					});
			
		});


		
	</script>


