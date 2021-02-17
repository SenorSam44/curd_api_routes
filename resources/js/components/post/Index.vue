<template>
    <div class="card">
        <div class="card-header">
            <div class="row">
                <span class="col p-3 text-center">Post</span>
                <span @click="getPosts()" class="col p-3 text-center cursor-pointer">Refresh</span>
            </div>

            <div class="form-row">
                <label class="p-2 w-100 " for="title">
                    Title
                    <input id="title" v-model="title" class="form-control w-100"/>
                </label>

                <label class="p-2 w-100" for="body">
                    Body
                    <textarea id="body" v-model="body" class="form-control w-100" rows="5"></textarea>
                </label>

                <button class="offset-10 col-2 btn btn-primary" id="post" @click="createPost()">Post</button>
            </div>

        </div>

        <div class="card-body">

        </div>
    </div>
</template>

<script>
import axios from 'axios';

export default {

    // name: "PostIndex",
    data() {
        return {
            title: '',
            body: '',

        }
    },
    methods: {
        createPost() {
            let token;
            // axios.get('/oauth/personal-access-tokens')
            //     .then(response => {
            //         console.log(response.data[0].id);
            //         token='08feac356229e66bb2142e3d7e4cf4513252ce76ef8bbab4371362036e1a7a31d8de4632b195ff84';
            //     })

            let data = {
                title: this.title,
                body: this.body,
                // headers: {
                //     'Accept':'application/json',
                //     'Authorization': 'Bearer 08feac356229e66bb2142e3d7e4cf4513252ce76ef8bbab4371362036e1a7a31d8de4632b195ff84' ,
                //
                // }
            }


            axios.post('/api/createPost', data)
                .then(response =>{
                    console.log(response);
                })
                .catch(err => {
                    console.log(data);

                }).finally(() => {

            })
        },
        getPosts(){
            axios.get('/api/getPosts')
            .then(response=>{
                console.log(response)
                })
        },
        resetForm() {
            this.title = '';
            this.body = ''

        }
    }
}
</script>

<style scoped>
.cursor-pointer {
    cursor: pointer;

}

.cursor-pointer:hover {
    background: deepskyblue;
    color: white;
}
</style>
