<template>
 <div v-if="loggedUser">
     <navbar></navbar>
    <div class="flex items-center justify-center p-12">
        <div class="mx-auto w-full max-w-[550px]">
            <div class="mb-5">
                <label
                for="name"
                class="mb-3 block text-base font-medium text-[#07074D]"
                >
                Nombres
                </label>
                <input
                type="text"
                name="name"
                id="name"
                placeholder="Full Name"
                class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                />
            </div>
            <div class="mb-5">
                <label
                for="email"
                class="mb-3 block text-base font-medium text-[#07074D]"
                >
                Email 
                </label>
                <input
                type="email"
                name="email"
                id="email"
                placeholder="example@domain.com"
                class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                />
            </div>
            
            <div class="mb-5">
                <label
                for="message"
                class="mb-3 block text-base font-medium text-[#07074D]"
                >
                Descripción
                </label>
                <textarea
                rows="4"
                name="message"
                id="message"
                placeholder="Type your message"
                class="w-full resize-none rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                ></textarea>
            </div>
            <div>
                <button
                class="hover:shadow-form rounded-md bg-[#6A64F1] py-3 px-8 text-base font-semibold text-white outline-none"
                >
                Submit
                </button>
            </div>
        </div>
    </div>
</div>
</template>
<script>
import Auth from '../../Auth.js';
import Navbar from '../../navbar.vue';
    export default {
        components:{
            Auth,
            Navbar
        },
        data() {
             return {
                loggedUser: this.auth.token
            }
        },
        mounted(){
            let loggedUser = this.auth.token
        },
        methods: {
            store() {
                console.log("petición save");
            }
        }
    }
</script>