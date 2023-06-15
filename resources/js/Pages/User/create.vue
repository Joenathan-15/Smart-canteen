<template>
    <Head title="User Create" />
    <div>
        <div class="h-screen grid place-content-center">
            <div class="bg-base-300 p-5 rounded-xl">
                <span class="font-semibold text-2xl block text-center">Add New Store</span>
                <form @submit.prevent="submit" class="mt-10">
                    <div class="mb-8"> 
                        <label for="" class="block text-md uppercase">Store Name</label>
                        <input v-model="form.store_name" placeholder="Store Name" type="text" required class="max-w-md w-screen">
                        <span class="text-red-500 text-sm block mx-1 mt-1" v-if="form.errors.store_name"
                        v-text="$page.props.errors.store_name"></span>
                    </div>
                    <div class="mb-8"> 
                        <label for="" class="block text-md uppercase">Store Email</label>
                        <input v-model="form.store_email" placeholder="Store Email" type="email" required class="max-w-md w-screen">
                        <span class="text-red-500 text-sm block mx-1 mt-1" v-if="form.errors.store_email"
                        v-text="$page.props.errors.store_email"></span>
                    </div>
                    <div class="mb-8"> 
                        <label for="" class="block text-md uppercase">Store Password</label>
                        <input v-model="form.store_password" placeholder="Store Password" type="password" required class="max-w-md w-screen">
                        <span class="text-red-500 text-sm block mx-1 mt-1" v-if="form.errors.store_password"
                        v-text="$page.props.errors.store_password"></span>
                    </div>
                    <div class="form-control mb-8">
                        <label class="label cursor-pointer">
                          <span class="label-text">User As Admin</span> 
                          <input type="checkbox" v-model="form.is_admin"/>
                        </label>
                      </div>
                    <div class="mb-8"> 
                        <button type="submit" class="btn btn-success max-w-md w-screen" :disabled="form.processing">Add New Store</button>
                    </div>
                </form>
            </div>
    </div>
    </div>
</template>
<script>
import { Head, useForm } from '@inertiajs/vue3'
import layoutVue from '../Layouts/layout.vue'
export default {
    layout:layoutVue,
    components:{
        Head
    }
}
</script>
<script setup>
let form = useForm({
    'store_name' : '',
    'store_email' : '',
    'store_password' : '',
    'is_admin' : '',
})
let submit = () => {
    form.post('/user/create')
    form.reset
}
</script>
<style lang="">
    
</style>