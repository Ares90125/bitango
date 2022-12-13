<template>
    <div>
      <div class="text-lg-subtitle-1 d-flex justify-start">
          {{label}}
      </div>
      <v-text-field
          :value="phoneNumber"
          :prefix="prefix"
          outlined
          background-color="white"
          filled
          rounded
          name="login" 
          type="number"
          @input="onChange"
      ></v-text-field>
    </div>
  </template>
  <script>  
    export default {
      name: 'CPhone',
      props: {
          label: {
          type: String,
          default: ''
          },
          prefix: {
          type: String,
          default: ''
          },
          phoneNumber: {
          type: String,
          default: ''
          },
      },
      data: () => ({
      }),
      mounted() {
        //   this.$emit("change", this.val);
      },
      methods:{
          onChange(val){
              this.$emit('change', val);
          }
      }
    }
    </script>
    