<?php 
	include_once '../model/db.php';
	include_once 'header.php';
	$db = db_connect();
	$id = $_GET['id'];
	$query = $db->query("SELECT * FROM item_details WHERE id = ".$id."");
	$row = $query->fetch_assoc();
?>
<div class="content-header">
		<h1 >Edit Item</h1>
	</div>
	<form method="post" action="../controller/edit_item.php">
	<input type="hidden" name="id" value="<?php echo $row['id'] ?>">
		<table class="table">
			<tr>
				<td>
					<input type="text" class="form-control transparent-input item_name"  name="item_name" value="<?php echo $row['item_name'] ?>" required>
				</td>
				<td>
					<input class="form-control transparent-input" type="number" name="unit_price" id="no_Uprice1" value="<?php echo $row['unit_price'] ?>" required>
				</td>
				<td>
					<input class="form-control transparent-input" type="number" name="qty" id="no_Qty" value="<?php echo $row['quantity'] ?>" required>
				</td>
				<td>
					<input class="form-control transparent-input" type="number" name="alert_at" id="alert_at" value="<?php echo $row['alert_at'] ?>" required>
				</td>
				<td>
					<button class="btn  btn-primary" id="print">
						update Item
					</button>
				</td>
			</tr>
		</table>
	</form>	