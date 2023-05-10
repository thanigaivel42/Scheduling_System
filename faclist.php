<?php
   include_once("header.php");
   include_once("navbar.php");
?>
<html>
<head>
<style>

body {
  background-color: #eee;
}
th {
  text-align: center;
}
tr {
   height: 30px;
}
td {
    padding-top: 5px;
  padding-left: 20px; 
  padding-bottom: 5px;  
  height: 20px;
}
</body>
</style>
</head>
<body><br>
<div class="container">
<body>
    <?php
     echo "<tr>
            <td>";
               function fetchXMLData($filename) {
                if (file_exists($filename)) {
                    $xml = simplexml_load_file($filename);
                    echo "<div class='container'><table width='' class='table table-bordered' border='1' >
                    <tr>
                        <th>Team Name</th>
                        <th>Employee Code</th>
                        <th>Employee Name</th>
                    </tr>";
                    foreach ($xml->team as $team) {
                      $attributes = $team->attributes();
                      $teamName = (string) $attributes['name'];
                      $employeeCode = (string) $team->employee_code;
                      $employeeName = (string) $team->employee_name;
                      echo "<tr>";
                      echo "<td>" . $teamName . "</td>";
                      echo "<td>" . $employeeCode . "</td>";
                      echo "<td>" . $employeeName . "</td>";
                      echo "</tr>";
                  }
                  echo "</table>";
                  echo "</td>           
              </tr>";
                    echo "</table>";
                } else {
                    echo "XML file does not exist.";
                }
            }
            $filename = 'teams.xml';
            fetchXMLData($filename);
    ?>
</fieldset>
</form>
</div>
</div>
</div>
</div>
</body>
</html>
  