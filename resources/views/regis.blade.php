<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Register</title>
</head>
<body>
    test
    <template>
        <v-sheet class="mx-auto" width="300">
          <v-form fast-fail @submit.prevent>
            <v-text-field
              v-model="firstName"
              :rules="firstNameRules"
              label="First name"
            ></v-text-field>
      
            <v-text-field
              v-model="lastName"
              :rules="lastNameRules"
              label="Last name"
            ></v-text-field>
      
            <v-btn class="mt-2" type="submit" block>Submit</v-btn>
          </v-form>
        </v-sheet>
      </template>
      <script>
        export default {
          data: () => ({
            firstName: '',
            firstNameRules: [
              value => {
                if (value?.length >= 3) return true
      
                return 'First name must be at least 3 characters.'
              },
            ],
            lastName: '123',
            lastNameRules: [
              value => {
                if (/[^0-9]/.test(value)) return true
      
                return 'Last name can not contain digits.'
              },
            ],
          }),
        }
      </script>
    
</body>
</html>