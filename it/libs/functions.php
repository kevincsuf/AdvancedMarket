<?php

// Skip including init.php again if function.php is called in details.lib.php
if (basename($_SERVER['PHP_SELF']) != "details_lib.php") {
    require_once("libs/core/init.php");
}

// get category from the table and display in single_product page

function getcategoryhome()
{
   global $con;
		$var_get_category = "SELECT * FROM category";

		$var_run_category = mysqli_query($con,$var_get_category);
		//echo $run_category;

		while($var_row_category=mysqli_fetch_array($var_run_category))
		{
			$var_category_id=$var_row_category['cat_id'];
			$var_category_title=$var_row_category['category'];
			echo "<li><a href='#'> $var_category_title </a></li>";
		  /* if ($var_category_id == $selected_option) {
				echo "<option value= \"".$var_category_id."\" selected=\"selected\">".$var_category_title."</option>";
			}
			else {
				echo "<option value= \"".$var_category_id."\">".$var_category_title."</option>";
			}*/
		}
}
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
			//echo "<li><a href='#'> $var_category_title </a></li>";
		   if ($var_category_id == $selected_option) {
				echo "<option value= \"".$var_category_id."\" selected=\"selected\">".$var_category_title."</option>";
			}
			else {
				echo "<option value= \"".$var_category_id."\">".$var_category_title."</option>";
			}
		}
}
// To display category choices in the home page and single product page 
function displaycategory()
{
    global $con;
    $var_get_category = "SELECT * FROM category";

    $var_run_category = mysqli_query($con,$var_get_category);
    //echo $run_category;

    while($var_row_category=mysqli_fetch_array($var_run_category))
    {
        $var_category_id=$var_row_category['cat_id'];
        $var_category_title=$var_row_category['category'];
		//echo "<li><a href='#'> $var_category_title </a></li>";
        echo "<li class = 'list'> <a href='index2.php?category=$var_category_id'>$var_category_title </a></li>";
       
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
				
				echo"<div class='col-md-3 col-sm-6 col-xs-12 isotope-item tab-2 tab-3 tab-5'>";
							echo"<div class='portfolio-wrapper'>";
								echo"<div class='portfolio-thumb'>";
									echo"<img src='images/".$var_row_cat_deal["deal_image"]."' alt=''>";
										echo"<div class='portfolio-content'>";
											echo"<div class='pop-up-icon'>";
												echo"<a class='left-link' href='#product-preview' data-toggle='modal'><i class='fa fa-search'></i></a>";
												
												echo"<a class='right-link' href='#'><i class='fa fa-heart'> </i></a>";
											echo "</div>";
										echo "</div>";
								echo "</div>";
								echo"<div class='product-content'>";
									echo"<h3> <a class='title-3 fsz-18' href='single_product.php?deal_url_id=$var_deal_id'>".$var_row_cat_deal["title"]."</a> </h3>";
									echo"<p class='font-2'>Starting from<span class='thm-clr'> $ ".$var_row_cat_deal["unit_price"]."</span> </p>";  
								echo "</div>";		
							echo "</div>";
						echo "</div>";  
				
				/*<h3> $var_deal_title </h3>
					<img src = 'images/$var_deal_image' width='200' height='200' />
					<p><h4> $$var_deal_unit_price</h4></p>
					<!-- deal_id is url variable -->
					<a href= 'details.php?deal_url_id=$var_deal_id' style='float:center;'>Details</a>
					
				</div>
				"; */   
                  
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

// Close a deal
function closeDeal($check_deal_id)
{
    global $con;

    // Perform only when this deal_id is not closed yet
    if (checkDealClosed($check_deal_id)) { // When already closed
        return true;
    } else { // When not closed yet

        // Set flags
        $is_out_of_stock = false;
        $is_out_of_date = false;

        $var_max_quantity = 0;
        $var_sum_order = 0;

        $var_end_date = "";
        $var_current_time = "";

        ///////////////////////////////////
        // Condition 1: Check out of order
        ///////////////////////////////////

        // Total quantity
        $var_get_deal_id = "
            SELECT *
            FROM create_deal
            WHERE deal_id=" . $check_deal_id;
        $var_run_deal_id = mysqli_query($con, $var_get_deal_id);
        while ($var_row_deal_id = mysqli_fetch_array($var_run_deal_id)) {
            $var_max_quantity = $var_row_deal_id['max_quantity'];
            $var_end_date = $var_row_deal_id['end_date'];
        }

        // Total order
        /*
         * Replaced by soldQuantity(): Kevin 04/21/2016
         *
        $var_get_sum_order = "
            SELECT create_deal_id, SUM(order_quantity) AS sum_order
            FROM join_deal
            GROUP BY create_deal_id";
        $var_run_sum_order = mysqli_query($con, $var_get_sum_order);
        while ($var_row_sum_order = mysqli_fetch_array($var_run_sum_order)) {
            if ($var_row_sum_order['create_deal_id'] == $check_deal_id) {
                $var_sum_order = $var_row_sum_order['sum_order'];
            }
        }
        if($var_sum_order == NULL) {
            $var_sum_order = 0;
        }
        */
        $var_sum_order = soldQuantity($check_deal_id);

        // Out of stock?
        if ($var_max_quantity > $var_sum_order) {
            $is_out_of_stock = false;
        } else {
            $is_out_of_stock = true;
        }

        ///////////////////////////////////
        // Condition 2: Check out of date
        ///////////////////////////////////

        //$var_end_time = date('Y-m-d 00:00:00', strtotime($var_end_date . ' +1 day'));
        $var_end_time = new DateTime($var_end_date.' + 1day');
        $var_current_time = new DateTime("now");

        // Out ot date?
        if ($var_current_time < $var_end_time) {
            $is_out_of_date = false;
        } else {
            $is_out_of_date = true;
        }

        /////////////////////////////////////////////////////////////////////////////
        // Conclusion: either out of stock or out of date, the deal should be closed
        /////////////////////////////////////////////////////////////////////////////
        if ($is_out_of_stock || $is_out_of_date) {
            // Update as the deal closed
            $var_update_deal_id = "
                UPDATE create_deal
                SET deal_closed = 1
                WHERE deal_id=" . $check_deal_id;
            if (mysqli_query($con, $var_update_deal_id)) {
                echo "<script> alert(\"Update record saved successfully..!\")</script>";
            } else {
                echo "<script> alert(\"Update record NOT saved successfully..!\")</script>";
            }
            return true;
        } else {
            return false;
        }
    }
}

// Check whether a deal is closed
function checkDealClosed($check_deal_id) {
    global $con;

    $var_deal_closed = 0;

    $var_get_deal_id = "
        SELECT *
        FROM create_deal
        WHERE deal_id=" . $check_deal_id;
    $var_run_deal_id = mysqli_query($con, $var_get_deal_id);
    while ($var_row_deal_id = mysqli_fetch_array($var_run_deal_id)) {
        $var_deal_closed = $var_row_deal_id['deal_closed'];
    }

    // 0 means not closed
    if ($var_deal_closed == 0) {
        return false;
    }
    else {
        return true;
    }
}

// Check the user already joined the deal
function checkJoinedDeal($check_deal_id, $ukey) {
    global $con;

    $var_order_id = 0;

    $var_get_join_deal = "
        SELECT *
        FROM join_deal
        WHERE create_deal_id=" . $check_deal_id." AND user_id=".$ukey;
    $var_run_join_deal = mysqli_query($con, $var_get_join_deal);
    while ($var_row_join_deal = mysqli_fetch_array($var_run_join_deal)) {
        $var_order_id = $var_row_join_deal['order_id'];
    }

    // 0 means not joined
    if ($var_order_id == 0) {
        return false;
    }
    else {
        return true;
    }
}


// Check sold quantity of a deal
function soldQuantity($check_deal_id) {
    global $con;

    $var_sold_quantity = 0;

    $var_get_sold_quantity = "
            SELECT create_deal_id, SUM(order_quantity) AS sum_order
            FROM join_deal
            GROUP BY create_deal_id";
    $var_run_sold_quantity = mysqli_query($con, $var_get_sold_quantity);
    while ($var_row_sold_quantity = mysqli_fetch_array($var_run_sold_quantity)) {
        if ($var_row_sold_quantity['create_deal_id'] == $check_deal_id) {
            $var_sold_quantity = $var_row_sold_quantity['sum_order'];
        }
    }
    if($var_sold_quantity == NULL) {
        $var_sold_quantity = 0;
    }

    return $var_sold_quantity;
}


// Check sold quantity of a deal
function joinedBuyerNumber($check_deal_id) {
    global $con;

    $var_joined_buyer = 0;

    $var_get_joined_buyer = "
            SELECT create_deal_id, COUNT(*) AS count_buyer
            FROM join_deal
            GROUP BY create_deal_id";
    $var_run_joined_buyer = mysqli_query($con, $var_get_joined_buyer);
    while ($var_row_joined_buyer = mysqli_fetch_array($var_run_joined_buyer)) {
        if ($var_row_joined_buyer['create_deal_id'] == $check_deal_id) {
            $var_joined_buyer = $var_row_joined_buyer['count_buyer'];
        }
    }
    if($var_joined_buyer == NULL) {
        $var_joined_buyer = 0;
    }

    return $var_joined_buyer;
}


// Get current discount price for a deal
function getCurrentPrice($check_deal_id) {
    global $con;

    $var_cur_join = 0;
    $var_cur_price = 0;
    $var_number_discount_1 = 0;
    $var_amount_discount_1 = 0;
    $var_number_discount_2 = 0;
    $var_amount_discount_2 = 0;
    $var_number_discount_3 = 0;
    $var_amount_discount_3 = 0;

    $var_cur_join = soldQuantity($check_deal_id);

    $var_get_deal = "
            SELECT *
            FROM create_deal
            WHERE deal_id=".$check_deal_id;
    $var_run_deal = mysqli_query($con, $var_get_deal);
    while ($var_row_deal = mysqli_fetch_array($var_run_deal)) {
        if ($var_row_deal['deal_id'] == $check_deal_id) {
            $var_number_discount_1 = $var_row_deal['number_discount_1'];
            $var_amount_discount_1 = $var_row_deal['amount_discount_1'];
            if ($var_row_deal['number_discount_2'] != "") {
                $var_number_discount_2 = $var_row_deal['number_discount_2'];
                $var_amount_discount_2 = $var_row_deal['amount_discount_2'];
            }
            if ($var_row_deal['number_discount_3'] != "") {
                $var_number_discount_3 = $var_row_deal['number_discount_3'];
                $var_amount_discount_3 = $var_row_deal['amount_discount_3'];
            }
        }
    }

    if ($var_cur_join <= $var_number_discount_1) {
        $var_cur_price = $var_amount_discount_1;
    }

    if ($var_number_discount_2 != "") {
        if (($var_number_discount_1 < $var_cur_join) && ($var_cur_join <= $var_number_discount_2)) {
            $var_cur_price = $var_amount_discount_2;
        }
    }

    if ($var_number_discount_3 != "") {
        if (($var_number_discount_2 < $var_cur_join) && ($var_cur_join <= $var_number_discount_3)) {
            $var_cur_price = $var_amount_discount_3;
        }
    }

    return $var_cur_price;
}
?>