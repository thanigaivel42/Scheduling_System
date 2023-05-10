<?php 

 function getPosts()
   {
    $posts = array();
 
	  $posts[0] = $_POST['team_name'];
	  $posts[1] = $_POST['emp_name'];
    $posts[2] = $_POST['week_name'];
    $posts[3] = $_POST['start_date'];
    $posts[4] = $_POST['end_date'];
    //print_r($posts);die;
    return $posts;
}

$data = getPosts();

function addTeamAndEmployeeToXML($filename, $team_name,$emp_name,$week_name,$start_date,$end_date) {
  $dom = new DOMDocument();
  $dom->preserveWhiteSpace = false;
  $dom->formatOutput = true;
  
  if (file_exists($filename)) {
      $dom->load($filename);
      $root = $dom->documentElement;
  } else {
      $root = $dom->createElement('data');
      $dom->appendChild($root);
  }
  
  $teamElement = $dom->createElement('week');
  $teamElement->setAttribute('name', $week_name);
  
  $TeamName = $dom->createElement('team_name', $team_name);
  $employeeName = $dom->createElement('employee_name', $emp_name);
  $ElementStartDate = $dom->createElement('start_date', $start_date);
  $ElementEndDate = $dom->createElement('end_date', $start_date);
  
  $teamElement->appendChild($TeamName);
  $teamElement->appendChild($employeeName);
  $teamElement->appendChild($ElementStartDate);
  $teamElement->appendChild($ElementEndDate);
  $root->appendChild($teamElement);

  
  $dom->save($filename);
}

// Example usage

$filename = 'schedule.xml';

addTeamAndEmployeeToXML($filename,$data[0],$data[1],$data[2],$data[3],$data[4]);

echo "Team and employee added successfully!";
?>






