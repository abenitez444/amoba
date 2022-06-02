<template>
    <div class="font-sans">
        <div class="relative min-h-screen flex flex-col sm:justify-center items-center bg-gray-100 ">
            <div class="relative sm:max-w-sm w-full">
                <div class="card bg-blue-400 shadow-lg  w-full h-full rounded-3xl absolute  transform -rotate-6"></div>
                <div class="card bg-red-400 shadow-lg  w-full h-full rounded-3xl absolute  transform rotate-6"></div>
                <div class="relative w-full rounded-3xl  px-6 py-4 bg-gray-100 shadow-md">
                    <label for="" class="block mt-3 text-sm text-gray-700 text-center font-semibold">
                        Iniciar
                    </label>
                        <div>
                            <input v-model="user.email" type="email" placeholder="Correo electronico" class="mt-1 block w-full border-none bg-gray-100 h-11 rounded-xl shadow-lg hover:bg-blue-100 focus:bg-blue-100 focus:ring-0">
                        </div>
            
                        <div class="mt-7">                
                            <input v-model="user.password" type="password" placeholder="Contraseña" class="mt-1 block w-full border-none bg-gray-100 h-11 rounded-xl shadow-lg hover:bg-blue-100 focus:bg-blue-100 focus:ring-0">                           
                        </div>

                        <div class="mt-7 flex">
                            <label for="remember_me" class="inline-flex items-center w-full cursor-pointer">
                                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                                <span class="ml-2 text-sm text-gray-600">
                                    Recuerdame
                                </span>
                            </label>
                        </div>
            
                        <div class="mt-7 text-center">
                            <button @click="login" class="bg-blue-500 w-50 py-3 rounded-xl text-white shadow-xm hover:shadow-inner focus:outline-none transition duration-500 ease-in-out  transform hover:-translate-x hover:scale-105">
                                Iniciar
                            </button>
                        </div>
            
                        <div class="mt-7">
                            <div class="flex justify-center items-center">
                                <label class="mr-2" >¿Eres nuevo?</label>
                                <a href="#" class=" text-blue-500 transition duration-500 ease-in-out  transform hover:-translate-x hover:scale-105">
                                    Crea una cuenta
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import Auth from '../../Auth.js';

    export default {
        data() {
            return {
                user: {
                    email: '',
                    password: '',
                }
            };
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