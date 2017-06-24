<?php include_once 'header.php'; 
	if( isset($_GET['status'])){
		if($_GET['status'] == "error"){
			echo '<div class="alert alert-warning"><strong>Sorry!</strong>Something went wrongly.</div>';
		}
	}
?>
		<style type="text/css">
		    .table>tbody>tr>td
		    {
		        border-top:0px;
		        padding: 5px;
		        line-height: 0px;
		    }
		</style>
				<div style="border:5px solid #000">
					<div>
						<p style="text-align: right;">Tin :- 33233227155</p>
					</div>
					<div class="col-lg-12 page-header">
						<img src="../images/logo.jpg" alt="LOGO" class="img-circle" width="190px" height="25%">

						<div style="width:60%;float:right;"> 
							<h1>
								Senthil Electricals
							</h1>
							
							<p>
								Chemicals Pirivu, Sankari
							</p>
							<p>
								Email:senthilele1983@gmail.com
							</p>
							<p>
								Phone:9865742666
							</p>
						</div>
					</div>
					
					<form method="post" action="../controller/home_controller.php" id="mainform">
					<div id="name_box">
							<input type="text" class="form-control transparent-input" name="customer_name" id="name" placeholder="Customer Name" style="position: relative;width: 314px; margin-left: 1000px;top: -63px;">
					</div>
					<div id="phone_number_box">
						
						<input type="number" class="form-control transparent-input" name="customer_phonenumber" id="mobile_no" placeholder="Customer Mobile Number" style="position: relative;width: 314px; margin-left: 1330px;top: -97px;">

					</div>
					<div id="TextBoxesGroup">
						<table class="table">
							<tr>
								<td>S.No</td>
								<td>Item Name</td>
								<td>Unit Price</td>
								<td>Quantity</td>
								<td>Total</td>  
							</tr>
					  		<tr>
					          	<td>
					          		<input class="form-control transparent-input" type="text" name="sno1" id="txt_Sno" placeholder="SNo" value="1" style="width:50px" required="required" >
					          	</td>
								<td>
									<input type="text" class="form-control transparent-input item_name1"  name="item_name1" placeholder="Item Name" required="required" >
								</td>
								<td>
									<input class="form-control transparent-input" type="number" name="unit_price1" id="no_Uprice1" placeholder="Unit Price" required="required" >
								</td>
								<td>
									<input class="form-control transparent-input" type="number" name="qty1" id="no_Qty1" placeholder="Quantity" required="required" >
								</td>
								<td>
									<input class="form-control transparent-input" type="number" name="total1" id="no_Total1" placeholder="Total" required="required" >
								</td>
					        </tr>
					       </table>
					       </div>
					    </div>
				<input type="hidden" name="grand_total" id="grand_total1">
				
		        </div>
		    </div>
			</form>
			<div class="btn-group btn-group-justified" style="top:5em;width:60%;left:20em">
		    	<div class="btn-group">
		          <input type="button" name="add_stock" class="btn  btn-primary" value="Add" id="btn_Add1">
		        </div>
		        <div class="btn-group">
		          <input type="button" name="remove" class="btn  btn-primary" value="Remove" id="btn_remove">
		        </div>
		        <div class="btn-group">
		          		<input type="submit" class="btn btn-primary" id="print" value="Print">
			
		</body>
		</html>