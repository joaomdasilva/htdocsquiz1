<?php
$cn = new mysqli("localhost", "web", "1234", "quiz");
$sql= "SELECT * FROM quiz1;";
$result= $cn->query($sql);
echo "<pre>";#user friendly view
print_r($result);
$sql = "SELECT id, name, date, score, phone FROM quiz1;";
$result = $cn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["id"]. " - name: " . $row["name"]. " " . $row["date"]. " ". $row["phone"] . " ". $row["score"] . "<br>";
    }
} else {
    echo "0 results";
}
$cn->close();