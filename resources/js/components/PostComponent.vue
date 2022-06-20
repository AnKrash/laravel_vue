<template>
    <div>
        <CreateComponent ></CreateComponent>
        <IndexComponent ref="index"></IndexComponent>
        <SomeComponent></SomeComponent>
    </div>
</template>

<script>
import SinglePostComponent from "./SinglePostComponent";
import CreateComponent from "./CreateComponent";
import IndexComponent from "./IndexComponent";
import SomeComponent from "./SomeComponent";
export default {
    name: "PostComponent",

    data() {
        return {
            persons: null
        }
    },
    mounted() {
        this.getPosts()
        this.$refs.index.indexLog()
    },
    methods: {
        parentLog(){
            console.log('this is method from parent')
        }
        // getPosts(){
        //     axios.get('/posts')
        //     .then(res => {
        //         this.persons=res.data
        //     })
        //     .catch()
        //     .finally()


    },
    computed: {},

    components: {
        SomeComponent,
        CreateComponent,
        IndexComponent,
    }
}

</script>

<style scoped>

</style>
