<script>
// import axios from "axios";
import navbarVue from "../layout/navbar.vue";
import { employeService } from "../../services";
import DatePicker from 'vue2-datepicker';
import 'vue2-datepicker/index.css';
export default {
    components: {DatePicker, navbarVue },
    data() {
        return {
            form: {
                email: "",
                name: "",
                status: null,
                date_time: null,
            },
            statuse: [
                { text: "Select Status", value: null },
                { text: "active", value: 1 },
                { text: "inactive", value: 0 },
            ],
            show: true,
            errorMessage: "",
            submitButton:false,
        };
    },
    mounted(){
        this.getEmployeById();
    },
    methods: {
        onUpdate(event) {
            event.preventDefault();
            this.submitButton = true;
            const fd = new FormData();
            fd.append("name", this.form.name);
            fd.append("email", this.form.email);
            fd.append("status", this.form.status);
            fd.append("id", this.form.id);
            fd.append("date_time", this.form.date_time == null ? '' : this.form.date_time);
            employeService
                .editEmploye(fd)
                .then((response) => {
                    Vue.toasted.success(response.data.message,{
                        duration: 5000
                    });
                    // this.$router.push({ name: "employe" });
                    this.getEmployeById();
                    this.submitButton = false;
                })
                .catch((e) => {
                    this.errorMessage = e.response.data;
                });
        },

        getEmployeById() {
            employeService.getEmployeById({id:this.$route.params.employeId}).then((response)=>{
                const{id,name,email,status,date_time} = response.data.data;
                this.form = {id,name,email,status,date_time};
            })
        }
    },
};
</script>
<template>
    <div>
        <navbarVue />
        <div class="mt-3 container">
            <h2>Edit Employe</h2>
            <div v-for="(errorArray, index) in errorMessage" :key="index">
                <span class="text-danger">{{ errorArray[0] }} </span>
            </div>
            <b-form @submit="onUpdate" v-if="show">
                <b-form-group
                    id="input-group-1"
                    label="Email address:"
                    label-for="input-1"
                    description="We'll never share your email with anyone else."
                >
                    <b-form-input
                        id="input-1"
                        v-model="form.email"
                        type="email"
                        placeholder="Enter email"
                    ></b-form-input>
                </b-form-group>
    
                <b-form-group
                    id="input-group-2"
                    label="Your Name:"
                    label-for="input-2"
                >
                    <b-form-input
                        id="input-2"
                        v-model="form.name"
                        placeholder="Enter name"
                    ></b-form-input>
                </b-form-group>
    
                <b-form-group id="input-group-3" label="Status:" label-for="input-3" class="mb-2">
                    <b-form-select
                        id="input-3"
                        v-model="form.status"
                        :options="statuse"
                    ></b-form-select>
                </b-form-group>
                <div>
                    <date-picker
                     v-model="form.date_time"
                     type="datetime"
                     class="mb-2"
                     name="date_time"
                     placeholder="Select datetime"
                     id="date_time"
                     value-type="format"
                     format="YYYY-MM-DD HH:mm:ss"
                     ></date-picker>
                </div>
    
                <b-button type="submit" variant="primary" >Update</b-button>
                <b-button type="button" @click="$router.back()" variant="secondary">Cancel</b-button>
            </b-form>
        </div>
    </div>
</template>
