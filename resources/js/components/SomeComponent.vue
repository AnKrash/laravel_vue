<template>
    <div>
        <div>
            <div>Color: {{color}}</div>
            <div> Number: {{number > 10 ? 'more' : 'less'}}</div>
            <div>Is published: {{isPublished ? 'Published' : 'NotPublished'}}</div>
        </div>
    </div>
</template>

<script>
import SinglePostComponent from "./SinglePostComponent";
import CreateComponent from "./CreateComponent";
import IndexComponent from "./IndexComponent";
export default {
    name: "SomeComponent",

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
        CreateComponent,
        IndexComponent
    }
}

</script>

<style scoped>

</style>
