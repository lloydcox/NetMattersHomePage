<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "netmatters";

$conn = mysqli_connect($servername, $username, $password, $dbname);
$query = mysqli_query($conn,"SELECT * FROM blog ORDER BY id DESC;");
$result = $query->fetch_assoc();

$id = $result['id'];
$theme = $result['theme'];
$image = $result['image'];
$title = $result['title'];
$content = $result['content'];
$tag = $result['tag'];
$tooltip = $result['tooltip'];
$author = $result['author'];
$author_image = $result['author_image'];
$date = $result['date'];
$link = $result['link'];

