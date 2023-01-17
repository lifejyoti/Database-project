<?php
// Vishruti Patel [8702093]
// Jiwan Jyoti [8749893]
?>

<?php
    require('DBConnection.php');
    $errors = [];
    if(!empty($_POST['orderid'])){
        $orderid = $_POST['orderid'];  
    } else {
        $orderid = null;
        $errors[] = "<p> Error!!!! ID is required!!</p>";
    }

    if(!empty($_POST['pizzatype'])){
        $pizzatype = $_POST['pizzatype'];  
    } else {
        $pizzatype = null;
        $errors[] = "<p> Error!!!! pizzatype is required!!</p>";
    }
    

    
    if(!empty($_POST['quantity'])){
        $quantity = $_POST['quantity'];  
    } else {
        $quantity = null;
        $errors[] = "<p> Error!!!! Quatity is required!!</p>";
    }
   
    if(!empty($_POST['custid'])){
        $custid = $_POST['custid'];  
    } else {
        $custid = null;
        $errors[] = "<p> Error!!!! ID of customer is required!!</p>";
    }
   
    if(count($errors) == 0){
        $orderid_clean = prepare_string($dbc, $orderid);
       $custid_clean = prepare_string($dbc, $custid);
       // $fname_clean = prepare_string($dbc, $fname);
        //$lname_clean = prepare_string($dbc, $lname);
        $pizzatype_clean = prepare_string($dbc, $pizzatype);
       //$pizzaname_clean = prepare_string($dbc, $pizzaname);
       // $price_clean = prepare_string($dbc, $price);
        $quantity_clean = prepare_string($dbc, $quantity);
        //$address_clean = prepare_string($dbc, $address);
        //$totalprice_clean = prepare_string($dbc, $totalprice);
       // $topping_clean = prepare_string($dbc, $topping);

      
      
         $queryCust = "UPDATE orderpizza SET PizzaType= ?, Quantity = ?, CustomerID = ? WHERE  orderid = ?;";
        //$queryCust = "INSERT INTO customer(CustomerID, CustomerFirstname, CustomerLastname, CustomerAddress) VALUES (?,?,?,?)";
      
        $stmt = mysqli_prepare($dbc, $queryCust);
        
       mysqli_stmt_bind_param(
           $stmt,
           'iiis',
           $pizzatype_clean,
           $quantity_clean,
           $custid_clean ,
         $orderid_clean
        
      );
        
       $result = mysqli_stmt_execute($stmt);

     
        
       if($result) {
        header("Location: details.php");
                exit;
    } else {
        echo 'Failure!';
    }
       
   } else {
       foreach($errors as $error){
           echo $error;
       }
   }
   // $query = "UPDATE users SET name = ?, email = ?, phone = ?, province = ? WHERE  user_id = ?;";
?>


































   