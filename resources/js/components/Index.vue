<template>
    <div class="mt-3">
        <router-link v-if="token" :to="{ name: 'person.index'}">People</router-link>
        <router-link v-if="token" :to="{ name: 'person.create'}">Add</router-link>
        <router-link v-if="!token" :to="{ name: 'user.login'}">Login</router-link>
        <router-link v-if="!token" :to="{ name: 'user.registration'}">Registration</router-link>
        <router-link v-if="token" :to="{ name: 'user.personal'}">Personal</router-link>
        <a v-if="token" @click.prevent="logout" href="#">Logout</a>
        <router-link v-if="token" :to="{ name: 'images.index'}">Images</router-link>
        <router-view></router-view>
    </div>
</template>

<script>
export default {
    name: "Index",
    data() {
        return {
            token: null
        }
    },
    mounted() {
        this.getData()
        this.getToken()
    },
    updated() {
        this.getToken()
    },
    methods: {
        getToken() {
            this.token = localStorage.getItem('x_xsrf_token')
        },
        getData() {
            axios.get('api/get')
                .then(res => {
                    // console.log(res);
                })
        },
        logout() {
            axios.post('/logout')
                .then(res => {
                    localStorage.removeItem('x_xsrf_token')
                    this.$router.push({name: 'user.login'})
                })
        }
    }
}

</script>

<style scoped>

</style>
