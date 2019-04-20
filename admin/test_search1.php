<html>
<head>
<title>ThaiCreate.Com PHP & SQL Server (PDO)</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <link rel="stylesheet" type="text/css" href="../style.css">
  <script src="https://cdn.rawgit.com/PascaleBeier/bootstrap-validate/v2.2.0/dist/bootstrap-validate.js"></script>
</head>
<body>
<?php
	ini_set('display_errors', 1);
	error_reporting(~0);

	$search_c_id = null;
  $search_c_name = null;
  $search_c_password = null;
  $search_c_year = null;

	if(isset($_POST["search_c_id"]))
	{
		$search_c_id = $_POST["search_c_id"];
	} 
  elseif (isset($_POST['search_c_name'])) {
    $search_c_name = $_POST['search_c_name'];
    
  } 
  elseif (isset($_POST['search_c_password'])) {
    $search_c_password = $_POST['search_c_password'];
    
  } 
  elseif (isset($_POST['search_c_year'])) {
    $search_c_year = $_POST['search_c_year'];
    
  }
?>
<div class="container" style="margin-top: 50px;">
  <!-- List group -->
  <div class="list-group" id="myList" role="tablist">
    <a class="list-group-item list-group-item-action active" data-toggle="list" href="#search_cid" role="tab">Search By C_ID</a>
    <a class="list-group-item list-group-item-action" data-toggle="list" href="#search_cname" role="tab">Search By C_NAME</a>
    <a class="list-group-item list-group-item-action" data-toggle="list" href="#search_cpassword" role="tab">Search By C_PASSWORD</a>
    <a class="list-group-item list-group-item-action" data-toggle="list" href="#search_cyear" role="tab">Search By C_YEAR</a>
  </div>

  <!-- Tab panes -->
  <div class="tab-content">
    <div class="tab-pane active" id="search_cid" role="tabpanel">
      <form name="form_search_cid" method="post" action="<?php echo $_SERVER['SCRIPT_NAME'];?>">
      <table width="599" border="1">
        <tr>
          <th>Keyword
          <input name="search_c_id" type="text" id="search_c_id" placeholder="search_c_id">
          <input type="submit" value="Search"></th>
        </tr>
      </table>
    </form>
    </div>

    <div class="tab-pane" id="search_cname" role="tabpanel">
      <form name="form_search_cname" method="post" action="<?php echo $_SERVER['SCRIPT_NAME'];?>">
      <table width="599" border="1">
        <tr>
          <th>Keyword
          <input name="search_c_name" type="text" id="search_c_name" placeholder="search_c_name">
          <input type="submit" value="Search"></th>
        </tr>
      </table>
    </form>
    </div>

    <div class="tab-pane" id="search_cpassword" role="tabpanel">
      <form name="form_search_cpassword" method="post" action="<?php echo $_SERVER['SCRIPT_NAME'];?>">
      <table width="599" border="1">
        <tr>
          <th>Keyword
          <input name="search_c_password" type="text" id="search_c_password" placeholder="search_c_password">
          <input type="submit" value="Search"></th>
        </tr>
      </table>
    </form>
    </div>

    <div class="tab-pane" id="search_cyear" role="tabpanel">
      <form name="form_search_cyear" method="post" action="<?php echo $_SERVER['SCRIPT_NAME'];?>">
      <table width="599" border="1">
        <tr>
          <th>Keyword
          <input name="search_c_year" type="text" id="search_c_year" placeholder="search_c_year">
          <input type="submit" value="Search"></th>
        </tr>
      </table>
    </form>
    </div>

  </div> 
  <table width="600" border="1">
    <tr>
      <th width="91"> <div align="center">c_id </div></th>
      <th width="98"> <div align="center">c_Name </div></th>
      <th width="198"> <div align="center">c_password </div></th>
      <th width="97"> <div align="center">c_year </div></th>
    </tr>
    <?php 
      if (!isset($_POST['search_cid']) && !isset($_POST['search_cname']) && !isset($_POST['search_cpassword']) && !isset($_POST['search_cyear'])) {
        $conn2 = new PDO("mysql:host=localhost;dbname=19S1_g5;
        charset=utf8","root","");
    
        $sql2 = "SELECT * FROM classroom WHERE l_username = 'chitsutha'";

        $stmt2 = $conn2->prepare($sql2);
        $stmt2->execute();
        while ($row2=$stmt2->fetch()) { ?>
          <tr>
            <td> <?=$row2['c_id']?> </td>
            <td> <?=$row2['c_name']?> </td>
            <td> <?=$row2['c_password']?> </td>
            <td> <?=$row2['c_year']?> </td>
          </tr>
        <?php }
      } elseif (isset($_POST['search_cid'])) {
        $search_c_id = $_POST["search_c_id"];
        $conn = new PDO("mysql:host=localhost;dbname=19S1_g5;
        charset=utf8","root","");
    
        $sql = "SELECT * FROM classroom WHERE l_username = 'chitsutha' AND c_id LIKE '%".$search_c_id."%' ";

        $stmt = $conn->prepare($sql);
        $stmt->execute();

        while ($row=$stmt->fetch()) { ?>
          <tr>
            <td> <?=$row['c_id']?> </td>
            <td> <?=$row['c_name']?> </td>
            <td> <?=$row['c_password']?> </td>
            <td> <?=$row['c_year']?> </td>
          </tr>
      <?php }
      } elseif (isset($_POST['search_cname'])) {
         $search_c_name = $_POST['search_c_name'];
        $conn3 = new PDO("mysql:host=localhost;dbname=19S1_g5;
        charset=utf8","root","");
    
        $sql3 = "SELECT * FROM classroom WHERE l_username = 'chitsutha' AND c_name LIKE '%".$search_c_name."%' ";

        $stmt3 = $conn3->prepare($sql3);
        $stmt3->execute();
        while ($row3=$stmt3->fetch()) { ?>
          <tr>
            <td> <?=$row3['c_id']?> </td>
            <td> <?=$row3['c_name']?> </td>
            <td> <?=$row3['c_password']?> </td>
            <td> <?=$row3['c_year']?> </td>
          </tr>
      <?php }
      } elseif (isset($_POST['search_cpassword'])) {
        $search_c_password = $_POST['search_c_password'];
        $conn4 = new PDO("mysql:host=localhost;dbname=19S1_g5;
        charset=utf8","root","");
    
        $sql4 = "SELECT * FROM classroom WHERE l_username = 'chitsutha' AND c_password LIKE '%".$search_c_password."%' ";

        $stmt4 = $conn4->prepare($sql4);
        $stmt4->execute();
        while ($row4=$stmt4->fetch()) { ?>
          <tr>
            <td> <?=$row4['c_id']?> </td>
            <td> <?=$row4['c_name']?> </td>
            <td> <?=$row4['c_password']?> </td>
            <td> <?=$row4['c_year']?> </td>
          </tr>
      <?php }
      } elseif (isset($_POST['search_cyear'])) {
        $search_c_year = $_POST['search_c_year'];
        $conn5 = new PDO("mysql:host=localhost;dbname=19S1_g5;
        charset=utf8","root","");
    
        $sql5 = "SELECT * FROM classroom WHERE l_username = 'chitsutha' AND c_year LIKE '%".$search_c_year."%' ";

        $stmt5 = $conn5->prepare($sql5);
        $stmt5->execute();
        while ($row5=$stmt5->fetch()) { ?>
          <tr>
            <td> <?=$row5['c_id']?> </td>
            <td> <?=$row5['c_name']?> </td>
            <td> <?=$row5['c_password']?> </td>
            <td> <?=$row5['c_year']?> </td>
          </tr>
      <?php }
      }
    ?>
</div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>