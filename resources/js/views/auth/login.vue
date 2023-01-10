<script>
// import axios from "axios";
import { authService } from "../../services";
import { set_axios_defaults ,set_Token } from "../../Helper/helper";

export default {
    data() {
        return {
            form: {
                email: "rahul@gmail.com",
                password: "",
            },
            show: true,
            errorMessage: "",
            submitButton: false,
        };
    },
    mounted() {
    },
    methods: {
        onSubmit(event) {
            event.preventDefault();
            this.submitButton = true;
            const fd = new FormData();
            fd.append("email", this.form.email);
            fd.append("password", this.form.password);
            this.$auth.login(fd);


            // authService.login(fd).then((response) => {
            //     set_Token(response.data.token)
            //     Vue.toasted.success(response.data.message, {
            //         duration: 3000,
            //     });
            //     set_axios_defaults(response.data.token)
            //     this.$router.push({ name: "employe" });
            // }).catch((e) => {
            //     this.errorMessage = e.response.data.message;
            // });
        },
    },
};
</script>
<template>
    <div class="mt-3 container">
        <h2>Add Employe</h2>
        <div v-for="(errorArray, index) in errorMessage" :key="index">
            <span class="text-danger">{{ errorArray[0] }} </span>
        </div>
        <b-form @submit="onSubmit" v-if="show">
            <b-form-group
                id="input-group-1"
                label="Email address:"
                label-for="input-1"
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
                label="Password:"
                label-for="input-2"
            >
                <b-form-input
                    id="input-2"
                    v-model="form.password"
                    type="password"
                    placeholder="Enter Password"
                ></b-form-input>
            </b-form-group>
            <div class="mt-2">
                <b-button type="submit" variant="primary">Submit</b-button>
                <b-button
                    type="button"
                    @click="$router.back()"
                    variant="secondary"
                    >Cancel</b-button
                >
            </div>
        </b-form>
    </div>
</template>
