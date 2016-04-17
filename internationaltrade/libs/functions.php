<?php

require_once("libs/core/init.php");
// get category from the table

function getcategory($selected_option)
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
					   if ($var_category_id == $selected_option) {
							echo "<option value= \"".$var_category_id."\" selected=\"selected\">".$var_category_title."</option>";
						}
						else {
							echo "<option value= \"".$var_category_id."\">".$var_category_title."</option>";
						}
					}
}
// To display category choices in the home page
function displaycategory()
{
    global $con;
    $var_get_category = "SELECT * FROM category";

    $var_run_category = mysqli_query($con,$var_get_category);
    //echo $run_category;

    echo "<li class = 'list'> <a href='index.php'>All</a></li>";

    while($var_row_category=mysqli_fetch_array($var_run_category))
    {
        $var_category_id=$var_row_category['cat_id'];
        $var_category_title=$var_row_category['category'];
        echo "<li class = 'list'> <a href='index.php?category=$var_category_id'>$var_category_title </a></li>";
       
    }
}

// To display all the deals in home page
function getdeal()
	{
		if(!isset($_GET['category']))
		{
			global $con;
				
			$var_get_deal = "SELECT * FROM create_deal order by RAND() LIMIT 0,18";
			$var_run_deal = mysqli_query ($con,$var_get_deal);

			$tmp_counter = 0;
			$acc_counter = 0;
			$row_count = mysqli_num_rows($var_run_deal);

			echo "
			<table>
			";

			while($var_row_deal= mysqli_fetch_array($var_run_deal))
			{
					$var_deal_id = $var_row_deal['deal_id']; // deal_id => 1 
					$var_deal_title = $var_row_deal['title'];
					$var_deal_description = $var_row_deal['description'];
					$var_deal_qty = $var_row_deal['qty'];
					$var_deal_unit_price = $var_row_deal['unit_price'];
					$var_deal_unit = $var_row_deal['unit'];
					$var_deal_image = $var_row_deal['deal_image'];

				$acc_counter++;

				$new_row = false;
				$end_row = false;

				if ($tmp_counter % 3 == 0) {
					$new_row = true;
					$tmp_counter = 0;
				}
				if ($tmp_counter % 3 == 2) {
					$end_row = true;
				}

				if ($new_row) {
					echo "<tr><td>";
				}

				echo "
				<div id = 'single_deal'>
					<h3> $var_deal_title </h3>
					<img src = 'images/$var_deal_image' width='200' height='200' />
					<p><h4> $$var_deal_unit_price</h4></p>
					<!-- deal_id is url variable -->
					<a href= 'details.php?deal_url_id=$var_deal_id' style='float:center;'>Details</a>
					
				</div>
				";

				if (($end_row) || ($acc_counter == $row_count)) {
					echo "</td></tr>";
				}

				$tmp_counter++;
			}

			echo "
			</table>
			";
		}

	}
	//<a href= 'join_deal.php?deal_url_id2=$var_deal_id'> <button id= 'button-sp' style = 'float:right'>Join Deal </button> </a>
	
//function to display the deals based on category
function getCatDeal()
	{
		if(isset($_GET['category']))
		{
			global $con;
			$var_cat_id= $_GET['category'];
			
			$var_get_cat_deal = "SELECT * FROM create_deal WHERE deal_category=$var_cat_id";
			$var_run_cat_deal = mysqli_query ($con,$var_get_cat_deal);

			$tmp_counter = 0;
			$acc_counter = 0;
			$row_count = mysqli_num_rows($var_run_cat_deal);

			echo "
			<table>
			";

			while($var_row_cat_deal= mysqli_fetch_array($var_run_cat_deal))
			{
					$var_deal_id = $var_row_cat_deal['deal_id'];  
					$var_deal_title = $var_row_cat_deal['title'];
					$var_deal_description = $var_row_cat_deal['description'];
					$var_deal_qty = $var_row_cat_deal['qty'];
					$var_deal_unit_price = $var_row_cat_deal['unit_price'];
					$var_deal_unit = $var_row_cat_deal['unit'];
					$var_deal_image = $var_row_cat_deal['deal_image'];

				$acc_counter++;

				$new_row = false;
				$end_row = false;

				if ($tmp_counter % 3 == 0) {
					$new_row = true;
					$tmp_counter = 0;
				}
				if ($tmp_counter % 3 == 2) {
					$end_row = true;
				}

				if ($new_row) {
					echo "<tr><td>";
				}

				echo "
				<div id = 'single_deal'>
					<h3> $var_deal_title </h3>
					<img src = 'images/$var_deal_image' width='200' height='200' />
					<p><h4> $$var_deal_unit_price</h4></p>
					<!-- deal_id is url variable -->
					<a href= 'details.php?deal_url_id=$var_deal_id' style='float:center;'>Details</a>
					
				</div>
				";

				if (($end_row) || ($acc_counter == $row_count)) {
					echo "</td></tr>";
				}

				$tmp_counter++;
			}

			echo "
			</table>
			";
		}


}
?>