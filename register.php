<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/21 0021
 * Time: 上午 11:20
 */

$postname = $_POST['register_name'];
$postpsd1 = $_POST['register_psd1'];
$postpsd2 = $_POST['register_psd2'];
$postmail = $_POST['register_email'];
$posttel = $_POST['register_tel'];

$flag = true;
$output = "";

function checkdata($name,$psd1,$psd2,$mail,$tel){
    global $flag,$output;

    $reg1 = "/^[\w_-]{6,16}$/";
    if(!preg_match($reg1,$name)){
        $flag = false;
        $output = $output.'名字格式不对'.'   ';
    }

    $reg2 = "/^[\w_-]{6,16}$/";
    if(!preg_match($reg2,$psd1)){
        $flag = false;
        $output = $output.'密码格式不对'.'   ';
    }

    if(strcmp($psd2,$psd1)!=0){
        $flag = false;
        $output = $output.'密码不一致'.'   ';
    }

    $reg3 = "/^(\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*?)/";
    if(!preg_match($reg3,$mail)){
        $flag = false;
        $output = $output.'邮箱格式不对'.'   ';
    }

    $reg4 = "/^1[3578]\d{9}$/";
    if(!preg_match($reg4,$tel)){
        $flag = false;
        $output = $output.'手机号格式不对';
    }




}

checkdata($postname,$postpsd1,$postpsd2,$postmail,$posttel);
if($flag == false){
    echo "<script>alert('$output');location='Register.html';</script>";
}

else{
    insertUser($postname,$postpsd1,$postmail,$posttel);

}

function insertUser($name,$psd,$email,$tel){
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

    $sql1 = "select * from User where name = '$name'";

    $result = mysqli_query($conn,$sql1);


    $sql = "insert into User values('$name','$psd','$email','$tel')";

    if(mysqli_num_rows($result) <= 0) {
        if (mysqli_query($conn, $sql)) {
            echo "新记录插入成功";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }

    else{
        echo "<script>alert('该用户名已经注册，请换其他用户名注册！');location='Register.html';</script>";
    }

    mysqli_close($conn);



}

?>


