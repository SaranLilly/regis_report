<link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/@mdi/font@6.x/css/materialdesignicons.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/vuetify@2.x/dist/vuetify.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, minimal-ui">
  <meta name="csrf-token" content="{{ csrf_token() }}">


<style>
</style>
<div class="container" id="app" style="margin-top:30px width:10px;">
  <template>
  <form id="registerForm" method="POST" action="/register/update-status">
    <v-card>
      <v-card-title>
          รายการการลงทะเบียน
        <v-spacer></v-spacer>
        
        
      <div style="margin-right:20px">
        <v-text-field
          v-model="search"
          append-icon="mdi-magnify"
          label="Search"
          single-line
          hide-details
        ></v-text-field>
      </div>
      
      <div class="dropdown" style="margin-top:11px">
        <button 
          class="btn btn-secondary dropdown-toggle"
          type="button"
          @click="toggleDropdown" 
          aria-expanded="false">
          filter <!-- ใช้ตัวแปร Vue.js ที่นี่ -->
        </button>
        <div 
          class="dropdown-menu" 
          v-if="dropdownOpen" 
          style="display: block;">
          <button 
            class="dropdown-item" 
            type="button"
            @click="filterStatus('ทั้งหมด')">
            ทั้งหมด
          </button>
          <button 
            class="dropdown-item" 
            type="button"
            @click="filterStatus('ลงทะเบียนสำเร็จ')">
            ลงทะเบียนสำเร็จ
          </button>
          <button 
            class="dropdown-item" 
            type="button"
            @click="filterStatus('ยกเลิกการลงทะเบียน')">
            ยกเลิกการลงทะเบียน
          </button>
          <button 
            class="dropdown-item" 
            type="button"
            @click="filterStatus('รอดำเนินการ')">
            รอดำเนินการ
          </button>
        </div>
      </div>



      </v-card-title>
      <v-data-table
        :headers="headers"
        :items="list"
        :search="search"
        item-value="number"
      >

      <template v-slot:item.image="{ item }">
        <div class="text-center" style="margin:10px">
          <img 
            :src="item.image" 
            alt="User Image" 
            width="100" 
            height="100" 
            v-if="item.image" 
            style="cursor: pointer;"
            @click="openImageModal(item.image)"
          />
          <span v-else>No Image</span> <!-- กรณีไม่มีรูป -->
        </div>
      </template>

        <template v-slot:item.check="{ item }">
        <template v-if="item.status !== 'ลงทะเบียนสำเร็จ' && item.status !== 'ยกเลิกการลงทะเบียน'">
          <v-btn-toggle
            v-model="item.text"
            color="deep-purple accent-3"
            rounded="0"
            group
          >
          <v-btn value="confirm" color="blue">Confirm</v-btn>
          <v-btn value="decline" color="green">Decline</v-btn>

          </v-btn-toggle>
          </template>
            <span v-else></span> <!-- กรณีไม่แสดงปุ่ม -->
            <input type="hidden" :name="'status[' + item.number + ']'" :value="item.text" />
          </template>
      </v-data-table>
    </v-card>
    <!-- ปุ่มบันทึก -->
    <v-card-actions>
      <v-spacer></v-spacer>
      <button type="button" @click="confirmSubmit" class="btn btn-primary">Save</button>

    </v-card-actions>
    </v-card>
      {{ csrf_field() }}
    </form>

  </template>
  <v-dialog v-model="dialog" max-width="500px">
  
  

</div>


<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/vue@2.x/dist/vue.js"></script>
<script src="https://cdn.jsdelivr.net/npm/vuetify@2.x/dist/vuetify.js"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.2.1/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9ScvIi1rtm7eFf/nJGzvnD3M8fXckl5K7UZO3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<!-- <script>
  export default {
    data () {
      return {
        text: 'center',
        icon: 'justify',
        toggle_none: null,
        toggle_one: 0,
        toggle_exclusive: 2,
        toggle_multiple: [0, 1, 2],
      }
    },
  }
</script> -->
<script>
var app = new Vue({
  el: '#app',
  vuetify: new Vuetify(),
  data: () => ({
    selectedStatus: 'Filter by Status',  // กำหนดค่าเริ่มต้น
    dropdownOpen: false,
    search: '',
    headers: [
      { text: 'ลำดับ', align: 'start', sortable: false, value: 'number' },
      { text: 'วันที่-เวลา', value: 'datetime' },
      { text: 'ชื่อ-นามสกุล', value: 'name' },
      { text: 'เบอร์', value: 'tel' },
      { text: 'อีเมล', value: 'email' },
      { text: 'สถานะ', value: 'status' },
      { text: 'รูปภาพ', value: 'image' },
      { text: 'ตรวจสอบ', value: 'check' },
    ],
    list: [],
    dialog: false,
    selectedImage: null,
  }),
  mounted() {
    axios.defaults.headers.common['X-CSRF-TOKEN'] = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    this.fetchRegisters();
  },
  methods: {
    toggleDropdown() {
    this.dropdownOpen = !this.dropdownOpen; // สลับสถานะเปิด/ปิด
    },
    filterStatus(status) {
      this.selectedStatus = status === 'ทั้งหมด' ? 'Filter by Status' : status; // อัปเดตข้อความ
      this.dropdownOpen = false; // ปิด dropdown หลังเลือก
      
      // ส่งค่า status ไปยัง backend เพื่อกรองข้อมูล
      axios.get('/getAllList', {
        params: {
          status: status // ส่งค่า status ไปใน query string
        }
      })
      .then(response => {
        const baseUrl = window.location.origin;
        this.list = response.data.map(item => {
          return {
            ...item,
            image: item.image ? `${baseUrl}/storage/${item.image}` : null
          };
        });
      })
      .catch(error => {
        console.error("Error fetching filtered registers:", error);
        Swal.fire("Error!", "Cannot fetch data at this moment.", "error");
      });
    },
    fetchRegisters() {
      axios.get('/getAllList')
      .then(response => {
        const baseUrl = window.location.origin;
        this.list = response.data.map(item => {
          return {
            ...item,
            image: item.image ? `${baseUrl}/storage/${item.image}` : null
          };
        });
      })
      .catch(error => {
        console.error("Error fetching registers:", error);
        Swal.fire("Error!", "Cannot fetch data at this moment.", "error");
      });
    },
    confirmSubmit() {
      Swal.fire({
        title: "Do you want to save the changes?",
        showDenyButton: true,
        confirmButtonText: "<span style='color: white;'>Save</span>",
        denyButtonText: "<span style='color: white;'>Cancel</span>",
      }).then((result) => {
        if (result.isConfirmed) {
          const formData = new FormData(document.getElementById("registerForm"));
          axios.post('/register/update-status', formData)
            .then(response => {
              Swal.fire("Saved!", response.data.message || "Changes have been saved.", "success")
              .then(() => {
                this.fetchRegisters();
              });
            })
            .catch(error => {
              Swal.fire("Error!", error.response.data.message || "Something went wrong.", "error");
            });
        }
      });
    }
  }
});
</script>

