<template>
    <Head title="Add Product" />
    <div class="h-screen grid place-content-center">
        <div class="bg-base-300 p-5 rounded-xl">
            <span class="font-semibold text-2xl block text-center">Add New Product</span>
            <form @submit.prevent="submit" class="mt-10">
                <div class="mb-8"> 
                    <label for="" class="block text-md uppercase">Product Name</label>
                    <input v-model="form.product_name" placeholder="Product Name" type="text" class="max-w-md w-screen">
                    <span class="text-red-500 text-sm block mx-1 mt-1" v-if="form.errors.product_name"
                    v-text="$page.props.errors.product_name"></span>
                </div>
                <div class="mb-8"> 
                    <label for="" class="block text-md uppercase">Product Price</label>
                    <input v-model="form.product_price" placeholder="Product Price" type="number" class="max-w-md w-screen">
                    <span class="text-red-500 text-sm block mx-1 mt-1" v-if="form.errors.product_price"
                    v-text="$page.props.errors.product_price"></span>
                </div>
                <div class="mb-8"> 
                    <button type="submit" class="btn btn-success max-w-md w-screen" :disabled="form.processing">Add New Product</button>
                </div>
            </form>
        </div>
    </div>
</template>
<script>
import layoutVue from '../Layouts/layout.vue'
import { Head,useForm } from '@inertiajs/vue3';
export default {
    components:{
        Head
    },
    layout:layoutVue
}

</script>
<script setup>
let form = useForm({
    'product_name':'',
    'product_price':'',
})

let submit = () => {
    form.post('/product/create',form);
    form.reset();
}
</script>
<style lang="">
    
</style>