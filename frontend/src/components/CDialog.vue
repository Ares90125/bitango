<template>
    <v-dialog :value="dialog" transition="dialog-bottom-transition" max-width="600" @click:outside="onChange">
        <template >
            <v-card>
                <v-toolbar :color="title!='Failed'?'primary':'error'" dark>{{title}}</v-toolbar>
                <v-card-text>
                    <div class="text-h5 pa-12">{{description}}</div>
                </v-card-text>
                <v-card-actions class="justify-end">
                    <v-btn text @click="onChange">Close</v-btn>
                </v-card-actions>
            </v-card>
        </template>
    </v-dialog>
</template>
<script>
export default {
    name: 'CDialog',
    props: {
        title: {
            type: String,
            default: ''
        },
        description: {
            type: String,
            default: ''
        },
        dialog :{
            type:Boolean,
            default:false,
        }
    },
    data: () => ({
        
    }),
    mounted() {
        // this.$emit("change", this.val);
    },
    methods: {
        onChange() {
            this.$emit('change');
        }
    }
}
</script>
    