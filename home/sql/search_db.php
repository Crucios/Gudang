<?php
    session_start();
    require_once("../../php/connect.php");
    if(isset($_POST["search"]) && $_POST["search"] != ""){
        $search = $_POST["search"];
        $query = mysqli_query($con, "SELECT * FROM gudang WHERE nama LIKE '%$search%' OR alamat LIKE '%$search%'");
        if(!empty($query)){
            while ($row = mysqli_fetch_assoc($query)) {
                echo "<div class='card' style ='width:90%; height:150px; margin:0 auto; margin-bottom:20px;'>";
                echo "<div class='grid-container'>";
                echo "<div class='judul'><h4 class='namagud'>" .$row['nama']. "</h4></div>";
                echo "<div class='keterangan'><p class='para'>" .$row['alamat']. "</p></div>";
                echo "<div class='menu'>";
                echo "<div class='edit'><button type='button' class='btn' id='editButton' onclick='editGudang(\"" . $row['id_gudang'] . "\")'>Edit</button></div>";
                echo "<div class='view'><button type='button' class='btn' id='viewButton' onclick='viewGudang(\"" . $row['id_gudang'] . "\")'>View</button></div>";
                if($_SESSION["type"] == 0){
                    echo "<div class='delete'><button type='button' class='btn' id='deleteButton' onclick='deleteGudang(\"" . $row['id_gudang'] . "\")'>Delete</button></div>";
                }
                echo "</div></div></div>";
            }
        }
    }
    else{
        $query = mysqli_query($con, "SELECT * FROM gudang");
        if(!empty($query)){
            while ($row = mysqli_fetch_assoc($query)) {
                echo "<div class='card' style ='width:90%; height:150px; margin:0 auto; margin-bottom:20px;'>";
                echo "<div class='grid-container'>";
                echo "<div class='judul'><h4 class='namagud'>" .$row['nama']. "</h4></div>";
                echo "<div class='keterangan'><p class='para'>" .$row['alamat']. "</p></div>";
                echo "<div class='menu'>";
                echo "<div class='edit'><button type='button' class='btn' id='editButton' onclick='editGudang(\"" . $row['id_gudang'] . "\")'>Edit</button></div>";
                echo "<div class='view'><button type='button' class='btn' id='viewButton' onclick='viewGudang(\"" . $row['id_gudang'] . "\")'>View</button></div>";
                if($_SESSION["type"] == 0){
                    echo "<div class='delete'><button type='button' class='btn' id='deleteButton' onclick='deleteGudang(\"" . $row['id_gudang'] . "\")'>Delete</button></div>";
                }
                echo "</div></div></div>";
            }
        }
    }
?>