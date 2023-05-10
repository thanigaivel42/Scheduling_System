

<?php

// Function to add a new team and employee to the XML file
function addTeamAndEmployeeToXML($filename, $teamName, $employeeName) {
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
    $teamElement->setAttribute('name', $teamName);
    
    $employeeElement = $dom->createElement('employee', $employeeName);
    
    $teamElement->appendChild($employeeElement);
    $root->appendChild($teamElement);
    
    $dom->save($filename);
}

// Example usage

$filename = 'teams.xml';
$teamName = $_POST['falname'];
$employeeName = $_POST['Designation'];

addTeamAndEmployeeToXML($filename, $teamName, $employeeName);

echo "Team and employee added successfully!";
?>
