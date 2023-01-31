<script>
// import axios from "axios";
import navbarVue from "../layout/navbar.vue";
import { employeService } from "../../services";
import DatePicker from 'vue2-datepicker';
import 'vue2-datepicker/index.css';
export default {
    components: {DatePicker,navbarVue},
    data() {
        return {
            form: {
                email: "",
                name: "",
                status: null,
                time1: null,
                date_time: null,
                time3: null,
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
    methods: {
        onSubmit(event) {
            event.preventDefault();
            this.submitButton = true;
            const fd = new FormData();
            fd.append("name", this.form.name);
            fd.append("email", this.form.email);
            fd.append("status", this.form.status);
            fd.append("date_time", this.form.date_time == null ? '' : this.form.date_time);
            employeService
                .addEmploye(fd)
                .then((response) => {
                    Vue.toasted.success(response.data,{
                        duration: 5000
                    });
                    this.$router.push({ name: "employe" });
                })
                .catch((e) => {
                    this.errorMessage = e.response.data;
                    // var message = Object.values(err.response.data.errors)[0][0]
                    // Vue.toasted.error(message,{
                    //     duration: 5000
                    // });
                });
        },
        onReset(event) {
            event.preventDefault();
            // Reset our form values
            this.form.email = "";
            this.form.name = "";
            this.form.status = null;
            this.form.date_time = '';
            this.errorMessage = "";
            // Trick to reset/clear native browser form validation state
            this.show = false;
            this.$nextTick(() => {
                this.show = true;
            });
            this.submitButton = false;
        },
    },
};
</script>
<template>
    <div>
        <navbarVue />
        <div class="mt-3 container">
    
            <h2>Add Employe</h2>
            <div v-for="(errorArray, index) in errorMessage" :key="index">
                <span class="text-danger">{{ errorArray[0] }} </span>
            </div>
            <b-form @submit="onSubmit" @reset="onReset" v-if="show">
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
    
                <b-form-group id="input-group-3" label="Status:" label-for="input-3" class="mb-2 col-md-3">
                    <b-form-select
                        id="input-3"
                        class="form-control"
                        v-model="form.status"
                        :options="statuse"
                    ></b-form-select>
                </b-form-group>
                <div>
                    <!-- <date-picker v-model="form.time1" valueType="format" ></date-picker> -->
                    <date-picker
                     v-model="form.date_time"
                     type="datetime"
                     class="mb-2 form-control"
                     name="date_time"
                     placeholder="Select datetime"
                     id="date_time"
                     value-type="format"
                     format="YYYY-MM-DD HH:mm:ss"
                     required
                     ></date-picker>
                    <!-- <date-picker v-model="form.time3" range></date-picker> -->
                </div>
                <b-button type="submit" variant="primary" >Submit</b-button>
                <b-button type="reset" variant="danger">Reset</b-button>
                <b-button type="button" @click="$router.back()" variant="secondary">Cancel</b-button>
            </b-form>
        </div>
    </div>
</template>
