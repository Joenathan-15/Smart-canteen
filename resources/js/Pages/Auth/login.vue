<template>
    <Head title="Login" />
    <div>
        <div class="grid h-screen place-items-center">
            <div class="bg-base-200 p-9 rounded-xl">
                <h1 class="text-2xl font-semibold text-center">Smart canteen</h1>
                <h1 class="text-2xl font-semibold mb-8 text-center">Login</h1>
                <form @submit.prevent="submit">
                    <div class="mb-8">
                        <label for="email" class="uppercase block mx-1 mb-2">Email</label>
                        <input v-model="form.email" class="max-w-sm w-screen rounded-md" id="email" placeholder="EMAIL" type="text">
                        <span class="text-red-500 text-sm block mx-1 mt-1" v-if="form.errors.email" v-text="$page.props.errors.email"></span>
                    </div>
                    <div class="mb-8">
                        <label for="password" class="uppercase block mx-1 mb-2">password</label>
                        <input v-model="form.password" class="max-w-sm w-screen rounded-md uppercase" id="password" placeholder="password" type="password">
                        <span class="text-red-500 text-sm block mx-1 mt-1" v-if="form.errors.password" v-text="$page.props.errors.password"></span>
                    </div>
                    <div class="my-8">
                        <button type="submit" class="btn btn-success max-w-sm w-screen hover:bg-green-500">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>
<script>
import { Head,useForm } from '@inertiajs/vue3'
export default {
    components:{
        Head
    }
}
</script>
<script setup>
let form = useForm({
    email:"",
    password:"",
})

let submit = () =>{
    form.post('/login')
}
</script>
<style lang="">
    
</style>