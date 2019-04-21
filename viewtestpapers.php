<?php
session_start();
if(!isset($_SESSION['username']))
header('location:adminlogin.php');
if($_SESSION['username']!='admin')
header('location:index.html');

$con=mysqli_connect('localhost','root');
mysqli_select_db($con,'onlinetest');
$q="select * from test";
$result=mysqli_query($con,$q);
$row_count=mysqli_num_rows($result);
?>
<html>
<head>
<title>View Tests</title>
<link rel="stylesheet" type="text/css" href="./css/layout.css">
<link rel="stylesheet" type="text/css" href="./css/theme.css">
<link rel="stylesheet" type="text/css" href="./css/table.css">
</head>
<body>
<div id="header">
<h1>Online Testing</h1>
<h2 id="hello">Hello,<?php echo $_SESSION['username']; ?>!</h2>
</div>
<div id="nav" style="height:601">
<a href="logout.php">Logout</a><br>
<a href="adminhome.php">Back to Control Pannel</a><br>
<a href="managetests.php">Back to Manage Tests</a><br>


</div>
  <div id="section">
  <h1>Control Pannel:Manage Tests:View Test Papers</h1>
  <div id="tablediv">
  <table id="questiontable">
  <tr id="headrow">
      <th>Test Id</th>
      <th>Subject</th>
      <th>Total Questions</th>
      </tr>
      <?php
      for($i=1;$i<=$row_count;$i++)
      {
          $row=mysqli_fetch_array($result);
          $q1="select * from test_question where testid=".$row['testid'];
          $result1=mysqli_query($con,$q1);
          $row_count1=mysqli_num_rows($result1);
          ?>
          <tr class="<?php if($i%2==0) echo "odd"; ?>">
              <td><?php echo $row['testid']; ?></td>
              <td><?php echo $row['subject']; ?></td>
              <td><?php echo $row_count1; ?></td>
      </tr>
      <?php
      }?>
      </table>
      </div>
    </div>
       <div id="footer">
  Online Test 2k19
  </div>
  
  </body>
  </html>
      
      