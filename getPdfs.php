<?php

require_once 'dbDetails.php';
 
//connecting to the db
$con = mysqli_connect('localhost','root','','webservice')
         or die('Unable to Connect...');
 
//sql query
$sql = "SELECT * FROM `pdfdetails`";
 
//getting result on execution the sql query
$result = mysqli_query($con,$sql);
 
//response array
$response = array();
 
$response['error'] = false;
 
$response['message'] = "PDfs fetched successfully.";
 
$response['pdfs'] = array();
 
//traversing through all the rows
 
while($row =mysqli_fetch_array($result)){
    $temp = array();
    $temp['id'] = $row['id'];
    $temp['url'] = $row['url'];
    $temp['name'] = $row['name'];
    array_push($response['pdfs'],$temp);
}
 
echo json_encode($response);
?>