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

    
    <!-- Vuetify CSS -->
    <link href="https://cdn.jsdelivr.net/npm/vuetify@2.6.14/dist/vuetify.min.css" rel="stylesheet">
    <!-- Vuetify JS -->
    <script src="https://cdn.jsdelivr.net/npm/vuetify@2.6.14/dist/vuetify.js"></script>
    

    <title>Register</title>
</head>
<body>
  <div id="app">
    <div class="form_input_test" >
    {{-- <div class="title">Hello {{{ $name or '' }}}</div> --}}
    <form id="testregis" action="/regis_form" method="POST" enctype="multipart/form-data">
        @csrf

    <div class="container" style="width: 800px; margin-top: 70px">
    <div class="text_head" style="text-align: center" >
       <h1> ลงทะเบียนร่วมกิจกรรมปีใหม่ </h1>  
    </div>
    <div class="form_input">

    
        <div class="mb-3">
            <label for="exampleInputname" class="form-label">ชื่อ-นามสกุล</label>
            <input type="name" name="register_name" class="form-control" id="exampleInputname" required >
          </div>


          <div class="mb-3">
            <label for="exampleInputtel" class="form-label">เบอร์โทรศัพท์</label>
            <input placeholder="กรอกเบอร์โทรศัพท์ให้ครบ 10 หลัก"  pattern="[0-9]{10}"  type="number " maxlength="10" name="register_tel" class="form-control" id="exampleInputtel" required>
          </div> 

        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">อีเมล</label>
          <input type="email" name="register_mail" class="form-control" id="exampleInputEmail1" required>
        </div>
        

        <div class="mb-3">
          <label for="exampleInputFile" class="form-label">ไฟล์</label>
          <input type="file" name="register_image" class="form-control" id="exampleInputFile" required>
        </div>


        {{-- <div id="app">
          <v-app>
            <v-container> --}}
              {{-- <v-file-input label="File input"></v-file-input> --}}
            {{-- </v-app>
          </v-container> --}}


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
</div>
<script>
  // สร้าง Vue instance พร้อม Vuetify
  new Vue({
      el: '#app',
      vuetify: new Vuetify(),
  });
</script>

</body>
</html>