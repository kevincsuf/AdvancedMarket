<?php

require_once("libs/core/init.php");
// get category from the table

function getcategory()
	{
		global $con;
		$var_get_category = "SELECT * FROM category";
		
		$var_run_category = mysqli_query($con,$var_get_category);
		//echo $run_category;
		
		while($var_row_category=mysqli_fetch_array($var_run_category))
		{
			$var_category_id=$var_row_category['cat_id'];
			$var_category_title=$var_row_category['category'];
			//echo $category_title."</br>";
			echo "<option>$var_category_title </option> ";
		}
		
	}
	
function getdeal()
	{
		global $con;
			
		$var_get_deal = "SELECT * FROM create_deal order by RAND() LIMIT 0,18";
		$var_run_deal = mysqli_query ($con,$var_get_deal);
		
		while($var_row_deal= mysqli_fetch_array($var_run_deal))
		{
				$var_deal_id = $var_row_deal['deal_id']; // deal_id => 1 
				$var_deal_title = $var_row_deal['title'];
				$var_deal_description = $var_row_deal['description'];
				$var_deal_qty = $var_row_deal['qty'];
				$var_deal_unit_price = $var_row_deal['unit_price'];
				$var_deal_unit = $var_row_deal['unit'];
				$var_deal_image = $var_row_deal['deal_image'];
			
			echo "
			<div id = 'single_deal'>
				<h3> $var_deal_title </h3>
				<img src = 'images/$var_deal_image' width='200' height='200' />
				<p><h4> $$var_deal_unit_price</h4></p>
				<!-- deal_id is url variable -->
				<a href= 'details.php?deal_url_id=$var_deal_id' style='float:center;'>Details</a>
				
			</div>
			";
		}
		
	}
	//<a href= 'join_deal.php?deal_url_id2=$var_deal_id'> <button id= 'button-sp' style = 'float:right'>Join Deal </button> </a>
?>