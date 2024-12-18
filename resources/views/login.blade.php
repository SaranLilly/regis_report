<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
 
    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.14/dist/vue.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue@2"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue@2.x/dist/vue.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vuetify@2.x/dist/vuetify.js"></script>
    <title>Login</title>
</head>
<body>
    <div class="form_input_test">
    <form id="testregis" action="/login" method="POST">
        @csrf

    <div class="container" style="width: 800px; margin-top: 70px">
    <div class="text_head" style="text-align: center" >
       <h1> เข้าสู่ระบบ </h1>  
    </div>
    
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <div class="form_input">

        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">อีเมล</label>
          <input type="email" name="email" class="form-control" id="exampleInputEmail1" value="{{ old('email') }}">
        </div>

        <div class="mb-3">
            <label for="exampleInputpassword" class="form-label">รหัสผ่าน</label>
            <input type="password" name="password" class="form-control" id="exampleInputpassword">
        </div>
    
        <div class="subminButton" style="text-align: right">
            <button type="submit" class="btn btn-primary">เข้าสู่ระบบ</button>
        </div>
       
      </form>
    </div>
</div>

</div>
</body>
</html>
