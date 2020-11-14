<html>
    <header></header>
    <style>
        body{
            margin: 0 auto;
            padding: 0;
            width: 100%;
        }
        form{
            margin: 0 auto;
            text-align: left;
            width: 50%;
            color: blue;
            font-size: 16px;
        }
        input{
            padding: 10px;
            width: 100%;
        }
        h3{
            color: blue;
            font-size: 24px;
            padding: 10px 0 0 0;
            margin: 0;
        }
        #submit{
            font-weight: 700;
            padding: 10px;
            border-radius: 5px 5px;
        }
 
    </style>
    <body>
        <form action="http://localhost/wordpress/admin/" method="POST">
            <h3>ĐĂNG NHẬP ADMIN</h3><br>
            <span>Tài khoản:</span><br><br>
            <input type="text" name="user" ><br><br>
            <span>Mật Khẩu:</span><br><br>
            <input type="password" name="passWord" ><br><br>
            <a href="#">Quên mật khẩu</a><br><br>
            <input type="submit" id="submit" value="ĐĂNG NHẬP">
        </form>
        <?php 
             $connect=new mysqli("localhost","root","12345678","dichvuhangkhong");
             $sql="select * from admin ";
             if(isset($_POST['user']) && isset($_POST['passWord'])){
                 $user=$_POST['user'];
                 $pass=$_POST['passWord'];
                if($user!='' && $pass!=''){
                    $r=mysqli_query($connect,$sql);
                    while($row=mysqli_fetch_assoc($r)){
                        if($row['taiKhoan']==$user && $row['matKhau']!=$pass){
                            echo("<script>alert('Sai mật khẩu !');</script>");
                        }
                        else if($row['taiKhoan']==$user && $row['matKhau']==$pass){
                            echo("<script>location.assign('http://localhost/wordpress/portal-manager/');</script>");
                        }
                        else{
                            echo("<script>alert('Tên đăng nhập và mật khẩu không đúng !');</script>");
                        }
                    };
                    return;
                }
                echo("<script>alert('Bạn chưa nhập đầy đủ thông tin !');</script>");
             }
             
        ?>
    </body>
</html>