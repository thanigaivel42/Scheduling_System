<?php
   include_once("header.php");
   include_once("navbar.php");
    function generateWeeks($year) {
    $weeks = array();
    $date = new DateTime();

    // Iterate over each week
    for ($week = 1; $week <= 52; $week++) {
    $weekStartDate = $date->setISODate($year, $week)->format('Y-m-d');
    $weekEndDate = $date->modify('+6 days')->format('Y-m-d');
    //print_r($weekStartDate);//die;
    //print_r($weekEndDate);die;

    $weekName = "Week $week";
    $weekLabel = "$weekName ($weekStartDate - $weekEndDate)";
    $weeks[] = array('weekName' => $weekName, 'fromDate' => $weekStartDate, 'toDate' => $weekEndDate, 'label' => $weekLabel);

    $date->modify('+1 day');
    }

    return $weeks;
    }

$selectedYear = '2023';
$weeks = generateWeeks($selectedYear);




function fetchXMLData($filename) {

    if (file_exists($filename)) {

        $xml = simplexml_load_file($filename);
        
        foreach ($xml->week as $week) {
            $attributes = $week->attributes();
            $weekName = (string) $attributes['name'];
            $start_date = (string) $week->start_date;
            $end_date = (string) $week->end_date;
            $employeeName = (string) $week->employee_name;

            $startTime = strtotime($start_date);
            $endTime = strtotime($end_date);
            $totalSeconds = 0;

            while ($startTime <= $endTime) {
            // Check if the current day is a weekday (Monday to Friday)
            if (date('N', $startTime) <= 5) {
            $totalSeconds += 8 * 3600; // Add 8 hours for weekdays
            }
            $startTime = strtotime('+1 day', $startTime); // Move to the next day
            }

            $hours = floor($totalSeconds / 3600);
            $minutes = floor(($totalSeconds % 3600) / 60);
            $seconds = $totalSeconds % 60;
            //echo "Duration: $hours:00";

            $Duration = "$hours:00";

            $emp[] = array('weekname' => $weekName, 'duration'=> $Duration, 'employeeName' => $employeeName);

      }
     
    } else {
        echo "XML file does not exist.";
    }
    return $emp;
}
$filename = 'schedule.xml';
$emps = fetchXMLData($filename);
//print_r($emps);die;


// $input = $emps[0]['weekname'];

// function generateDate($selectedValue)
// {
//     $input = $selectedValue;

//     print_r($input);//die;

//     // Use regular expressions to extract the dates
//     $pattern = '/(\d{4}-\d{2}-\d{2})/';
//     preg_match_all($pattern, $input, $matches);
    
//     // Get the start date (index 0) and end date (index 1)
//     $startDate = $matches[0][0];
//     $endDate = $matches[0][1];
    
//     $date = new DateTime($startDate);

//     while ($date <= new DateTime($endDate)) {
//         $currentDate = $date->format('Y-m-d');
//         //$dates[] = $currentDate;
//         $dates[] = array('dates' => $currentDate);
//         $date->modify('+1 day');
//     }
//     return $dates;
// }

// $dates = generateDate($selectedValue);


function updateDate() {

    $selectedValue = $_POST['course'];

    $input = $selectedValue;

    print_r($input);die;

    // Use regular expressions to extract the dates
    $pattern = '/(\d{4}-\d{2}-\d{2})/';
    preg_match_all($pattern, $input, $matches);
    
    // Get the start date (index 0) and end date (index 1)
    $startDate = $matches[0][0];
    $endDate = $matches[0][1];
    
    $date = new DateTime($startDate);

    while ($date <= new DateTime($endDate)) {
        $currentDate = $date->format('Y-m-d');
        //$dates[] = $currentDate;
        $dates[] = array('dates' => $currentDate);
        $date->modify('+1 day');
    }
    return $dates;

}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $dates = updateDate();
    // Use the $dates array as needed
}

//print_r($dates);die;
?>
<!DOCTYPE html>
<html>
<head>
<style>
table {
  width: 100%;
  border-collapse: collapse;
}

table, th, td {
  border: 1px solid black;
}

th {
  background-color: #f2f2f2;
  text-align: center;
}

th, td {
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}

</style>
</head>
<body>

<form id="myForm" method="post">

<table style="display: table-cell;" >
  <tr>

    <th colspan="8">

		<div class="col-md-5" style="margin-left: 235px;" >   
        <select  id="course" name="course"  class="form-control" onchange="updateDate()">
            <?php foreach ($emps as $emp): ?>
                <option value="<?php echo $emp['weekname']; ?>"><?php echo $emp['weekname']; ?></option>
            <?php endforeach; ?>
        </select>

		</div>		
    </th>
  </tr>
  <tr>
    <td rowspan="2">#</td>
    <td colspan="7"></td>
    <td rowspan="2">Total</td>
  </tr>

  <tr>
    <td>Marketing Team</td>
    <td>00:00</td>
    <td>24:00</td>
    <td>22:30</td>
    <td>24:00</td>
    <td>23:00</td>
    <td>25:00</td>
    <td>00:00</td>
    <td>118:30</td>
  </tr>
  <tr>
  <?php foreach ($emps as $emp): ?>
    <tr>
    <td><?php echo $emp['employeeName']; ?></td>
    <td><?php echo $emp['duration']; ?></td>
    <td><?php echo $emp['duration']; ?></td>
    <td><?php echo $emp['duration']; ?></td>
    <td><?php echo $emp['duration']; ?></td>
    <td><?php echo $emp['duration']; ?></td>
    <td><?php echo $emp['duration']; ?></td>
    <td><?php echo $emp['duration']; ?></td>
    <td><?php echo $emp['duration']; ?></td>
  </tr>
  <?php endforeach; ?>
</tr>

  <tr>
    <td>Development Team</td>
    <td>00:00</td>
    <td>24:00</td>
    <td>22:30</td>
    <td>24:00</td>
    <td>23:00</td>
    <td>25:00</td>
    <td>00:00</td>
    <td>118:30</td>
  </tr>
  <tr>
  <?php foreach ($emps as $emp): ?>
    <tr>
    <td><?php echo $emp['employeeName']; ?></td>
    <td><?php echo $emp['duration']; ?></td>
    <td><?php echo $emp['duration']; ?></td>
    <td><?php echo $emp['duration']; ?></td>
    <td><?php echo $emp['duration']; ?></td>
    <td><?php echo $emp['duration']; ?></td>
    <td><?php echo $emp['duration']; ?></td>
    <td><?php echo $emp['duration']; ?></td>
    <td><?php echo $emp['duration']; ?></td>
  </tr>
  <?php endforeach; ?>
</tr>

  <tr>
    <td>Total</td>
    <td>00:00</td>
    <td>24:00</td>
    <td>22:30</td>
    <td>24:00</td>
    <td>23:00</td>
    <td>25:00</td>
    <td>00:00</td>
    <td>118:30</td>
  </tr>
  </form>
  <script>
    function updateDate() {
        //console.log("hai");die;
        var selectedValue = document.getElementById("course").value;
        console.log(selectedValue); // You can do whatever you want with the selected value here
    
    }
</script>
</body>
</table>
</html>
	
