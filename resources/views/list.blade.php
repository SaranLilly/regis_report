<link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/@mdi/font@6.x/css/materialdesignicons.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/vuetify@2.x/dist/vuetify.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, minimal-ui">

<style>
</style>

<div class="container" id="app" style="margin-top:40px;">
  <template>
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
          <v-btn-toggle
            v-model="item.text"
            color="deep-purple accent-3"
            rounded="0"
            group
          >
          <v-btn value="center" color="blue">Center</v-btn>
          <v-btn value="right" color="green">Right</v-btn>

          </v-btn-toggle>
        </template>
      </v-data-table>
    </v-card>
  </template>
</div>


<script src="https://cdn.jsdelivr.net/npm/vue@2.x/dist/vue.js"></script>
<script src="https://cdn.jsdelivr.net/npm/vuetify@2.x/dist/vuetify.js"></script>
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
    data: () => {	// ประกาศตัวแปล
        return {
            text: 'center',
            icon: 'justify',
            toggle_none: null,
            toggle_one: 0,
            toggle_exclusive: 2,
            toggle_multiple: [0, 1, 2],
          search: '',
          headers: [
          {
            text: 'ลำดับ',
            align: 'start',
            sortable: false,
            value: 'number',
          },
          { text: 'วันที่-เวลา', value: 'datetime' },
          { text: 'ชื่อ-นามสกุล', value: 'name' },
          { text: 'เบอร์', value: 'tel' },
          { text: 'อีเมล', value: 'email' },
          { text: 'สถานะ', value: 'status' },
          { text: 'ตรวจสอบ', value: 'check' },
        ],
        list: [
          {
            number: '1',
            datetime: '16/12/2567 16:00:00',
            name: 'นาย บวย',
            tel: '0928651233',
            email: 'testxxx@gmail.com',
            status: 'รอดำเนินการ',
            text: ''
          },
          {
            number: '2',
            datetime: '16/12/2567 16:00:00',
            name: 'นาย รวย',
            tel: '0828757273',
            email: 'testxxx@gmail.com',
            status: 'รอดำเนินการ',
          },
          {
            number: '3',
            datetime: '16/12/2567 16:00:00',
            name: 'นาย รวย',
            tel: '0828757273',
            email: 'testxxx@gmail.com',
            status: 'รอดำเนินการ',
          },
          {
            number: '4',
            datetime: '16/12/2567 16:00:00',
            name: 'นาย รวย',
            tel: '0828757273',
            email: 'testxxx@gmail.com',
            status: 'รอดำเนินการ',
          },
        ],
        }
    }
})
</script>
    
