<template>
    <div class="w-25">
        <div class="mb-3">
            <input type="text" class="form-control" v-model="name" id="name" placeholder="name">
        </div>
        <div class="mb-3">
            <input type="number" class="form-control" v-model="age" id="age" placeholder="age">
        </div>
        <div class="mb-3">
            <input type="text" class="form-control" id="job"  v-model="job" placeholder="job">
        </div>
        <div class="mb-3">
            <input @click.prevent="addPerson"  class="btn btn-primary" value="Add">
        </div>
<!--        <div>-->
<!--            <div>Color: {{obj.color}}</div>-->
<!--            <div> Number: {{obj.number > 10 ? 'more' : 'less'}}</div>-->
<!--            <div>Is published: {{obj.isPublished ? 'Published' : 'NotPublished'}}</div>-->
<!--        </div>-->
    </div>
</template>

<script>

export default {
    name: "CreateComponent",

    data(){
        return {
            name: null,
            age: null,
            job: null,
            // obj:{
            //     color:'yellow',
            //     number:20,
            //     isPublished:true
            // }
        }
    },
    // props:['obj'],
    mounted() {
        this.$parent.$refs.index.indexLog()
    },
    methods: {
        addPerson(){
            axios.post('api/', {name:this.name,age:this.age,job:this.job})
            .then(res =>{
                this.name=null
                this.age=null
                this.job=null
                this.$parent.$refs.index.getPeople()
            })
        }
    }
}

</script>

<style scoped>

</style>
