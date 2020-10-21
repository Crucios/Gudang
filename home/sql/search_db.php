<?php
    session_start();
    require_once("../../php/connect.php");
    if(isset($_POST["search"]) && $_POST["search"] != ""){
        $search = $_POST["search"];
        $query = mysqli_query($con, "SELECT * FROM gudang WHERE nama LIKE '%$search%' OR alamat LIKE '%$search%'");
        if(!empty($query)){
            while ($row = mysqli_fetch_assoc($query)) {
                echo "<div class='card' style ='width:70%; margin:0 auto; margin-bottom:20px;'>";
                echo "<div class='card-body'>";
                echo "<div style='float:right;'>";
                echo "<button type='button' id='editButton' onclick='editGudang(\"" . $row['id_gudang'] . "\")'>Edit</button>
                            <button type='button' id='viewButton' onclick='viewGudang(\"" . $row['id_gudang'] . "\")'>View</button>";
                if($_SESSION["type"] == 0){
                    echo "<button type='button' id='deleteButton' onclick='deleteGudang(\"" . $row['id_gudang'] . "\")'>Delete</button></div>";
                }
                else{
                    echo "</div>";
                }
                echo "<h4 class='card-title'>" .$row['nama']. "</h4>";
                echo "<p class='card-text'>" .$row['alamat']. "</p></div></div>";
            }
        }
    }
    else{
        $query = mysqli_query($con, "SELECT * FROM gudang");
        if(!empty($query)){
            while ($row = mysqli_fetch_assoc($query)) {
                echo "<div class='card' style ='width:70%; margin:0 auto; margin-bottom:20px;'>";
                echo "<div class='card-body'>";
                echo "<div style='float:right;'>";
                echo "<button type='button' id='editButton' onclick='editGudang(\"" . $row['id_gudang'] . "\")'>Edit</button>
                            <button type='button' id='viewButton' onclick='viewGudang(\"" . $row['id_gudang'] . "\")'>View</button>";
                if($_SESSION["type"] == 0){
                    echo "<button type='button' id='deleteButton' onclick='deleteGudang(\"" . $row['id_gudang'] . "\")'>Delete</button></div>";
                }
                else {
                    echo "</div>";
                }
                echo "<h4 class='card-title'>" .$row['nama']. "</h4>";
                echo "<p class='card-text'>" .$row['alamat']. "</p></div></div>";
            }
        }
    }
    
?>