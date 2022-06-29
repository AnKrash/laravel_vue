<template>
    <div class="w-25">

        <div class="mb-3 mt-3">
            <input type="text" v-model="name" placeholder="name" class="form-control">
        </div>
        <div class="mb-3  mt-3">
            <input type="email" v-model="email" placeholder="email" class="form-control">
        </div>
        <div class="mb-3 mt-3">
            <input type="password" v-model="password" placeholder="password" class="form-control">
        </div>
        <div class="mb-3 mt-3">
            <input type="password" v-model="password_confirmation" placeholder="password_confirmation"
                   class="form-control">
        </div>
        <div class="mb-3 mt-3">
            <input @click.prevent="register" type="submit" value="register" class="btn btn-primary">
        </div>
    </div>
</template>

<script>
import router from "../../router";

export default {
    name: "Registration",
    data() {
        return {
            name: null,
            email: null,
            password: null,
            password_confirmation: null,
        }
    },
    methods: {
        register() {
            axios.get('/sanctum/csrf-cookie')
                .then(response => {
                    axios.post('/register', {
                        name: this.name,
                        email: this.email,
                        password: this.password,
                        password_confirmation: this.password_confirmation
                    })
                        .then(function (response) {
                            localStorage.setItem('x_xsrf_token', response.config.headers['X-XSRF-TOKEN'])
                            router.push({name: 'user.personal'})
                        }, function (error) {
                            console.log(error.response.data);
                        })
                })
        }
    }
}
</script>

<style scoped>

</style>
