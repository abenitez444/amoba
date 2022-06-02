<template>
    <div v-if="loggedUser">
    <navbar></navbar>
    
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css" rel="stylesheet">

    <div class="flex w-full">
    <div class="flex-1 m-5 relative rounded bg-gray-200 shadow">
        <div class="bg-green-500 pl-10 pr-10 pt-8 pb-8 ml-3 absolute top-0 -mt-4 -mr-4 rounded text-white fill-current shadow">
            <i class="fas fa-user inline-block w-5"></i>
        </div>

        <div class="float-right top-0 right-0 m-3">
            <div class="text-right text-sm">Personas</div>
            <div class="text-right text-3xl">
                <div class="mt-7 text-center">
                    <button  class="bg-blue-500 w-20 py-3 rounded-xl text-white shadow-xm hover:shadow-inner focus:outline-none transition duration-500 ease-in-out  transform hover:-translate-x hover:scale-105">
                        <i class="fas fa-plus"></i></i>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="flex-1 m-5 relative rounded bg-gray-200 shadow">
        <div class="bg-red-500 pl-10 pr-10 pt-8 pb-8 ml-3 absolute top-0 -mt-4 -mr-4 rounded text-white fill-current shadow">
            <i class="fas fa-search"></i></i>
        </div>

        <div class="float-right top-0 right-0 m-3">
            <div class="text-right text-sm">Busqueda</div>
            <div class="text-right text-3xl">
                
            </div>
        </div>
    </div>
    </div>
    </div>
</template>
<script>
    import Auth from '../Auth.js';   
    import Navbar from '../navbar';

    export default {
        components: {
            Auth,
            Navbar
        },
        data () {
            return {
                loggedUser: this.auth.token
            }
        },
        mounted(){
            let loggedUser = this.auth.token
        },
        methods: {
            login() {
                this.axios.post('http://127.0.0.1:8000/api/login', this.user)
                    .then(({data}) => {
                        Auth.login(data.access_token,data.user); 
                        this.$router.push('/dashboard');
                    })
                    .catch((error) => {
                        console.log(error);
                    });
            }
        }
    }
</script>