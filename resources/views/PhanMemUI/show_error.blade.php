@php
    $message = "";
    if($error != "") {
    if($error == 'luu_cauhinh_0') {
        $message = "Cấu hình 0 không cho phép lưu.";
    }
@endphp

<div class="alert">
  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
  {{$message}}
</div>

@php
}
@endphp