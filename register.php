<?php
// Vishruti Patel [8702093]
// Jiwan Jyoti [8749893]
?>

<?php
    require('DBConnection.php');
    $errors = [];
    if(!empty($_POST['custid'])){
        $custid = $_POST['custid'];  
    } else {
        $custid = null;
        $errors[] = "<p> Error!!!! ID is required!!</p>";
    }

    if(!empty($_POST['fname'])){
        $fname = $_POST['fname'];  
    } else {
        $fname = null;
        $errors[] = "<p> Error!!!! FirstName is required!!</p>";
    }
    
    if(!empty($_POST['type'])){
        $type= $_POST['type'];  
    } else {
        $type = null;
        $errors[] = "<p> Type is required!!</p>";
    }
    
    if(!empty($_POST['lname'])){
        $lname = $_POST['lname'];  
    } else {
        $lname = null;
        $errors[] = "<p> Error!!!! LastName is required!!</p>";
    }
   
    if(!empty($_POST['address'])){
        $address = $_POST['address'];  
    } else {
        $address = null;
        $errors[] = "<p> Error!!!! Address is required!!</p>";
    }
    if(!empty($_POST['pizzaname'])){
        $pizzaname = $_POST['pizzaname'];  
    } else {
        $pizzaname = null;
        $errors[] = "<p> Error!!!! Pizza Name is required!!</p>";
    }
    if(!empty($_POST['price'])){
        $price = $_POST['price'];  
    } else {
        $price = null;
        $errors[] = "<p> Error!!!! Price is required!!</p>";
    }
    if(!empty($_POST['quantity'])){
        $quantity = $_POST['quantity'];  
    } else {
        $quantity = null;
        $errors[] = "<p> Error!!!! Quantity is required!!</p>";
    }
    if(!empty($_POST['topping'])){
        $topping = $_POST['topping'];  
    } else {
        $topping = null;
        $errors[] = "<p> topping is required!!</p>";
    }
    if(!empty($_POST['totalprice'])){
        $totalprice = $_POST['totalprice'];  
    } else {
        $totalprice = null;
        $errors[] = "<p> Error!!!!lets calculate price</p>";
    }
    if(count($errors) == 0){
        $custid_clean = prepare_string($dbc, $custid);
        $fname_clean = prepare_string($dbc, $fname);
        $lname_clean = prepare_string($dbc, $lname);
        $type_clean = prepare_string($dbc, $type);
       $pizzaname_clean = prepare_string($dbc, $pizzaname);
        $price_clean = prepare_string($dbc, $price);
        $quantity_clean = prepare_string($dbc, $quantity);
        $address_clean = prepare_string($dbc, $address);
        $totalprice_clean = prepare_string($dbc, $totalprice);
        $topping_clean = prepare_string($dbc, $topping);
      
        
        $queryCust = "INSERT INTO customer(CustomerID, CustomerFirstname, CustomerLastname, CustomerAddress) VALUES (?,?,?,?)";
      
        $stmt = mysqli_prepare($dbc, $queryCust);
        
       mysqli_stmt_bind_param(
           $stmt,
           'isss',
           $custid_clean ,
            $fname_clean,
          $lname_clean,
       $address_clean);
        
       $result = mysqli_stmt_execute($stmt);


       $queryPizza = "INSERT INTO pizza(PizzaType, PizzaName, Price, Topping) VALUES (?,?,?,?)";
          
       $stmt = mysqli_prepare($dbc, $queryPizza);
        
       mysqli_stmt_bind_param(
           $stmt,
           'isis',
           $type_clean,
           $pizzaname_clean,
           $price_clean,
           $topping_clean);
        
       $result = mysqli_stmt_execute($stmt);
       
       $queryOrderPizza = "INSERT INTO orderpizza( PizzaType, Quantity, CustomerID) VALUES (?,?,?)";
          
       $stmt = mysqli_prepare($dbc, $queryOrderPizza);
        
       mysqli_stmt_bind_param(
           $stmt,
           'iii',
           $type_clean,
           $quantity_clean,
           $custid_clean);
        
       $result = mysqli_stmt_execute($stmt);

        $queryGetOrderId= "SELECT orderid FROM orderpizza WHERE CustomerID = $custid";
        $results = @mysqli_query($dbc,$queryGetOrderId);

        $orderIdValue = 0;
        while($row = mysqli_fetch_array($results, MYSQLI_ASSOC)){

            $orderIdValue = $row['orderid'];
        }

       $queryOrderdone = "INSERT INTO orderdone( orderid, CustomerID, TotalPrice) VALUES (?,?,?)";
          
       $stmt = mysqli_prepare($dbc, $queryOrderdone);
        
       mysqli_stmt_bind_param(
           $stmt,
           'iii',
           $orderIdValue,
           $custid_clean,
           $totalprice_clean);
        
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
?>






























