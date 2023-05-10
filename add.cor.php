<?php

// Function to add a new team and employee to the XML file
function addTeamAndEmployeeToXML($filename, $team_name, $emp_code,$emp_name) {
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
    
    $teamElement = $dom->createElement('team');
    $teamElement->setAttribute('name', $team_name);
    
    $employeeElementCode = $dom->createElement('employee_code', $emp_code);
	$employeeElementName = $dom->createElement('employee_name', $emp_name);
    
    $teamElement->appendChild($employeeElementCode);
	$teamElement->appendChild($employeeElementName);
    $root->appendChild($teamElement);

    
    $dom->save($filename);
}

// Example usage

$filename = 'teams.xml';
$team_name = $_POST['team_name'];
$emp_code = $_POST['emp_code'];
$emp_name = $_POST['emp_name'];
addTeamAndEmployeeToXML($filename, $team_name, $emp_code,$emp_name);

echo "Team and employee added successfully!";
?>
