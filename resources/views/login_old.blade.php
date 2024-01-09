<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->
</head>
<body>
     <style>
        .login-container{
    margin-top: 5%;
    margin-bottom: 5%;
}
.login-form-1{
    padding: 5%;
    box-shadow: 0 5px 8px 0 rgba(0, 0, 0, 0.2), 0 9px 26px 0 rgba(0, 0, 0, 0.19);
}
.login-form-1 h3{
    text-align: center;
    color: #333;
}
.login-form-2{
    padding: 5%;
    background: #2c3e50;
    box-shadow: 0 5px 8px 0 rgba(0, 0, 0, 0.2), 0 9px 26px 0 rgba(0, 0, 0, 0.19);
}
.login-form-2 h3{
    text-align: center;
    color: #fff;
}
.login-container form{
    padding: 10%;
}
.btnSubmit
{
    width: 50%;
    border-radius: 1rem;
    padding: 1.5%;
    border: none;
    cursor: pointer;
}
.login-form-1 .btnSubmit{
    font-weight: 600;
    color: #fff;
    background-color: #0062cc;
}
.login-form-2 .btnSubmit{
    font-weight: 600;
    color: #0062cc;
    background-color: #fff;
}
.login-form-2 .ForgetPwd{
    color: #fff;
    font-weight: 600;
    text-decoration: none;
}
.login-form-1 .ForgetPwd{
    color: #0062cc;
    font-weight: 600;
    text-decoration: none;
}

    </style>
    <div class="container login-container">
                <div class="row justify-content-md-center">
                    <div class="col-md-6 login-form-2">
                        <h3>Locadora Login</h3>
                        <form action="{{route('login')}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <input type="text" name = "email" class="form-control" placeholder="Seu Email *" value="@if(isset($email)) {{$email}} @else {{old('email')}}@endif" />
                                <div style="color: #fff">{{$errors->has('email')?$errors->first('email') : ''}}</div>
                            </div>
                            <div class="form-group">
                                <input type="password" name = "password" class="form-control" placeholder="Sua Senha *" value="{{old('password')}}" />
                                <div style="color: #fff">
                                    {{$errors->has('password')?$errors->first('password') : ''}}
                                    @if(isset($message)){{$message[0]}}@endif
                                    
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btnSubmit" value="Login" />
                            </div>
                        </form>
                    </div>
                </div>
            </div>  
</body>
</html>