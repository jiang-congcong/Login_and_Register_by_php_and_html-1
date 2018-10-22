<?php

$postname = $_POST['name'];
$postpsd = $_POST['psd'];

function checkLogin($name1,$psd1)
{
    $servername = "localhost";
    $username = "root";
    $password = "root123";
    $dbname = "test_db";

// 创建连接
    $conn = mysqli_connect($servername, $username, $password, $dbname);
// 检测连接
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    $sql = "SELECT psd FROM User WHERE name = '" . $name1 . "'";
    //echo $sql;
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_array($result)) {
            $psd2 = $row["psd"];
            if (strcmp($psd1, $psd2) != 0) {
                echo "<script>alert('用户名或密码错误!');location='Login.html';</script>";
            } else {
                echo "<script>alert('欢迎登陆!');location='#';</script>";
            }
        }
    }
    else {
        echo "<script>alert('用户名或密码错误!');location='Login.html';</script>";
    }

}

checkLogin($postname,$postpsd);


?>
