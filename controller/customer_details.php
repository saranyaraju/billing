<?php 
	include_once '../model/db.php';
    $conn = db_connect();
	$sql = "SELECT `total_amount`, `id`, `name` FROM `customers` WHERE `phone_number`='".$_POST['customer_numer']."'";

	$result = execute_query($sql, $conn);
  if(empty($result)){
    echo "no transactions still now handled! or Sorry the user doesn't exist!";

  }else{

    while ($row = $result->fetch_assoc()) {
        $total_due = $row['total_amount'];
        $id = $row['id'];
        $name = $row['name'];
    }

    if(empty($total_due)){
    	echo "<h1>Sorry the user doesn't exist!</h1>";
    }
    else{
    	echo '<table class="table"><tr><td><h1> Mr/Ms : '.$name." has due of $total_due</h1></td><td><form action='../controller/pay_bill.php' method='post'><input type='hidden' name='customer_number' value='".$_POST['customer_numer']."'><input type='number' name='amount_to_pay' placeholder='Paying Amount' class='form-control transparent-input' id='textbox-paying-amount' required></form></td></tr></table><hr/><br/><p>Total transactions are:-</p>";
   

	$sql = "SELECT * FROM `purchase_details` WHERE `customer_id` = '$id'";

	$result = execute_query($sql, $conn);
     $f_val = "";
   $i = 0;
  while ($row = $result->fetch_assoc()) {
    $final[] = $row;
  }
  if(empty($final)){
    echo "no transactions still now handled!";
  }else{
  ?>
  <table class="table">
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
		

		<?php 
		    $grand_total = 0;
        foreach ($final as $value) {
          $unserialized_values[$i]['id'] = $value['id'];
          $unserialized_values[$i]['data'] = unserialize($value['items']);
          $i++;
        }
        foreach ($unserialized_values as $final_data) {  
          $f_val = $f_val."<tr>
          <td>SE".$final_data['id']."</td>
          <td>".$final_data['data']['item_name1'].",...</td>
          <td>".$final_data['data']['grand_total']."</td></tr>";
          $grand_total = $grand_total+$final_data['data']['grand_total'];
        }
        
        echo $f_val."</table>";
        echo '<h1 style="text-align: right;">Total transactions till date : '.$grand_total.'</h1>';
        echo "<hr>";
        $sql1 = "SELECT * FROM `transactions` WHERE `phone_number` = '".$_POST['customer_numer']."'";
        $result1 = execute_query($sql1, $conn);
         while ($row = $result1->fetch_assoc()) {
            $final1[] = $row;
          }
        echo '<h1>Payment Summary</h1>';
        if (empty($final1)){
         echo "<h1>No Payment till now handled!</h1>"; 
        }
        else{  

         
          $f_val1 = "";
          echo "<table class='table'><tr><td>Customer no</td><td>Amount</td><td>Date</td></tr>";
          foreach ($final1 as $final_data1) {  
            $f_val1 = $f_val1."<tr>
            <td>".$final_data1['phone_number']."</td>
            <td>".$final_data1['amount']."</td>
            <td>".$final_data1['date']."</td></tr>";
          }
          echo "$f_val1";
        }
        }
         }

  
  }
        ?>
        