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
            
            width: 60%;
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
            font-size: 20px;
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
    </style>
    <body>
        <form action="http://localhost/wordpress/dang-ki/" method="POST">
            <table>
                <tr>
                    <td colspan="2"><h3>1. Thông tin cá nhân</h3></td>
                </tr>
                <tr>
                    <td style="width:30%">Tên: </td>
                    <td><input type="text" name="Ten" style="padding: 10px;" ></td>
                </tr>
                <tr>
                    <td> Họ và chữ lót:</td>
                    <td><input type="text" name="Ho" style="padding: 10px;" ></td>
                </tr>
                <tr>
                    <td> E-Mail:</td>
                    <td><input type="email" name="email" style="padding: 10px;" ></td>
                </tr>
                <tr>
                    <td> Điện Thoại:</td>
                    <td><input type="number" name="dienThoai" style="padding: 10px;" ></td>
                </tr>
                <tr>
                    <td colspan="2"><h3>2. Địa chỉ</h3></td>
                </tr>
                <tr>
                    <td> Địa chỉ:</td>
                    <td><input type="text" name="diaChi" style="padding: 10px;" ></td>
                </tr>
                <tr>
                    <td> Địa chỉ liên hệ:</td>
                    <td><input type="text" name="dcLienHe" style="padding: 10px;" ></td>
                </tr>
                <tr>
                    <td> Thành Phố:</td>
                    <td>
                        <select name="ThanhPho" style="padding: 5px;" >
                            <option>Hà Nội</option>
                            <option>Đà Nẵng</option>
                            <option>Cần Thơ</option>
                            <option>Huế</option>
                            <option>TP.HCM</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Quốc Gia:</td>
                    <td>
                        <select name="QuocGia" style="padding: 5px;" >
                            <option>Viet Nam</option>
                            <option>China</option>
                            <option>UK</option>
                            <option>USA</option>
                            <option>Korea</option>
                        </select> 
                    </td>
                </tr>
                <tr>
                    <td colspan="2"><h3>3. Mật Khẩu</h3></td>
                </tr>
                <tr>
                    <td>Mật Khẩu:</td>
                    <td><input type="password" style="padding: 10px;"  name="passWord"></td>
                </tr>
                <tr>
                    <td>Nhập lại Mật Khẩu:</td>
                    <td><input type="password" style="padding: 10px;"  name="passWord2"></td>
                </tr>
                <tr>
                    <td colspan="2" style="text-align:center;"><input type="submit" value="Tiếp tục" id="submit"></td>
                </tr>
            </table>
        </form>
        <?php 
            $tenKH=isset($_POST['Ten'])?$_POST['Ten']:'';
            $hoKH=isset($_POST['Ho'])?$_POST['Ho']:'';
            $email=isset($_POST['email'])?$_POST['email']:'';
            $dienThoai=isset($_POST['dienThoai'])?$_POST['dienThoai']:'';
            $diaChi=isset($_POST['diaChi'])?$_POST['diaChi']:'';
            $dcLienHe=isset($_POST['dcLienHe'])?$_POST['dcLienHe']:'';
            $ThanhPho=isset($_POST['ThanhPho'])?$_POST['ThanhPho']:'';
            $QuocGia=isset($_POST['QuocGia'])?$_POST['QuocGia']:'';
            $passWord=isset($_POST['passWord'])?$_POST['passWord']:'';
            $passWord2=isset($_POST['passWord2'])?$_POST['passWord2']:'';
            if(isset($_POST['Ten'])){
                if($tenKH==''||$hoKH==''||$email==''||$dienThoai==''||$diaChi==''||$dcLienHe==''||$ThanhPho==''||$QuocGia==''||$passWord==''||$passWord2==''){
                    echo("<script>alert('Mời bạn nhập đầy đủ thông tin !');</script>");
                }
                else if($passWord!=$passWord2){
                    echo("<script>alert('Mật khẩu không trùng khớp !');</script>");
                }
                else{
                    $host="localhost";
                    $user="root";
                    $pass="12345678";
                    $database="dichvuhangkhong";
                    $connect=new mysqli($host,$user,$pass,$database);
                    $sql="insert into khachhang values('$tenKH','$hoKH','$email','$dienThoai','$diaChi','$dcLienHe','$ThanhPho','$QuocGia','$passWord')";
                    mysqli_query($connect,$sql);
                    mysqli_close($connect);
                    echo("<script>alert('Thêm mới thành công !');</script>");
                }
            }

        ?>
    </body>
</html>