<link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/@mdi/font@6.x/css/materialdesignicons.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/vuetify@2.x/dist/vuetify.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, minimal-ui">
  <meta name="csrf-token" content="{{ csrf_token() }}">


<style>
</style>

<div class="container" id="app" style="margin-top:40px;">
  <template>
  <form id="registerForm" method="POST" action="/register/update-status">
    <v-card>
      <v-card-title>
          รายการการลงทะเบียน
        <v-spacer></v-spacer>
        <v-text-field
          v-model="search"
          append-icon="mdi-magnify"
          label="Search"
          single-line
          hide-details
        ></v-text-field>
      </v-card-title>
      <v-data-table
        :headers="headers"
        :items="list"
        :search="search"
        item-value="number"
      >
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

  

</div>


<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/vue@2.x/dist/vue.js"></script>
<script src="https://cdn.jsdelivr.net/npm/vuetify@2.x/dist/vuetify.js"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

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
    search: '',
    headers: [
      { text: 'ลำดับ', align: 'start', sortable: false, value: 'number' },
      { text: 'วันที่-เวลา', value: 'datetime' },
      { text: 'ชื่อ-นามสกุล', value: 'name' },
      { text: 'เบอร์', value: 'tel' },
      { text: 'อีเมล', value: 'email' },
      { text: 'สถานะ', value: 'status' },
      { text: 'ตรวจสอบ', value: 'check' },
    ],
    list: [], //
  }),
  // mounted() {
  //   // เพิ่ม CSRF Token ให้กับทุกคำขอ Axios
  //   axios.defaults.headers.common['X-CSRF-TOKEN'] = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
  // },
  mounted() {
    axios.defaults.headers.common['X-CSRF-TOKEN'] = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    this.fetchRegisters();
  },
  methods: {
    fetchRegisters() {
      axios.get('/getAllList')
        .then(response => {
          // console.log(response.data);
          this.list = response.data;
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
          // Swal.fire("Saved!", "", "success");
          // document.getElementById("registerForm").submit(); // ส่งฟอร์ม
          
          const formData = new FormData(document.getElementById("registerForm"));

          axios.post('/register/update-status', formData)
          .then(response => {

            Swal.fire("Saved!", response.data.message || "Changes have been saved.", "success");
            this.list = response.data.updatedRegisters || this.list;//update สถานะตารางใหม่จาก response
          })
          .catch(error => {
            Swal.fire("Error!", error.response.data.message || "Something went wrong.", "error");
          });

        } else if (result.isDenied) {

        }ห
      });
    }
  }
});
</script>
