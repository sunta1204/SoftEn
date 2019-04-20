<html>
<head>
<title>ThaiCreate.Com PHP & MySQL Tutorial</title>
</head>
<body>
  <?php 
    $conn = new PDO("mysql:host=localhost;dbname=19S1_g5;
      charset=utf8","root","");
  ?>
<form name="frmSearch" method="post" action="<?=$_SERVER['SCRIPT_NAME'];?>">
  <table width="599" border="1">
    <tr>
      <th>Select 
        <select name="ddlSelect" id="ddlSelect">
          <option>- Select -</option>
          <option value="c_id" >ID</option>
          <option value="c_name">Name</option>
          <option value="c_password" >Password</option>
        </select>
        Keyword
        <input name="txtKeyword" type="text" id="txtKeyword" >
      <input type="submit" value="Search"></th>
    </tr>
  </table>
</form>
<?php

  if (!isset($_POST['ddlSelect']) && !isset($_POST['txtKeyword'])) {
    $sql = "SELECT * FROM classroom WHERE l_username = 'chitsutha'";
    $stmt2 = $conn->prepare($sql);
    $stmt2->execute();

      while ($result=$stmt2->fetch()) { 
      echo $result['c_id'];
      echo $result['c_name'];
      echo $result['c_password'];
      echo $result['c_year'];
    }
  } elseif (isset($_POST['ddlSelect']) && isset($_POST['txtKeyword'])) {
    // Search By Name or Email
    $strSQL = "SELECT * FROM classroom WHERE l_username = 'chitsutha'  ";
    if($_POST["ddlSelect"] != "" and  $_POST["txtKeyword"]  != '')
    {
      $strSQL .= " AND (".$_POST["ddlSelect"]." LIKE '%".$_POST["txtKeyword"]."%' ) ";
    } 

    $stmt = $conn->prepare($strSQL);
    $stmt->execute(); ?>

    <table width="600" border="1">
      <tr>
      <th width="91"> <div align="center">CID </div></th>
      <th width="98"> <div align="center">CNAME </div></th>
      <th width="198"> <div align="center">CPASSWORD </div></th>
    </tr>
    <?php 
      while($objResult = $stmt->fetch()) { ?>
         <tr>
          <td><div align="center"><?=$objResult["c_id"];?></div></td>
          <td><?=$objResult["c_name"];?></td>
          <td><?=$objResult["c_password"];?></td>
        </tr>
      <?php }
    ?>
  <?php 
  }
 ?>
</body>
</html>