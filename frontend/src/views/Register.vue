<template  >
  <v-app >
    <v-main v-if="loading">
      <v-container fluid fill-height>
        <v-layout align-center justify-center>
          <v-flex xs12 sm8 md4 lg3>
            <v-card class="elevation-12 grey lighten-4">
              <v-toolbar color="primary" dark fixed app>
                <v-toolbar-title>Registration</v-toolbar-title>
              </v-toolbar>
              <v-card-text>
                <v-form>
                 <c-input label="Full Name" :userName="userName" @change="changeName"/>
                 <c-country  label="Country" :myJson="myJson" :index="index" @change="changeCountry"/>
                 <c-phone  label="phone number" :prefix="myJson[index].idd" :phoneNumber="phoneNumber" @change="changePhone"/>
                 <c-input label="Email" :userName="email" @change="changeEmail"/>
                 <c-input label="Password" :userName="password" @change="changePassword"/>
                 <c-dialog :title="title" :description="description" :dialog="dialog" @change="closeDialog"/>
                </v-form>
              </v-card-text>
              <v-card-actions>
                <v-spacer></v-spacer>
                <v-btn color="primary" @click="Register">Register</v-btn>
              </v-card-actions>
            </v-card>
          </v-flex>
        </v-layout>
      </v-container>
    </v-main>
</v-app>
</template>

<script>
import json from '../assets/countries.json'
import axios from 'axios'
export default {
 name: "RegisterView",
 data() {
   return {
     myJson: [],
     loading:false,
     userName: "",
     email: "",
     country: "",
     phoneNumber:"",
     password:'',
     index:0,
     dialog:false,
     title:'',
     description:''
   };
 },
 mounted() {
    json.forEach((element,index) => {
      let midValue={
        name:element.name,
        flag:element.flag,
        idd:element.idd,
        id:index,
      };
      this.myJson.push(midValue);
    });
    this.loading=true;
 },
 methods: {
    changeName(value){
      this.userName=value;
    },
    changeEmail(value){
      this.email=value;
    },
    changeCountry(value){
      this.index=value;
      this.country=this.myJson[value].id;
    },
    changePhone(value){
      this.phoneNumber=value;
    },
    changePassword(value){
      this.password=value;
    },
    closeDialog(){
      this.dialog=false;
    },
    Register(){
      axios.post(`${process.env.VUE_APP_ROOT_API}api/register`, {
        name:this.userName,
        password:this.password,
        email:this.email,
        phone_number:this.phoneNumber,
        country_name:this.country
      })
      .then(response => {
        const data=response.data;
        if(data.status==0){
          this.title='Failed';
          if(data.errors){
            if(data.errors.email)
              this.description=data.errors.email.toString();
            else if(data.errors.country_name)
              this.description=data.errors.country_name.toString();
            else if(data.errors.password)
              this.description=data.errors.password.toString();
            else if(data.errors.phone_number)
              this.description=data.errors.phone_number.toString();
          }
        }
        else{
          this.title='Success';
          this.description='Registration is success';
        }
        this.dialog=true;
      });
    }
 }
};
</script>