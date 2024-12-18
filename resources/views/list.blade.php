<link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/@mdi/font@6.x/css/materialdesignicons.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/vuetify@2.x/dist/vuetify.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, minimal-ui">

<style>
</style>

<div class="container" id="app" style="margin-top:40px;">
  <template>
  <form method="POST" action="/register/update-status">
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
            <span v-else></span> <!-- กรณีไม่แสดงปุ่ม เมื่อกดเลือก Confirm หรือ Decline และเพิ่มปุ่มกดบันทึกข้างล่างตาราง จะให้ update สถานะใน db ถ้า Confirm เปลี่ยนเป็น ลงทะเบียนสำเร็จ แต่ถ้า Decline ให้เปลี่ยนเป็น ยกเลิกการลงทะเบียน -->
            <input type="hidden" :name="'status[' + item.number + ']'" :value="item.text" />
          </template>
      </v-data-table>
    </v-card>
    <!-- ปุ่มบันทึก -->
    <v-card-actions>
      <v-spacer></v-spacer>
      <button type="submit" class="btn btn-primary">บันทึก</button>
    </v-card-actions>
    </v-card>
      {{ csrf_field() }}
    </form>

  </template>
</div>


<script src="https://cdn.jsdelivr.net/npm/vue@2.x/dist/vue.js"></script>
<script src="https://cdn.jsdelivr.net/npm/vuetify@2.x/dist/vuetify.js"></script>

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
        list: @json($registers) // ส่งข้อมูล PHP -> Vue.js
        }
    }
})
</script>
    
