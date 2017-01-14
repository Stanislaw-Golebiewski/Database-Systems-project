<!DOCTYPE HTML>
<html>
<head>
  <title>DuczBase</title>
  <link rel="stylesheet" type="text/css" href="style_main.css">
  <script>    //TĘ FUNKCJĘ TRZEBA ZMIENIĆ!!!
    function show_content(field)
    {
    }
  </script>

  <style>
  #shipment_box{
    width: 100%;
  }
  .in_box{
    width:80%;
    float: left;
    height: 3rem;
    background-color: #6b3a00;
    display: flex;
    align-items: center;
    justify-content: center;  
    font-size: 1rem;
    font-family: verdana;
  }
  .in_box:hover{
    background-color: #b4690f;
    cursor: pointer;
  }
  .accept_field{
    width: 20%;
    float: right;
    height: 3rem;
    background-color: #f14aff;
    display: flex;
    align-items: center;
    justify-content: center;  
  }
  .accept_dield{

  }
  </style>
</head>
<body>

  <form>
     <button id="logout" type="submit" formaction="../php/logout.php">Logout</button>
  </form>

  <div>
    <h1>Spock, welcome to</h1><br>    <!--TU POWINNO BYĆ IMIĘ ZIOMKA/-->
    <div id="logo_big">DuczBase</div>
  </div>

  <div id="main_box">
  
    <ul>
      <li><a href="packer_shipments.php">Your shipments</a></li>
      <li><a class="active" href="packer_all_shipments.php">Get new shipment</a></li>
    </ul>

    <div id="shipment _box">
      <div class="in_box" name='1'>Shipment 1</div><div class="accept_field">ADD</div>
      <div class="in_box" name='2'>Shipment 1</div><div class="accept_field">ADD</div>
      <div class="in_box" name='3'>Shipment 1</div><div class="accept_field">ADD</div>
    </div>
  </div>

</body>
</html>