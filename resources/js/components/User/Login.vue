<template>
    <div class="w-25">

        <div class="mb-3 mt-3">
            <input type="email" v-model="email" placeholder="email" class="form-control">
        </div>
        <div class="mb-3 mt-">
            <input type="password" v-model="password" placeholder="password" class="form-control">
        </div>
        <div class="mb-3 mt-">
            <input @click.prevent="login" type="submit" value="login" class="btn btn-primary">
        </div>
    </div>
</template>

<script>
export default {
    name: "Login",
    data() {
        return {
            email: null,
            password: null
        }
    },
    methods: {
        login() {
            axios.get('/sanctum/csrf-cookie').then(response => {
                axios.post('/login', {
                    email: this.email,
                    password: this.password
                }).then(r => {
                    localStorage.setItem('x_xsrf_token', r.config.headers['X-XSRF-TOKEN'])
                    this.$router.push({name: 'user.personal'})
                }).catch(err => {
                    console.log(err.response);
                })
            })
        }
    }
}
</script>

<style scoped>

</style>
