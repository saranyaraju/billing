<?php 

	include_once '../model/db.php';
	$conn = db_connect();
	if(!empty($_POST['customer_phonenumber'])){
		$sql = "SELECT `total_amount`, `id` FROM `customers` WHERE `phone_number`='".$_POST['customer_phonenumber']."'";
		$result = execute_query($sql, $conn);
		// print_r($result);
		while ($row = $result->fetch_assoc()) {
			$total_due = $row['total_amount'];
			$id = $row['id'];
		}
		// echo $total_due;
		if(empty($total_due)&&empty($id)){
			// echo "I am in";
			$sql = "INSERT INTO `customers` (`name`, `phone_number`, `total_amount`) VALUES ('".$_POST['customer_name']."', '".$_POST['customer_phonenumber']."', '".$_POST['grand_total']."')";
			// echo $sql;
			if(execute_query($sql, $conn)){
				$sql = "SELECT id FROM customers ORDER BY id DESC LIMIT 1";
				// echo $sql;
				$result = execute_query($sql, $conn);
				while ($row = $result->fetch_assoc()) {
					$id = $row['id'];
				}
			}else{
				// echo "not inserted";
			}
		}else{
			$new_total_value = $total_due + $_POST['grand_total'];
			// echo "$new_total_value";
			$sql = "UPDATE `customers` SET `total_amount` = '".$new_total_value."' WHERE `phone_number` = '".$_POST['customer_phonenumber']."'";
			// echo $sql;
			if(execute_query($sql, $conn)){
				// echo "updated";
			}else{
				// echo "not updated";
			}
		}
		unset($_POST['customer_phonenumber']);
		unset($_POST['customer_name']);
	}else{
		$id = 0;
		unset($_POST['customer_phonenumber']);
		unset($_POST['customer_name']);
	}
	// echo $id;
	if (empty($_POST)) {
        header("Location:../view/home.php");

        }
        else{
    $sql_1 = "SELECT `id` FROM `purchase_details` ORDER BY id DESC limit 1 ";
    $result = execute_query($sql_1, $conn);
    $row = $result->fetch_assoc();
    $bill_no =((int)$row['id']) + 1;
     $det = serialize($_POST);
      $sql="INSERT INTO `purchase_details`(`items`, `date`, `customer_id`) VALUES ('".$det."', '".date("Y-m-d")."', '".$id."')";
      $conn->query($sql);
         $val = (count($_POST)/5);
        for ($i=1; $i <=$val; $i++) { 
       
            $sql1 ="SELECT `quantity` FROM item_details WHERE item_name = '".$_POST['item_name'.$i]."'";
            $result = execute_query($sql1, $conn);
            while ($row = $result->fetch_assoc()) {
              $data = $row['quantity'];
            }
            $new_quantity =  $data - $_POST['qty'.$i];
            $sql2 ="UPDATE `item_details` SET `quantity`='".$new_quantity."' WHERE `item_name`= '".$_POST['item_name'.$i]."'";
            
            $conn->query($sql2);
        }

  ?>
	<div id="mydiv"  style="margin:80px;">
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
     <div>
     <p class="col-md-6">No: <?php  echo "SE".$bill_no; ?></p>
     <p class="col-md-6" style="text-align:right;floar:right;">Date:<?php echo date('Y-m-d'); ?></p>
     </div>
          <table style="border:2px solid #000080;border-style:solid;width:100%; top:1em;">
                  <tr>
                    <td>S.No</td>
                    <td>Item Name</td>
                    <td>Unit Price</td>
                    <td>Quantity</td>
                    <td>Total</td>  
                  </tr>
                  <?php   
                  // print_r($_POST);
                  
                 $val = round(count($_POST)/5);
                  	for ($i=1;$i<=$val; $i++) {              
		                  echo "<tr>
				                    <td>".$_POST['sno'.$i.'']."</td>
				                    <td>".$_POST['item_name'.$i.'']."</td>
				                    <td>".$_POST['unit_price'.$i.'']."</td>
				                    <td>".$_POST['qty'.$i.'']."</td>
				                    <td>".$_POST['total'.$i.'']."</td>  
								</tr>";
							}
                   ?>

           </table>
    </div>

    <?php
      echo "<br><br><table style='width:100%'><tr><td>authorised signature</td>"; 
      echo "<td>Grand total:".$_POST['grand_total']."</td></table>";

    ?>
    <script>
    function test(){
    	window.print();
      document.location.href="../view/home.php";
    }
    test();
    <?php
      }
    ?>
    </script>
</body>
</html>


