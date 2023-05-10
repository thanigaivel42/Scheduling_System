
<?php
  $path = $_SERVER['DOCUMENT_ROOT'];
   $path .= "header.php";
   include_once("header.php");
   include_once("navbar.php");

   
function generateWeeks($year) {
    $weeks = array();
    $date = new DateTime();

    // Iterate over each week
    for ($week = 1; $week <= 52; $week++) {
        $weekStartDate = $date->setISODate($year, $week)->format('Y-m-d');
        $weekEndDate = $date->modify('+6 days')->format('Y-m-d');

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
        foreach ($xml->team as $team) {
          $attributes = $team->attributes();
          $teamName = (string) $attributes['name'];
          $employeeCode = (string) $team->employee_code;
          $employeeName = (string) $team->employee_name;
          $emp[] = array('teamName' => $teamName, 'employeeCode' => $employeeCode, 'employeeName' => $employeeName);

      }
     
    } else {
        echo "XML file does not exist.";
    }
    return $emp;
}
$filename = 'teams.xml';
$emps = fetchXMLData($filename);
//print_r($emps);die;




?>
<html>
<head>
<style>
body {
	background-color: white;
}
</body>
</style>
</head>
<body>
<br><div class="container" >
	
  <div class="row" align="center">
    <div class="col-lg-6" style="margin-left: 260px;">
		<div class="jumbotron">
		Here you will set your schedules
		<form class="form-horizontal" method= "post" action = "add.home.php">
			<fieldset>

			<!-- Form Name -->
			<legend>Set Schedule</legend>


        <meta charset="UTF-8">

        <meta name="viewport" content="width=device-width, initial-scale=1.0">

    </head>

    <body>
        
		<!-- Method Two -->
    <div class="form-group">
		<label class="col-md-4 control-label" for="team_name">Team Name</label> 
		<div class="col-md-5">   
        <select  id="team_name" name="team_name"  class="form-control">
            <?php foreach ($emps as $emp): ?>
                <option value="<?php echo $emp['teamName']; ?>"><?php echo $emp['teamName']; ?></option>
            <?php endforeach; ?>
        </select>

		</div>		
    </div>
		
        <!--Method One-->

    <div class="form-group">
		<label class="col-md-4 control-label" for="emp_name">Employee Name</label> 
		<div class="col-md-5">   
        <select  id="emp_name" name="emp_name"  class="form-control">
            <?php foreach ($emps as $emp): ?>
                <option value="<?php echo $emp['employeeName']; ?>"><?php echo $emp['employeeName']; ?></option>
            <?php endforeach; ?>
        </select>

		</div>		
    </div>
    
    <div class="form-group">
		<label class="col-md-4 control-label" for="week_name">Weeks Name</label> 
		<div class="col-md-5">   
        <select  id="week_name" name="week_name"  class="form-control">
            <?php foreach ($weeks as $week): ?>
                <option value="<?php echo $week['label']; ?>"><?php echo $week['label']; ?></option>
            <?php endforeach; ?>
        </select>

		</div>		
    </div>
    <!-- Method Two -->
        <div class="form-group">
			<label class="col-md-4 control-label" for="start_date">Start date</label> 
			<div class="col-md-5">
		<input type="date"  id="start_date" name="start_date"  class="form-control">
		</div>
		</div>
        <div class="form-group">
			<label class="col-md-4 control-label" for="end_date">End date</label> 
			<div class="col-md-5">
		<input type="date"  id="end_date" name="end_date"  class="form-control">
		</div>
		</div>

        <div class="form-group"  align="right">
        <label class="col-md-4 control-label" for="submit"></label>
            <div class="col-md-5">
            <button id="submit" name="insert" class="btn btn-primary"> Set </button>
            </div>
        </div>
    </body>
</head>
</html>
