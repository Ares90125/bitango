<template>
  <div style="position:relative">
    <div class="text-lg-subtitle-1 d-flex justify-start">
    {{label}}
    </div>
    <v-select
        prepend-inner-icon="   "
        :items="myJson"
        :value="myJson[index].id"
        item-text="name"
        item-value="id"
        outlined
        background-color="white"
        filled
        rounded
        name="login" 
        type="text"
        @input="onChange"
    >
    <template v-slot:item="slotProps" >
        <div  class="d-flex flex-row align-center justify-center">
        <div class="d-flex flex-column justify-space-between align-center" >
            <v-img
            :aspect-ratio="16/9"
            width="20"
            :src="'https://cdn.countryflags.com/thumbs/'+slotProps.item.name.replace(' ','-').toLowerCase()+'/flag-800.png'"
            ></v-img>
        </div>
        <div class="ml-12">
            {{slotProps.item.name}}
        </div>
        </div>
    </template>
    </v-select>
    <div style="position:absolute; top:50px;" class="ml-5" >
        <v-img
        :aspect-ratio="16/9"
        width="20"
        :src="'https://cdn.countryflags.com/thumbs/'+myJson[index].name.replace(' ','-').toLowerCase()+'/flag-800.png'"
        ></v-img>
    </div>
  </div>
</template>
<script>  
export default {
    name: 'CCountry',
    props: {
        label: {
        type: String,
        default: ''
        },
        myJson: {
        type: Array,
        default: ()=>{}
        },
        index: {
        type: Number,
        default: 0
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
    