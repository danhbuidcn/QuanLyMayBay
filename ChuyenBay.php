<html>
    <header></header>
    <style>
        form{
            margin: 0 auto;
            width: 100%;
        }
        table{
            margin: 0 auto;
            width: 100%;
            font-size: 18px;
            color: blue;
        }
        input{
            padding: 10px;
        }
        h3{
            font-size: 24px;
            color: blue;
        }
        td{
            padding: 10px;
        }
        select{
            padding: 5px;
        }
        #subTable{
            margin: 0;
            padding: 0;
            text-align: left;
        }
        input{
            width: 100%;
            border-radius: 5px 5px;
            border: 1px solid gray;
        }
        #submit{
            width: 50%;
            margin: 0 25%;
            background-color:orangered;
            border-radius: 5px 5px;
            color: white;
        }
        #submit:hover{
            background-color: blue;
        }
        a{
            color: blue;
            font-size: 20px;
            text-decoration: none;
        }
        #head{
            font-size: 24px;
            color: blue;
        }
        #com tr td{
            background-color:lightblue;
            color: white;
        }
        #com tr th{
            background-color:blue;
            color: white;
        }
    </style>
    <body>
        <div style="float:left;width:80%;">
        <form action="http://localhost/wordpress/chuyen-bay/" method="post">
            <table>
                <tr>
                    <td colspan="3"><h3>Tạo Chuyến Bay:</h3></td>
                </tr>
                <tr>
                    <td>
                        <p>Số hành khách tối đa:</p>
                        <select name="soHangKhach">
                            <option>50</option>
                            <option>100</option>
                            <option>150</option>
                        </select>
                        <p>Khuyến mãi :</p>
                        <select name="khuyenMai">
                            <option>0%</option>
                            <option>5%</option>
                            <option>10%</option>
                            <option>15%</option>
                        </select>
                        <p>Loại vé:</p>
                        <select name="loaiVe">
                            <option>Một chiều</option>
                            <option>Thứ hồi</option>
                        </select>
                    </td>
                    <td>
                        <p>Mã máy bay:</p>
                        <input type="text" name="maMayBay"><br>
                        <p>Điểm đi</p>
                        <input type="text" name="diemDi"><br>
                        <p>Điểm đến</p>
                        <input type="text" name="diemDen"><br>
                    </td>
                    <td>
                        <p>Ngày đi</p>
                        <input type="date" name="ngayDi"><br>
                        <p>Ngày về</p>
                        <input type="date" name="ngayVe"><br><br><br>
                        <input type="submit" value="Tạo mới" id="submit">
                    </td>
                </tr>
            </table>
        </form>
        <?php 
        $connect=new mysqli("localhost","root","12345678","dichvuhangkhong");
        if(isset($_POST['maMayBay'])){
            $maMayBay=isset($_POST['maMayBay'])?$_POST['maMayBay']:'';
            $diemDi=isset($_POST['diemDi'])?$_POST['diemDi']:'';
            $diemDen=isset($_POST['diemDen'])?$_POST['diemDen']:'';
            $ngayDi=isset($_POST['ngayDi'])?$_POST['ngayDi']:'';
            $ngayVe=isset($_POST['ngayVe'])?$_POST['ngayVe']:'';
            $soHangKhach=isset($_POST['soHangKhach'])?$_POST['soHangKhach']:'';
            $khuyenMai=isset($_POST['khuyenMai'])?$_POST['khuyenMai']:'';
            $loaiVe=isset($_POST['loaiVe'])?$_POST['loaiVe']:'';
            if($ngayVe<$ngayDi){
                echo("<script>alert('Mời bạn nhập lại ngày đi và về !');</script>");
            }
            else if($maMayBay!=''||$diemDi!=''||$diemDen!=''||$ngayDi!=''||$ngayVe!=''){
                
                $sql="insert into chuyenbay values('$soHangKhach','$khuyenMai','$loaiVe','$maMayBay','$diemDen','$diemDi','$ngayDi','$ngayVe','0')";
                $R=mysqli_query($connect,$sql);
                mysqli_close($connect);
                echo("<script>alert('Thêm chuyến bay thành công !');</script>");
            }
            else{
                echo("<script>alert('Bạn chưa nhập đầy đủ thông tin !');</script>");
            }
        }
    ?>
    <hr>
    <table id="com">
        <tr>
            <th>Mã máy bay</th>
            <th>Số hàng khách</th>
            <th>khuyến mãi</th>
            <th>loại vé</th>
            <th>Điểm đi</th>
            <th>Điểm đến</th>
            <th>Ngày đi</th>
            <th>Ngày về</th>
            <th>hàng khách hiện tại</th>
        </tr>
        <?php 
        $connect=new mysqli("localhost","root","12345678","dichvuhangkhong");
            $sqlSelect="select * from chuyenbay";
            $r=mysqli_query($connect,$sqlSelect);
            while($row=mysqli_fetch_assoc($r)){
                
                $maMayBay=$row['maMayBay'];
                $diemDi=$row['diemDi'];
                $diemDen=$row['diemDen'];
                $ngayDi=$row['ngayDi'];
                $ngayVe=$row['ngayVe'];
                $soHangKhach=$row['soHangKhach'];
                $khuyenMai=$row['khuyenMai'];
                $loaiVe=$row['loaiVe'];
                $hangKhachHienTai=$row['hangKhachHienTai'];
        ?>
        <tr>
            <td><?php echo $maMayBay;?></td>
            <td><?php echo $soHangKhach;?></td>
            <td><?php echo $khuyenMai;?></td>
            <td><?php echo $loaiVe;?></td>
            <td><?php echo $diemDi;?></td>
            <td><?php echo $diemDen;?></td>
            <td><?php echo $ngayDi;?></td>
            <td><?php echo $ngayVe;?></td>
            <td><?php echo $hangKhachHienTai;?></td>
        </tr>
        <?php
            }
            mysqli_close($connect);
        ?>
    </table>
    </div>
    <div style="width:20%;float:right;text-align:center">
        <h3><a href="http://localhost/wordpress/portal-manager/" id="head">Portal Manager</a></h3>
        <a href="http://localhost/wordpress/chuyen-bay/">>> Chuyến Bay</a><br><br>
        <a href="http://localhost/wordpress/hang-khach/">>> Hành Khách</a><br><br>
        <a href="http://localhost/wordpress/khach-hang/">>> Khách Hàng</a><br>
    </div>
    </body>
</html>