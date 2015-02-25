<!DOCTYPE html>
<html lang="en">
<head>
<title>Halaman Login</title>
{{ HTML::style('assets/css/bootstrap.min.css') }}
{{ HTML::style('assets/css/sb-admin.css') }}
{{ HTML::style('assets/font-awesome/css/font-awesome.min.css') }}
</head>
<body>
    <div class="row">
        <div class="col-lg-4 text-center">
        </div>
        <div class="col-lg-4 text-center">
            <div class="panel panel-default">
                <div class="panel-body">
                    {{ Form::open(array('url' => 'login')) }}
                    <h1>Login</h1>
                    <p>
                        {{ $errors->first('email') }}
                        {{ $errors->first('password') }}
                    </p>
                    <p>
                        {{ Form::label('email', 'Email') }}
                        {{ Form::text('email', Input::old('email'), array('class' => 'form-control','placeholder'=>'Masukkan Email')) }}
                    </p>
                    <p>
                        {{ Form::label('password', 'Password') }}
                        {{ Form::password('password', array('class' => 'form-control','placeholder'=>'Masukkan Password')) }}
                    </p>
                    <p>{{ Form::submit('Login', array('class' => 'form-control')) }}</p>
                {{ Form::close() }
                </div>
            </div>
        </div>
        <div class="col-lg-4 text-center">
        </div>
</div>
</body>
</html>