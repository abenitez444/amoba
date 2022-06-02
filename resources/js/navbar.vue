<template>
<div v-if="loggedUser"> 
    <nav class="bg-gray-600 border-gray-200 px-2 sm:px-4 py-2  dark:bg-gray-800">
        <div class="container flex flex-wrap justify-between items-center mx-auto">
            <a href="https://flowbite.com" class="flex items-center">
                <span class="self-center text-xl font-semibold whitespace-nowrap dark:text-white">Amoba</span>
            </a>
        <div class="flex md:order-2">
            <button type="button" @click="logout()" class="text-white bg-gray-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-3 md:mr-0 dark:bg-gray-500 dark:hover:bg-green-600">Cerrar sesión</button>
            <button data-collapse-toggle="mobile-menu-4" type="button" class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="mobile-menu-4" aria-expanded="false">
            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
            <svg class="hidden w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
            </button>
        </div>
        <div class="hidden   w-full lg:flex lg:w-auto lg:order-1" id="mobile-menu-4">
            <ul class="flex flex-col mt-2 md:flex-row md:space-x-8 md:mt-0 md:text-sm md:font-medium">
                <li>
                    <router-link to="/dashboard" class="py-2 pr-4 pl-3 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 dark:text-white" aria-current="page">Home</router-link>
                </li>
                 <li>
                    <router-link to="/person" class="py-2 pr-4 pl-3 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 dark:text-white" aria-current="page">Personas</router-link>
                </li>
            </ul>
        </div>
        </div>
    </nav>
  </div>
</template>
<script>
    import Auth from './Auth.js';

    export default {
         components: {
            Auth
        },
        data() {
             return {
                loggedUser: this.auth.token
            }
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