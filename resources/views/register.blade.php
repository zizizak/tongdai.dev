@extends('voyager::auth.master')

@section('content')
    <div class="login-container">

       <h3>Đăng ký tài khoản</h3>

       <div style="clear:both"></div>

        @if(count($success) > 0)
            <div class="alert alert-success">
                <ul class="list-unstyled">
                    @foreach($success as $err)
                        <li>{{ $err }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if(count($errors) > 0)
            <div class="alert alert-red">
                <ul class="list-unstyled">
                    @foreach($errors as $err)
                        <li>{{ $err }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('register') }}" method="POST">
            {{ csrf_field() }}
            <div class="form-group form-group-default" id="emailGroup">
                <label>Email</label>
                <div class="controls">
                    <input type="text" name="email" id="email" value="" placeholder="" class="form-control" required>
                </div>
            </div>

            <div class="form-group form-group-default" id="passwordGroup">
                <label>Mật khẩu</label>
                <div class="controls">
                    <input type="password" name="password" placeholder="" class="form-control" required>
                </div>
            </div>

            <div class="form-group form-group-default" id="passwordGroup">
                <label>Xác nhận mật khẩu</label>
                <div class="controls">
                    <input type="password" name="confirmPassword" placeholder="" class="form-control" required>
                </div>
            </div>


            <button type="submit" class="btn btn-block login-button">
                <span class="signingin hidden"><span class="voyager-refresh"></span> Đang thực hiện...</span>
                <span class="signin">Đăng ký</span>
            </button>

            <a href="/admin/login" class="btn btn-block login-button" style="margin-left:20px;">
                Đăng nhập
            </a>

        </form>

        <div style="clear:both"></div>

    </div> <!-- .login-container -->
@endsection

@section('post_js')

    <script>
        var btn = document.querySelector('button[type="submit"]');
        var form = document.forms[0];
        var email = document.querySelector('[name="email"]');
        var password = document.querySelector('[name="password"]');
        btn.addEventListener('click', function(ev){
            if (form.checkValidity()) {
                btn.querySelector('.signingin').className = 'signingin';
                btn.querySelector('.signin').className = 'signin hidden';
            } else {
                ev.preventDefault();
            }
        });
        email.focus();
        document.getElementById('emailGroup').classList.add("focused");

        // Focus events for email and password fields
        email.addEventListener('focusin', function(e){
            document.getElementById('emailGroup').classList.add("focused");
        });
        email.addEventListener('focusout', function(e){
            document.getElementById('emailGroup').classList.remove("focused");
        });

        password.addEventListener('focusin', function(e){
            document.getElementById('passwordGroup').classList.add("focused");
        });
        password.addEventListener('focusout', function(e){
            document.getElementById('passwordGroup').classList.remove("focused");
        });

    </script>
@endsection
