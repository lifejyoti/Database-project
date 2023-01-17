<?php
// Vishruti Patel [8702093]
// Jiwan Jyoti [8749893]
?>
<?php
     require('DBConnection.php');

    $error = null;
    if(!empty($_GET['orderid'])){
        $orderid = $_GET['orderid'];
    } else {
        $orderid = null;
        $error = "<p> Error! Customer Id not found.";
    }

    if($error == null){
        $query = "SELECT * FROM orderpizza WHERE orderid = $orderid;"; // replace with paramertized query using mysqli_stmt_bind_param
        $result = @mysqli_query($dbc, $query);
        
        if(mysqli_num_rows($result) == 1){
            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
            $pizzatype = $row['PizzaType'];
            $quantity = $row['Quantity'];
            $custid = $row['CustomerID'];
        
          
            //$province = $row['province'];
        } // else-> inccorect entry in db
    } else {
        echo $error;
    }
  
?>

<html>
    <head>
        <title>
            Edit Users
        </title>
    </head>
    <body>
        <h1>Please enter the data to update the record in the Database</h1>
        <form action="update_user.php" method="post" >
        <div class="cus">
    <label for="exampleFormControlInput1">Orderid</label>
    <input type="text" name="orderid" class="form-control" id="orderid" value="<?php echo $orderid; ?>">
  </div>
    
  <div class="name">
    <label for="exampleFormControlInput1">PizzaType</label>
    <input type="text" name="pizzatype" class="form-control" id="pizzatype" value="<?php echo $pizzatype; ?>">
  </div>
    
  <div class="form-group">
    <label for="exampleFormControlInput1">Quantity</label>
    <input type="text" name="quantity" class="form-control" id="quantity" value="<?php echo $quantity; ?>">
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">CustomerID</label>
    <input type="text" name="custid" class="form-control" id="custid" value="<?php echo $custid; ?>">
  </div>
    
  <button type="submit">Update Data</button>
    
  
  
  

</form>
    </body>
</html>




























