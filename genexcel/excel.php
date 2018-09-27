<?php 
  $connect=mysqli_connect("localhost","root","12345678","excel_ws");
  $output = '';
  if(isset($_POST["export_excel"])){
    $sql ="SELECT * FROM member ORDER BY mem_id ASC";
    $result = mysqli_query($connect,$sql);
    if(mysqli_num_rows($result) > 0){
      $output .='
      <table class="table" border="1">
      <tr>
      <th>ID</th>
      <th>USERNAME</th>
      <th>FIRSTNAME</th>
      <th>LASTNAME</th>
      </tr>
      ';
      while($row = mysqli_fetch_array($result)){
        $output .='
        <tr>
        <td>'.$row["mem_id"].'</td>
        <td>'.$row["mem_username"].'</td>
        <td>'.$row["mem_firstname"].'</td>
        <td>'.$row["mem_lastname"].'</td>
        </tr>
        ';
      }
      $output .='</table>';
      header("Content-Type: application/xls");
      header("Content-Disposition:attachment; filename=report.xls");
      echo $output;
    }
  }
?>