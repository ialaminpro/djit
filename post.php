<?php

session_start();
include_once 'php/db_connect.php';
include_once 'php/psl-config.php';



if (isset($_POST['comment'])) {

    if (empty($_SESSION)) {
        header("Location: login.php?error=4");
        exit();
    } {

        $target_file = '';
        $post_id = $_POST["post_id"];
        $comment = $_POST["comment"];
        $userid = $_POST["userid"];

        if ($_FILES["fileToUpload"]["name"]) {
            $target_dir = "uploads/comments/";
            $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
            $uploadOk = 1;
            $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image

            $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
            if ($check !== false) {
                echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                echo "File is not an image.";
                $uploadOk = 0;
            }

// Check if file already exists
//if (file_exists($target_file)) {
//    echo "Sorry, file already exists.";
//    $uploadOk = 0;
//}
// Check file size
//if ($_FILES["fileToUpload"]["size"] > 500000) {
//    echo "Sorry, your file is too large.";
//    $uploadOk = 0;
//}
// Allow certain file formats
            if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
                echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                $uploadOk = 0;
            }
// Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 0) {
                echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
            } else {
                if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
//echo "The file " . basename($_FILES["fileToUpload"]["name"]) . " has been uploaded.";

                    $file = basename($_FILES["fileToUpload"]["name"]);
                }
//else {
//        echo "Sorry, there was an error uploading your file.";
//    }
            }
        } else {
            $target_file = '';
        }


        if ($insert_stmt = $mysqli->prepare("INSERT INTO comments (comment_details, post_id,user_id, comments_img) VALUES (?, ?, ?, ?)")) {
            $insert_stmt->bind_param('ssss', $comment, $post_id, $userid, $target_file);
// Execute the prepared query.
            if (!$insert_stmt->execute()) {
                header("Location: index.php");
            } else {
                header("Location: index.php");
            }
        }
    }
}

if (isset($_POST['post'])) {

//print_r($_SESSION);exit();
    if (empty($_SESSION)) {
        header("Location: login.php?error=4");
        exit();
    } {

        $target_file = '';
        $title = $_POST["title"];
        $details = $_POST["details"];
        $userid = $_POST["userid"];

        if ($_FILES["fileToUpload"]["name"]) {
            $target_dir = "uploads/";
            $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
            $uploadOk = 1;
            $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image

            $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
            if ($check !== false) {
                echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                echo "File is not an image.";
                $uploadOk = 0;
            }

// Check if file already exists
//if (file_exists($target_file)) {
//    echo "Sorry, file already exists.";
//    $uploadOk = 0;
//}
// Check file size
//if ($_FILES["fileToUpload"]["size"] > 500000) {
//    echo "Sorry, your file is too large.";
//    $uploadOk = 0;
//}
// Allow certain file formats
            if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
                echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                $uploadOk = 0;
            }
// Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 0) {
                echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
            } else {
                if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
//echo "The file " . basename($_FILES["fileToUpload"]["name"]) . " has been uploaded.";

                    $file = basename($_FILES["fileToUpload"]["name"]);
                }
//else {
//        echo "Sorry, there was an error uploading your file.";
//    }
            }
        } else {
            $target_file = '';
        }




        if ($insert_stmt = $mysqli->prepare("INSERT INTO forum (title, details, userid, img) VALUES (?, ?, ?, ?)")) {
            $insert_stmt->bind_param('ssss', $title, $details, $userid, $target_file);
// Execute the prepared query.
            if (!$insert_stmt->execute()) {
                header("Location: index.php");
            } else {
                header("Location: index.php");
            }
        }
    }
}


if (isset($_POST['comment_id_delete'])) {

    $sql = "DELETE FROM comments WHERE comment_id={$_POST['comment_id_delete']}";
    if (mysqli_query($mysqli, $sql)) {
        echo 1;
        exit;
    } else {
        echo 0;
        exit;
    }
}
if (isset($_POST['post_id_delete'])) {

    $sql = "DELETE FROM forum WHERE post_id={$_POST['post_id_delete']}";
    if (mysqli_query($mysqli, $sql)) {
        echo 1;
        exit;
    } else {
        echo 0;
        exit;
    }
}
if (isset($_POST['epost_id'])) {
    $etitle = $_POST['etitle'];
    $epost_id = $_POST['epost_id'];
    $edetails = $_POST['edetails'];
//    print_r($_POST);
//    exit();

    $sql = "UPDATE forum SET details ='{$edetails}', title = '{$etitle}' WHERE post_id = '{$epost_id}' ";

    if (mysqli_query($mysqli, $sql)) {
        header("Location: index.php?Updated");
    } else {
        header("Location: index.php?Failed");
    }
}
if (isset($_POST['post_id_edit'])) {

    $sql = "SELECT * FROM forum WHERE post_id={$_POST['post_id_edit']}";

    $result = $mysqli->query($sql);
    if ($result->num_rows > 0) {
// output data of each row
        while ($row = $result->fetch_assoc()) {
            echo $row['post_id'] . '#' . $row['title'] . '#' . $row['details'] . '#' . $row['img'];
        }

        exit;
    } else {
        echo 0;
        exit;
    }
}
if (isset($_POST['comment_id_edit'])) {

    $sql = "SELECT * FROM comments WHERE comment_id={$_POST['comment_id_edit']}";

    $result = $mysqli->query($sql);
    if ($result->num_rows > 0) {
// output data of each row
        while ($row = $result->fetch_assoc()) {
            echo $row['comment_id'] . '#' . $row['comment_details'] . '#' . $row['post_id'] . '#' . $row['comments_img'] . '#' . $row['user_id'];
        }

        exit;
    } else {
        echo 0;
        exit;
    }
}

if (isset($_POST['comment_id'])) {

    $comment_id = $_POST['comment_id'];
    $comment_details = $_POST['comment_details'];
//    print_r($_POST);
//    exit();

    $sql = "UPDATE comments SET comment_details='{$comment_details}' WHERE comment_id = '{$comment_id}' ";

    if (mysqli_query($mysqli, $sql)) {
        header("Location: index.php?Updated");
    } else {
        header("Location: index.php?Failed");
    }
}

    