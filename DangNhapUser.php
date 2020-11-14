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
            width: 100%;
        }
        table{
            width: 100%;
            padding: 10px ;
            font-size: 18px;
        }
        h3{
            color: blue;
            font-size: 24px;
            padding: 10px 0 0 0;
            margin: 0;
        }
        td{
            padding: 10px;
        }
        #submit{
            font-weight: 700;
            color: white;
            background-color: orange;
            padding: 10px;
            width: 50%;
            border-radius: 5px 5px;
        }
        #submit:hover{
            background-color:turquoise;
        }     
        input{
            width: 100%;
            border: 1px solid black;
            border-radius: 5px 5px ; 
            padding: 10px;
        }
        #subTable{ 
            padding: 0;
        }
        #subTable td{
            background-color:lightblue;
        }
        th{
            background-color: lightseagreen;
        }
    </style>
    <body>
        <form action="http://localhost/wordpress/dang-nhap/" method="POST">
            <table>
                <tr>
                    <td style="width:60%"><h3>TẠO MỚI THÀNH VIÊN</h3></td>
                    <td><h3>THÀNH VIÊN ĐĂNG NHẬP</h3></td>
                </tr>
                <tr>
                    <td>
                        <p>Chưa là thành viên.</p>
                        <p>Bấm "ĐĂNG KÝ" bên dưới để tạo mới tài khoản thành viên để nhận được những ưu đãi lớn nhất từ chúng tôi.</p>
                        <a href="http://localhost/wordpress/dang-ki/">Đăng ký</a>
                        <p>Ưu đãi cực lớn dành cho thành viên!</p>
                        <table id="subTable">
                            <tr>
                                <th>Số lượng vé</th>
                                <th>Ưu đãi</th>
                                <th>Áp dụng</th>
                            </tr>
                            <tr>
                                <td>10 vé</td>
                                <td>100.000 VND</td>
                                <td>Voucher</td>
                            </tr>
                            <tr>
                                <td>30 vé</td>
                                <td>500.000 VND</td>
                                <td>Voucher</td>
                            </tr>
                        </table>
                        <p>Lưu ý: * Áp dụng cho vé mua từ: 01/10/2020 - 31/12/2020 * Voucher có hiệu lực 180 ngày kể từ ngày xuất voucher.</p>
                    </td>
                    <td>
                        <span>E-Mail thành viên:</span><br><br>
                        <input type="email" name="email" class="ipTag"><br><br>
                        <span>Mật Khẩu:</span><br><br>
                        <input type="password" name="passWord" class="ipTag"><br><br>
                        <a href="#">Quên mật khẩu</a><br><br>
                        <input type="submit" id="submit" value="ĐĂNG NHẬP">
                    </td>
                </tr>
            </table>
        </form>
        <?php 
             $host="localhost";
             $user="root";
             $pass="12345678";
             $database="dichvuhangkhong";
             $connect=new mysqli($host,$user,$pass,$database);
             $sql="select * from khachhang ";
             if(isset($_POST['email']) && isset($_POST['passWord'])){
                 $email=$_POST['email'];
                 $pass=$_POST['passWord'];
                if($email!='' && $pass!=''){
                    $r=mysqli_query($connect,$sql);
                    while($row=mysqli_fetch_assoc($r)){
                        if($row['email']==$email && $row['matKhau']!=$pass){
                            echo("<script>alert('Sai mật khẩu !');</script>");
                        }
                        else if($row['email']==$email && $row['matKhau']==$pass){
                            echo("<script>alert('Đăng nhập thành công !');</script>");
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