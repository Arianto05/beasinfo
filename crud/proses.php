<?php
    include 'fungsi.php';

    if(isset($_POST['aksi'])){
        if($_POST['aksi'] == "add"){
            
            $berhasil = tambah_data($_POST, $_FILES);

            if($berhasil){
                header("location: index.php");
            } else {
                echo $berhasil;
            }

        } else if($_POST['aksi'] == "edit"){

            $berhasil = ubah_data($_POST, $_FILES); 

            if($berhasil){
                header("location: index.php");
            } else {
                echo $berhasil;
            }

        }

    }

    if(isset($_GET['hapus'])){
        $id_beasiswa = $_GET['hapus'];

        $queryShow = "SELECT * FROM beasiswa WHERE id_beasiswa = '$id_beasiswa';";
        $sqlShow = mysqli_query($conn, $queryShow);
        $result = mysqli_fetch_assoc($sqlShow);

        //var_dump($result);

        unlink("img/". $result['foto_beasiswa']);



        $query = "DELETE FROM beasiswa WHERE id_beasiswa = '$id_beasiswa';";
        $sql = mysqli_query($conn, $query);

        if($sql){
            header("location: index.php");
            //echo "Data Berhasil Ditambahkan <a href='index.php'>[Home]</a>";
        } else {
            echo $query;
        }
        //echo "Hapus Data <a href='index.php'>[Home]</a>";
    }
?>