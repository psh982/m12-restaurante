<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
<select id="dropdown3" name="sala">
<option value="">Seleccione un tipo de mesa</option>
  <?php
      include("./connection.php");      
      $sqls = "SELECT DISTINCT sillas FROM tbl_mesas ORDER BY sillas ASC";
      $stmt = mysqli_prepare($conn, $sqls);
      mysqli_stmt_execute($stmt);
      $result = mysqli_stmt_get_result($stmt);
      if (mysqli_stmt_affected_rows($stmt) > 0){
        while ($row = mysqli_fetch_assoc($result)) {
          echo "<option value='" . $row['sillas'] . "'>" . $row['sillas'] . "</option>";
        }
      }
  ?>
</select>

</body>
</html>
            