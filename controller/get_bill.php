<?php 
	include_once '../model/db.php';
  $db = db_connect();
  $sql = "SELECT `id`,`items` FROM `purchase_details` WHERE `date` BETWEEN '".$_POST['start_date']."' AND '".$_POST['end_date']."' ";
  $result = execute_query($sql, $db);
  if(empty($result)){
      echo "No data found";
  }else{

  $f_val = "";
  $i = 0;
  $total = 0;
  while ($row = $result->fetch_assoc()) {
    $final[] = $row;
  }
  if(!empty($final)){
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
                $total =   $total + $final_data['data']['grand_total'];

        }
        $f_val = $f_val . "<table class='table'   ><tr><td>Grand Total:".$total."</td></tr></table><hr>";
        
        echo $f_val;
      }
      else{
        echo "<tr><td>No data found</td></tr>";
      }

  }


