<template>
        <div class="navbar-nav" v-if="loggedUser">
             <router-view></router-view>
        </div>
        <div v-else>
          <navbar></navbar>
          <router-view></router-view>
        </div>
   
</template>

<script>
    import Auth from './Auth.js';
    import Navbar from './navbar';
    import Person from './components/persons/person.vue';

    export default {
        components: {
            Auth,
            Navbar,
            Person
        },
        data() {
            return {
                loggedUser: this.auth.user
            }
        },
        mounted(){
            let loggedUser = this.auth.token
        },
       
        methods: {
            logout() {
                this.axios.post('http://127.0.0.1:8000/api/logout')
                .then(({data}) => {
                    Auth.logout();
                    this.$router.push('/login');
                })
                .catch((error) => {
                    console.log(error);
                });
            }
        }
    }
</script>