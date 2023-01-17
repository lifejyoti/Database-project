<?php
// Vishruti Patel [8702093]
// Jiwan Jyoti [8749893]
?>
<?php
    require('DBConnection.php');

    $query = 'SELECT * FROM orderpizza';
    $results = @mysqli_query($dbc,$query);

?>
<html>
    <head>
        
    </head>
    <body>
        <h1>Thank you for your order.</h1>
        <table width="80%">
            <thead>
                <tr>
                 
                <th>orderID</th>
                    <th>CustomerID</th>
                    <th>PizzaType</th>
                    <th>Quantity</th>
                    <th>Update</th>
                    
                    
                </tr>
            </thead>
            <tbody>
                

                        <?php
                        while($row = mysqli_fetch_array($results, MYSQLI_ASSOC)){
             



                           
                            $str  = "<tr><td> {$row['orderid']}</td>";
                            $str  .= "<td> {$row['CustomerID']}</td>";
                            $str .= "<td> {$row['PizzaType']}</td>";
                            $str .= "<td> {$row['Quantity']}</td>";
                            $str .= "<td> <a href='edit_user.php?orderid={$row['orderid']}'>Edit</a> |</tr>";
    
                            echo $str;
                        }
                
                    
                ?>


            </tbody>
        </table>
    </body>
</html>