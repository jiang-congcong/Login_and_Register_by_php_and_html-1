<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/20 0020
 * Time: 下午 16:02
 */

function createUserTable(){
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

    $sql = "CREATE TABLE User (
name varchar(30) PRIMARY KEY, 
psd VARCHAR(30) NOT NULL,
email VARCHAR(30) NOT NULL,
tel varchar(30) not null
)";

    if (mysqli_query($conn, $sql)) {
        echo "数据表 User 创建成功";
    } else {
        echo "创建数据表错误: " . mysqli_error($conn);
    }

    mysqli_close($conn);

}

function insertUser(){
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
    $sql = "insert into User values('zhangsan','zs123456','zhangsan@qq.com','13885683879')";

    if (mysqli_query($conn, $sql)) {
        echo "新记录插入成功";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    mysqli_close($conn);



}

//createUserTable();
insertUser();


?>


