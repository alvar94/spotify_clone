<?php
include("../../config.php");


if (isset($_POST['playlistId']) && isset($_POST['songId'])) {
    $playlistId = $_POST['playlistId'];
    $songId = $_POST['songId'];

    $orderIdQuery = mysqli_query($con, "SELECT MAX(playlistOrder) as playlistOrder FROM playlistsongs WHERE playlistId='$playlistId'");
    $row = mysqli_fetch_array($orderIdQuery);
    $order = $row['playlistOrder'] + 1;
 
    $query = mysqli_query($con, "INSERT INTO playlistsongs VALUES('', '$songId', '$playlistId', '$order')");
}
else {
    echo "PlaylistId or songId was not passed into AddToPlaylist.php";
}



?>