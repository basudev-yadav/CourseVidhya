<?php
 session_start();
 $connect = mysqli_connect("localhost", "root", "", "coursevidhya");
 //check if add to cart button is clicked
 if(isset($_POST["add_to_cart"]))
 {
      //check if some data is present in the session variable of shopping cart
      //used to check if the item is already added
      if(isset($_SESSION["shopping_cart"]))
      {
           //if there is some data in shopping cart
           //get the list of ids present in shopping cart
           $item_array_id = array_column($_SESSION["shopping_cart"], "item_id");
           //check if the current item clicked is present in the cart already
           if(!in_array($_GET["id"], $item_array_id))
           {
                //if it is not present, then add the details in the session variable of shopping cart
                $count = count($_SESSION["shopping_cart"]);
                //count variable helps to add the data at proper index
                //get the details of the item
                $item_array = array(
                     'item_id'               =>     $_GET["id"],
                     'item_name'               =>     $_POST["hidden_name"],
                     'item_price'          =>     $_POST["hidden_price"],
                     'item_quantity'          =>     $_POST["quantity"]
                );
                //store the data in the session variable
                $_SESSION["shopping_cart"][$count] = $item_array;
           }
           else
           {
             //show alert that the item is already present in the cart
             echo '<script>alert("Item already added!")</script>';
             echo '<script>window.location="boook.php"</script>';
           }
      }
      else
      {
           //this block will execute if there is no data in shopping cart
           $item_array = array(
                'item_id'               =>     $_GET["id"],
                'item_name'               =>     $_POST["hidden_name"],
                'item_price'          =>     $_POST["hidden_price"],
                'item_quantity'          =>     $_POST["quantity"]
           );
           //store the details of the item clicked at index 0 since it is first
           $_SESSION["shopping_cart"][0] = $item_array;
      }
 }

 //handle delete action
 //check if an action is invoked
 if(isset($_GET["action"]))
 {
      //if the action is delete
      if($_GET["action"] == "delete")
      {
           //get the details of all items from shopping cart
           foreach($_SESSION["shopping_cart"] as $keys => $values)
           {
                //find the data with the current id clicked
                if($values["item_id"] == $_GET["id"])
                {
                     //unset will remove that data from the shopping cart
                     unset($_SESSION["shopping_cart"][$keys]);
                     echo '<script>alert("Item Removed")</script>';
                     echo '<script>window.location="boook.php"</script>';
                }
           }
      }
 }
 ?>
 <!DOCTYPE html>
 <html>
      <head>
           <title>Shopping Cart</title>
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
      </head>
      <body>
           <br />
           <div class="container" style="width:720px;">
                <h3 align="center">Shopping Cart</h3><br />
                <?php
                $query = "SELECT * FROM books ORDER BY id ASC LIMIT 3";
                $result = mysqli_query($connect, $query);
                if(mysqli_num_rows($result) > 0)
                {
                     while($row = mysqli_fetch_array($result))
                     {
                ?>
                <div class="col-md-4">
                     <form method="post" action="boook.php?action=add&id=<?php echo $row["id"]; ?>">
                          <div style="border:1px solid #333; background-color:#f1f1f1; border-radius:5px; padding:16px;" align="center">
                               <img src="<?php echo $row["image"]; ?>" class="img-responsive" /><br />
                               <h4 class="text-info"><?php echo $row["name"]; ?></h4>
                               <h4 class="text-danger">Rs <?php echo $row["price"]; ?></h4>
                               <input type="text" name="quantity" class="form-control" value="1" />
                               <!-- hidden fields to use the data for future use -->
                               <input type="hidden" name="hidden_name" value="<?php echo $row["name"]; ?>" />
                               <input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>" />
                               <input type="submit" name="add_to_cart" style="margin-top:5px;" class="btn btn-success" value="Add to Cart" />
                          </div>
                     </form>
                </div>
                <?php
                     }
                }
                ?>
                <div style="clear:both"></div>
                <br />
                <h3>Order Details</h3>
                <div class="table-responsive">
                     <table class="table table-bordered">
                          <tr>
                               <th width="40%">Item Name</th>
                               <th width="10%">Quantity</th>
                               <th width="20%">Price</th>
                               <th width="15%">Total</th>
                               <th width="5%">Action</th>
                          </tr>
                          <?php
                          //display the data present in the shopping cart
                          if(!empty($_SESSION["shopping_cart"]))
                          {
                               //this block will execute if there is data present in shopping cart
                               $total = 0;
                               //loop through all the items
                               foreach($_SESSION["shopping_cart"] as $keys => $values)
                               {
                          ?>
                          <tr>
                               <!-- display the information -->
                               <td><?php echo $values["item_name"]; ?></td>
                               <td><?php echo $values["item_quantity"]; ?></td>
                               <td>Rs <?php echo $values["item_price"]; ?></td>
                               <td>Rs <?php echo number_format($values["item_quantity"] * $values["item_price"], 2); ?></td>
                               <td><a href="boook.php?action=delete&id=<?php echo $values["item_id"]; ?>"><span class="text-danger">Remove</span></a></td>
                          </tr>
                          <?php
                                    $total = $total + ($values["item_quantity"] * $values["item_price"]);
                               }
                          ?>
                          <tr>
                               <td colspan="3" align="right">Total</td>
                               <td align="right">Rs <?php echo number_format($total, 2); ?></td>
                               <td></td>
                          </tr>
                          <?php
                          }
                          ?>
                     </table>
                </div>
           </div>
           <br />
      </body>
 </html>
