<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>   
    
    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.14/dist/vue.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue@2"></script>

    <title>Register</title>
</head>
<body>
    <div class="form_input_test">
    {{-- <div class="title">Hello {{{ $name or '' }}}</div> --}}
    <form id="testregis" action="/regis_form" method="POST">
        @csrf

    <div class="container" style="width: 800px; margin-top: 70px">
    <div class="text_head" style="text-align: center" >
       <h1> ลงทะเบียนร่วมกิจกรรมปีใหม่ </h1>  
    </div>
    <div class="form_input">

    
        <div class="mb-3">
            <label for="exampleInputname" class="form-label">ชื่อ-นามสกุล</label>
            <input type="name" name="register_name" class="form-control" id="exampleInputname" >
          </div>


          <div class="mb-3">
            <label for="exampleInputtel" class="form-label">เบอร์โทรศัพท์</label>
            <input type="tel" name="register_tel" class="form-control" id="exampleInputtel" >
          </div> 

        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">อีเมล</label>
          <input type="email" name="register_mail" class="form-control" id="exampleInputEmail1" >
        </div>

        <div class="subminButton" style="Align=left" >
            <p Align=right>
             <button type="submit" class="btn btn-primary" >ลงทะเบียน</button>
            </P>
        </div>
       
      </form>
    </div>
</div>

</div>
</body>
</html>