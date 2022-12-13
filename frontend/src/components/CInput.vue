<template>
  <div>
    <div class="text-lg-subtitle-1 d-flex justify-start">
        {{label}}
    </div>
    <v-text-field
        :value="userName"
        outlined
        background-color="white"
        filled
        rounded
        name="login" 
        type="text"
        @input="onChange"
    ></v-text-field>
  </div>
</template>
<script>  
  export default {
    name: 'CInput',
    props: {
        label: {
        type: String,
        default: ''
        },
        userName: {
        type: String,
        default: ''
        },
    },
    data: () => ({
    }),
    mounted() {
        // this.$emit("change", this.val);
    },
    methods:{
        onChange(val){
            this.$emit('change', val);
        }
    }
  }
  </script>
  