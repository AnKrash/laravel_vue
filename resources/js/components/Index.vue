<template>
    <div>
        <router-link to="/posts">Posts</router-link>
        <router-view></router-view>
        <router-link to="/tags">Tags</router-link>

    </div>
</template>

<script>
export default {
    name: "Index"
}
</script>

<style scoped>

</style>
