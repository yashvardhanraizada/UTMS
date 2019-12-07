<?php
//if(isset($_POST["submit"])) {
    session_start();
    print_r($_SESSION);
    $target_dir = "uploads/";
    $file = $_FILES['addProof']['name'];
    $target_file = $target_dir . basename($_FILES["addProof"]["name"]);
    $uploadOk = 1;

    //print_r($_FILES);
    print_r($_POST);


    $file_type=$_FILES['addProof']['type'];
    if (!($file_type=="application/pdf" || $file_type=="image/gif" || $file_type=="image/jpeg")) {
        $uploadOk = 0;
    }

    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }

    if ($_FILES["addProof"]["size"] > 1000000000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }


    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["addProof"]["tmp_name"], $target_file)) {
            echo "The file ". basename( $_FILES["addProof"]["name"]). " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
    echo $_FILES["addProof"]["error"];
//}
?>