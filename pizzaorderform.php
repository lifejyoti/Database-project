<?php
// Vishruti Patel [8702093]
// Jiwan Jyoti [8749893]
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Pizza Order Form</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
      body,
      html {
        height: 125%;
        margin: 0;
      }

      h1 {
        color: #fff;
        font-size: 35px;
      }

      .bg {
        /* The image used */
        background-image: url("img1.jpg");
        /* Full height */
        height: 120%;
        /* Center and scale the image nicely */
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
      }

      .top-buffer {
        margin-top: 110px;
      }
    </style>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  </head>
  <body>
    <div class="bg">
      <div class="d-flex justify-content-center"><h1>Bite Pizza <br> Place Your Order Here !! </h1>
        <form action="register.php" method="post" class='card p-4 bg-light top-buffer' style="border:4px solid yellow">
          <div class="custid">
            <label for="exampleFormControlInput1">Customer ID</label>
            <input type="text" name="custid" class="form-control" id="custid" placeholder="Type your Id">
          </div>
          <div class="name">
            <label for="exampleFormControlInput1">CustomerFirstname</label>
            <input type="text" name="fname" class="form-control" id="fname" placeholder="Type your name">
          </div>
          <div class="form-group">
            <label for="exampleFormControlInput1">CustomerLastname</label>
            <input type="text" name="lname" class="form-control" id="lname" placeholder="Type your last name">
          </div>
          <div class="form-group">
            <label for="exampleFormControlInput1">CustomerAddress</label>
            <input type="text" name="address" class="form-control" id="address" placeholder="Type your Address">
          </div>
          <div class="form-group">
            <label for="exampleFormControlSelect2">PizzaType</label>
            <select multiple class="form-control" id="type" name="type">
              <option>11 </option>
              <option>12</option>
              <option>13 </option>
              <option>14</option>
            </select>
          </div>
          <div class="form-group">
            <label for="exampleFormControlSelect2">PizzaName</label>
            <select multiple class="form-control" id="pizzaname" name="pizzaname">
              <option>Pepperoni- 11</option>
              <option>Meat-12 </option>
              <option>Veggie-13 </option>
              <option>Hawaian-14 </option>
            </select>
          </div>
          <div class="form-group">
            <label for="exampleFormControlSelect1">Select Toppings</label>
            <select class="form-control" id="topping" name="topping">
              <option>red onions</option>
              <option>veggie</option>
              <option>black olives</option>
              <option>hot peppers</option>
              <option>Mushrooms</option>
            </select>
          </div>
          <div class="form-group">
            <label for="exampleFormControlSelect1">Quantity</label>
            <select class="form-control" id="quantity" name="quantity">
              <option>1</option>
              <option>2</option>
              <option>3</option>
              <option>4</option>
              <option>5</option>
            </select>
          </div>
          <div class="form-group">
            <label for="exampleFormControlSelect1">Price</label>
            <select class="form-control" id="price" name="price">
              <option>4</option>
              <option>5</option>
              <option>28</option>
              <option>34</option>
            </select>
          </div>
          <div class="totalprice">
            <label for="exampleFormControlInput1">Total Price</label>
            <input type="text" name="totalprice" class="form-control" id="totalprice" onclick="total()">
            <br>
          </div>
          <script type="text/javascript">
            function total() {
              var quantity = parseInt(document.getElementById('quantity').value);
              var price = parseInt(document.getElementById('price').value);
              var total = price * quantity;
              document.getElementById('totalprice').value = total;
            }
          </script>
          <input type="submit" name="btn">
        </form>
      </div>
    </div>
  </body>
</html>