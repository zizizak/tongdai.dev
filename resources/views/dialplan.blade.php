<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Khai báo Dial Phan</title>
    <!-- <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'> -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>

<body id="body">
    @include('ipu')
    {{-- @include('mainMenu') --}}
    <h2>khai báo Dial Plan</h2>
    <div id="wrapper">
        <div class="container">
            <div class="row"></div>
        </div>
         <form action="dialplan.blade.php" method="post">
        Name: <input type="text" name="fname" />
        Age: <input type="text" name="age" />
        <input type="submit" />
    </form>
    </div>
    <div class="lich">
        <div id="days"></div>
        <div id="dates"></div>
        <div id="times"></div>
  </div>

  <style>
  .lich{
  padding:20px;
  background:#f1f1f1;
  border-radius:10px;
  font-size:30px;
  border:2px solid #999;
  }
  </style>

  <script>
  window.onload = setInterval(clock,1000);
  function clock()
  {
  var d = new Date();
  var date = d.getDate();
  var month = d.getMonth();
  var montharr =["Tháng 1","Tháng 2","tháng 3","Tháng 4","Tháng 5","Tháng 6","Tháng 7","Tháng 8","Tháng 9","Tháng 10","tháng 11","Tháng 12"];
  month=montharr[month];
  var year = d.getFullYear();
  var day = d.getDay();
  var dayarr =["Chủ Nhật","Thứ 2","Thứ 3","Thứ 4","Thứ 5","Thứ 6","Thứ 7"];
  day=dayarr[day];
  var hour =d.getHours();
  var min = d.getMinutes();
  var sec = d.getSeconds();
  document.getElementById("days").innerHTML=day;
  document.getElementById("dates").innerHTML=date+" "+month+" "+year;
  document.getElementById("times").innerHTML=hour+":"+min+":"+sec;
  }
  </script>
</body>

</html>
