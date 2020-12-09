<html>
    <header></header>
    <style>
        table{
            margin: 0 auto;
            width: 100%;
            font-size: 16px;
        }
        #logOut{
            color:lavenderblush;
            font-weight: 700;
        }
        h3{
            font-size: 24px;
            color: blue;
        }
        td{
            padding: 10px;
        }
        a{
            color: blue;
            font-size: 20px;
            text-decoration: none;
        }
        #head{
            font-size: 24px;
            color: orangered;
            font-weight: 700;

        }
        #com tr td{
            background-color:lightblue;
            color: #777777;
        }
        #com tr th{
            background-color:lightseagreen;
            color:#777777;
            font-size: 16px;
            padding: 10px;
        }
        .floatLeft{
            float:left;
            width:80%;
        }
        .floatRight{
            width:20%;
            float:left;
            text-align:center;
        }
        .navPortal{
            background-color: blue; 
            padding-top: 10px ;
            padding-bottom: 30px;
            border-radius: 20px 20px;
            width: 100%;
            margin-top: 10px;
            color: white;
        }
        .navPortal a{
            color:white;
        }
        .navPortal a:hover{
            color: orangered;
            font-weight: 700;
        }
        input{
            padding: 10px;
            border: 1px solid gray;
            border-radius: 5px 5px;
            width: 100%;
        }
        .btnControl{
            background-color:green;
            color: white;
            font-weight: 700;
            font-size: 15px;
        }
        .btnControl:hover{
            background-color:blue;
        }
        #com{
            width: 100%;
            padding: 20px;
        }
    </style>
    <body>
    <div class="floatLeft">
        <div style="width:100%">
            <div class="floatLeft">
                <h3 style="text-align:center;color:blue">Danh sách chuyến bay sắp khởi hành:</h3>
            </div>
            <div class="floatRight">
                <h3 id="clock"></h3>
            </div>
        </div>
        
        <table id="com">
            <tr>
                <th>Mã chuyến bay</th>
                <th>Điểm đi</th>
                <th>Điểm đến</th>
                <th>Ngày đi</th>
                <th>Ngày về</th>
                <th>Vé L1<br><i>(còn lại)</i> </th>
                <th>Vé L2<br><i>(còn lại)</i></th>
                <th>Giờ cất cánh</th>
            </tr>
            <?php 
                listItemChuyenBay();
            ?>
        </table>
    </div>
    <div class="floatRight">
        <div class="navPortal">
            <h3><a href="http://localhost/BigProject/PortalManager.php" id="head">Portal Manager</a></h3>
            <a href="http://localhost/BigProject/DuongBay.php">Quản lý đường Bay</a><br><br>
            <a href="http://localhost/BigProject/MayBay.php">Quản lý máy Bay</a><br><br>
            <a href="http://localhost/BigProject/ChuyenBay.php">Quản lý chuyến Bay</a><br><br>
            <a href="http://localhost/BigProject/QuanLyKhachHang.php">Quản lý Khách Hàng</a><br><br>
            <a href="http://localhost/BigProject/ThongTinChiTietVeDat.php">Quản lý vé máy bay</a><br><br>
            <a href="http://localhost/BigProject/ThongKeVaTimKiem.php">Thống kê và tìm kiếm</a><br><br>
            <a href="http://localhost/BigProject/DangNhapAdmin.php">Thoát</a>
        </div>
    </div>
    <script>
        oclock();
        function oclock() {
            setInterval(function() {
                document.getElementById('clock').textContent=getTime();
            
            }, 1000);
        }
        function getTime() {
            var date = new Date(); 
            var hour = date.getHours(); 
            var minutes = date.getMinutes(); 
            var second = date.getSeconds(); 
            return (hour <= 12 ? hour : hour - 12) + ':' + 
                (minutes < 10 ? '0' + minutes : minutes) + ':' +
                (second < 10 ? '0' + second : second) +" "+
                (hour <= 12 ? 'AM' : 'PM'); 
        }
    </script>
    <?php
        function listItemChuyenBay(){
            $connect=new mysqli("localhost","root","12345678","quanlyhethongvemaybay");
            $sqlSelect="select * from CHUYENBAY";
            $r=mysqli_query($connect,$sqlSelect);
            $count=mysqli_fetch_row($r);
            $row=mysqli_fetch_assoc($r);

            // sortDay($count,$row);
            // sortTime($count,$row);
            // while($row){
            //     getData($row);
            // }
            mysqli_close($connect);
        }
        function sortDay($count,$row){
            for($i=0;$i<$count;$i++){
                for($j=$i+1;$j<$count;$j++){
                    if($row[$i]['NgayDi']>$row[$j]['NgayDi']){
                        $a=$row[$i];
                        $row[$i]=$row[$j];
                        $row[$j]=$a;
                    }
                }
            }
        }
        function sortTime($count,$row){
            for($i=0;$i<$count;$i++){
                for($j=$i+1;$j<$count;$j++){
                    if($row[$i]['GioCatCanh']>$row[$j]['GioCatCanh']){
                        $a=$row[$i];
                        $row[$i]=$row[$j];
                        $row[$j]=$a;
                    }
                }
            }
        }
        function getData($row){
        }
    ?>
    </body>
</html>