<?php

//retreive data from API and display response

$url = "https://data.gov.bh/api/explore/v2.1/catalog/datasets/01-statistics-of-students-nationalities_updated/records?where=colleges%20like%20%22IT%22%20AND%20the_programs%20like%20%22bachelor%22&limit=100"
$response = file_get_contents($url);
echo $response;
print_r($response);

// process API response and handle errors 

$data = json_decode($response, true);
echo $response;
print_r($response);

if(!$data || !isset($data["results"])){
    die('error fetching data from API')
}
$result = $data["results"];

?>

<html>
    <head>
        
// layout and styling
        
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css" />
</head>
    <body>
<table>
    <thead>
        
// html table to display the retrieved data
        
<tr>
    <th>Year</th>
    <th>Semester</th>
    <th>The Programs</th>
    <th>Nationality</th>
    <th>Colleges</th>
    <th>Number of students</th>
</tr>
    </thead>
    
// generate table from a php array named $result
    
    <tbody>
        <?php
        foreach($result as $student){
            ?>
            <tr>
            <td><?php
            echo $student["year"];?></td>
            <td><?php echo $student["Semester"];?></td>
          <td><?php  echo $student["the Programs"];?></td>
           <td><?php  echo $student["Nationality"];?></td>
          <td><?php  echo $student["Colleges"];?></td>
          <td><?php  echo $student["Number of students"];?></td>
            </tr>
            <?php
        }
        ?>
</tbody>

</table>
</body>
</html>


