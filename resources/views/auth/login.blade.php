<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - ATMP APP</title>
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('backend/images/logo/logo.png')}}">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('backend/css/bootstrap.cs')}}s">
    <link rel="stylesheet" href="{{asset('backend/vendors/bootstrap-icons/bootstrap-icons.css')}}">
    <link rel="stylesheet" href="{{asset('backend/css/app.css')}}">
    <link rel="stylesheet" href="{{asset('backend/css/pages/auth.css')}}">
</head>

<body>
    <div id="auth">

        <div class="row h-100">
            <div class="col-lg-5 col-12">
                <div id="auth-left">
                    <div class="auth-logo">
                        <img src="{{asset('backend/images/logo/logo.png')}}" alt="Logo">
                    </div>
                    <h1 class="auth-title">Login.</h1>

                    <form action="{{route('post-login')}}" method="POST" enctype="multipart/form-data" autocomplete="off">
                        @method('patch')
                        @csrf
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="text" name="nik" id="nik" class="form-control form-control-xl" placeholder="NIK Anda">
                            <div class="form-control-icon">
                                <i class="bi bi-person"></i>
                            </div>
                        </div>
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="password" name="password"  id="password" class="form-control form-control-xl" placeholder="Password">
                            <div class="form-control-icon">
                                <i class="bi bi-shield-lock"></i>
                            </div>
                        </div>
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="password" name="confirm_password" id="confirm_password" class="form-control form-control-xl" placeholder="Confirm Password">
                            <div class="form-control-icon">
                                <i class="bi bi-shield-lock-fill"></i>
                            </div>
                        </div>
                        <div class="form-group position-relative has-icon-left mb-4">
                            <span class="text-center" id='message'></span>
                            @if(\Session::has('alert'))
                                <div class="alert alert-danger" id="warning">
                                    <div>{{Session::get('alert')}}</div>
                                </div>
                            @endif
                            @if(\Session::has('success'))
                                <div class="alert alert-success" id="success">
                                    <div>{{Session::get('success')}}</div>
                                </div>
                            @endif
                        </div>
                        <button type="submit" id="btn-submit" class="btn btn-primary btn-block btn-lg shadow-lg mt-5" disabled>Log in</button>
                    </form>
                </div>
            </div>
            <div class="col-lg-7 d-none d-lg-block">
                <div id="auth-right">

                </div>
            </div>
        </div>
    </div>
</body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script type="text/Javascript">
    // Value Input
    $('#nik, #password').on('keyup', function(){
        let nik = $('#nik').val();
        let pass = $('#password').val();

        if(nik === '' && pass === ''){
            $('#btn-submit').attr('disabled', true);
        }else{
            $('#btn-submit').attr('disabled', false);
        }
    });

    //Password Change Validation
    $('#password, #confirm_password').on('keyup', function () {
        let pass = $('#password').val();
        let confirm_pass = $('#confirm_password').val();

        if (pass == confirm_pass) {
            if(pass === '' && confirm_pass == ''){
                $('#message').html('').css('color', 'green');
            }else{
                $('#message').html('Matching').css('color', 'green');
                $('#btn-submit').attr('disabled', false);
            }
        } else {
            $('#message').html('Not Matching').css('color', 'red');
            $('#btn-submit').attr('disabled', true);
        }
    });

    setTimeout(() => {
        $('#warning').remove();
    }, 5000);

    setTimeout(() => {
        $('#success').remove();
    }, 2000);
</script>

</html>