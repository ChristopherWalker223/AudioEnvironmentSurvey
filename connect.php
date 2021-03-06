<?php
$occupation = $_POST['occupation'];
$field = $_POST['field'];
$whySelect = $_POST['whySelect'];
$whyNotSelect = $_POST['whyNotSelect'];
$additionalComments = $_POST['additionalComments'];
$forestValueBox = $_POST['forestValueBox'];
$cityValueBox = $_POST['cityValueBox'];
$noiseValueBox = $_POST['noiseValueBox'];
$oceanValueBox = $_POST['oceanValueBox'];
$rainValueBox = $_POST['rainValueBox'];
$officeValueBox = $_POST['officeValueBox'];

$conn = new mysqli('localhost','root','','audio_survey_data');

if($conn->connect_error){
    die('Connection Failed : '.$conn->connect_error);
}

else{
    $stmt = $conn->prepare("insert into audio_survey_data_table(occupation, field, whySelect, whyNotSelect, additionalComments, forestValueBox, cityValueBox, noiseValueBox, oceanValueBox, rainValueBox, officeValueBox) values(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    
    $stmt->bind_param("sssssiiiiii", $occupation, $field, $whySelect, $whyNotSelect, $additionalComments, $forestValueBox, $cityValueBox, $noiseValueBox, $oceanValueBox, $rainValueBox, $officeValueBox);
    
    $stmt->execute();
    echo "Thank you for participating in this study.";
    $stmt->close();
    $conn->close();
}
?>