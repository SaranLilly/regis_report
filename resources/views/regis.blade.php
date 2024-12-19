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
            <input placeholder="กรอกเบอร์โทรศัพท์ให้ครบ 10 หลัก"  pattern="[0-9]{10}"  type="number" maxlength="10" name="register_tel" class="form-control" id="exampleInputtel" required>
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

        {{-- Register Form submit --}}
        {{-- <div class="subminButton" style="Align=left" >
            <p Align=right>
             <button type="submit" class="btn btn-primary" >ลงทะเบียน</button>
            </P>
        </div> --}}
        <v-card-actions>
          <v-spacer></v-spacer>
          <button type="button" @click="confirmSubmit" class="btn btn-primary">ลงทะเบียน</button>
    
        </v-card-actions>
      </form>
    </div>
</div>

</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
  
  // สร้าง Vue instance พร้อม Vuetify
  new Vue({
      el: '#app',
      vuetify: new Vuetify(),

  methods: {
    confirmSubmit() {
      Swal.fire({
        title: "ต้องการทำการบันทึกหรือไม่?",
        showDenyButton: true,
        confirmButtonText: "<span style='color: white;'>บันทึก</span>",
        denyButtonText: "<span style='color: white;'>ยกเลิก</span>",
      }).then((result) => {
        if (result.isConfirmed) {
          // Swal.fire("Saved!", "", "success");
          // document.getElementById("registerForm").submit(); // ส่งฟอร์ม
          
          const formData = new FormData(document.getElementById("testregis"));

          axios.post('/regis_form', formData)
          .then(response => {
            if(response.data.errors){
              Swal.fire("บันทึกไม่สำเร็จจ้า!", response.data.message || "บันทึกไม่สำเร็จ", "error");
            } else{
              Swal.fire("บันทึก!", response.data.message || "บันทึกสำเร็จ", "success");
              this.list = response.data.updatedRegisters || this.list;//update สถานะตารางใหม่จาก response
            }

           
          })
          .catch(error => {
            Swal.fire("ผิดพลาด!", error.response.data.message || "บันทึกไม่สำเร็จ", "error");
          });

        } else if (result.isDenied) {

        }
      });
    }
  }
  });
</script>

</body>
</html>