$(document).ready(function()
 {
	i=1;
	$('body').on('click', "#btn_Add"+i, function(){
		var x = i+1;
		var newTextBoxDiv = $(document.createElement('div')).attr("id",'TextBoxDiv'+x);
		newTextBoxDiv.after().html('<br><table class="table"><tr><td><input  type="text" class="form-control transparent-input" name="sno'+x+'" id="txt_Sno" placeholder="SNo" style="width:50px;margin-left:0.1px;" value="'+ x +'"></td>'+'<td><input type="text" class="form-control transparent-input item_name'+ x +'"  name="item_name'+x+'" placeholder="Item Name"></td>'+'<td><input class="form-control transparent-input" type="number" name="unit_price'+x+'" id="no_Uprice'+x+'" placeholder="Unit Price" style="margin-left: 5px"></td>'+'<td><input class="form-control transparent-input" type="number" placeholder="Quantity" name="qty'+x+'" id="no_Qty'+x+'"></td>'+'<td><input class="form-control transparent-input" type="number" name="total'+x+'" id="no_Total'+x+'" placeholder="Total" ></td></tr><table>');
		newTextBoxDiv.appendTo("#TextBoxesGroup");
		$(function() {
			$( ".item_name"+x ).autocomplete({
				source: 'search.php'
			});
		});
		$(".item_name"+x).keydown(function (e) {
		if (e.which == 9){
		        $("#no_Uprice"+x).click();
		   }
		});
		$('#searchButton').click(function(){
		        var search = $('#usersSearch').val();
		        $.post('../searchusers.php',{search: search},function(response){
		            $('#userSearchResultsTable').html(response);
		        });
    	})
    $('#no_Total'+x).keypress(function(e){
        if(e.which == 13){//Enter key pressed
            $('#searchButton').click();
            $("#btn_Add1").click();
	 		var textValue1 = document.getElementById('no_Uprice'+x).value;
			var textValue2 = document.getElementById('no_Qty'+x).value;
			document.getElementById('no_Total'+x).value = textValue1 * textValue2;

        }
    });
			$("#no_Uprice"+x).click(function(){
	       var y = document.getElementsByClassName("item_name"+x);
	       var item_name = y[0].value;
	        $.ajax({
	             type: "GET",
	             url: "get_item_value.php",
	             data: {item_name : item_name},
	             success: function(data) {
		             console.log(data);
		             document.getElementById('no_Uprice'+x).value = data;
	             
	             }
	        });
	});
		$("#no_Total"+x).click(function(){
	      var textValue1 = document.getElementById('no_Uprice'+x).value;
			var textValue2 = document.getElementById('no_Qty'+x).value;
			document.getElementById('no_Total'+x).value = textValue1 * textValue2;
	});
	
		i++;
	
	});
	$('body').on('click', '#btn_remove', function()
	{	
		if(i==1){
			window.alert("...The Items are Reached the Line...!");
			$("#btn_Add"+x).show('fast');
			i++;
		}else{
			 $('#TextBoxDiv'+i).remove();
		 	i--;
		 	$("#btn_Add"+i).show('fast');
		}
		
	});
	

	$(function() {
		$( ".item_name1" ).autocomplete({
			source: 'search.php'
		});
	});
	$("#no_Uprice1").click(function(){
	       var y = document.getElementsByClassName("item_name1");
	       var item_name = y[0].value;
	        $.ajax({
	             type: "GET",
	             url: "get_item_value.php",
	             data: {item_name : item_name},
	             success: function(data) {
		             console.log(data);
		             document.getElementById('no_Uprice1').value = data;             
	             }
	        });
	});
	$('body').on('click', "#print", function(){
			var total = 0;
	 		for(var temp = 1; temp<=i; temp++){
		 		var textValue1 = document.getElementById('no_Uprice'+temp).value;
				var textValue2 = document.getElementById('no_Qty'+temp).value;
				
				document.getElementById('no_Total'+temp).value = textValue1 * textValue2;
				var grand_total = parseInt(document.getElementById('no_Total'+temp).value);
		 		total = total + grand_total;
 			
			document.getElementById('grand_total1').value =total;
	       var y = document.getElementsByClassName("item_name1");
	       var z = document.getElementById("no_Qty1").value;
	       var item_name = y[0].value;
	        $.ajax({
	             type: "GET",
	             url: "get_item_qty.php",
	             data: {item_name : item_name},
	             success: function(data) {
	             	data = parseInt(data);
	             	console.log(data);
	             	console.log(z);
	             	if (z>data) {
	             			window.alert("out of stock!!!<br/>available stock:"+data);
	             			document.getElementById('no_Qty'+temp).innerHTML = 0;
	             			document.getElementById('no_Total'+temp).innerHTML = 0;
	             			window.location.href = "../index.php";
	             			
		                }else
		                {
		                	$('#mainform').submit();
		                }
		                }
	        });
	        }
	});
	$(function() {
		$( "#mobile_no" ).autocomplete({
			source: 'get_mobile_no.php'
		});
	});

    $('#searchButton').click(function(){
        var search = $('#usersSearch').val();
        $.post('../searchusers.php',{search: search},function(response){
            $('#userSearchResultsTable').html(response);
        });
    })
    $('#no_Total1').keypress(function(e){
        if(e.which == 13){//Enter key pressed
            $('#searchButton').click();
            $("#btn_Add"+i).click();
            var textValue1 = document.getElementById('no_Uprice1').value;
			var textValue2 = document.getElementById('no_Qty1').value;
			document.getElementById('no_Total1').value = textValue1 * textValue2;

        }
    });

	$(".item_name1").keydown(function (e) {

	   if (e.which == 9){
	        $("#no_Uprice1").click();
	   }
	});
	$("#no_Total1").click(function(){
	      var textValue1 = document.getElementById('no_Uprice1').value;
			var textValue2 = document.getElementById('no_Qty1').value;
			document.getElementById('no_Total1').value = textValue1 * textValue2;
	});
	
	
});



