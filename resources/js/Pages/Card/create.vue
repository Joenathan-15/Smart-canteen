<template>
    <Head title="Card Create"/>
    <div class="grid mt-16 place-items-center">
        <form class="bg-base-200 p-10 rounded-xl" @submit.prevent="submit">
            <h1 class="text-center text-2xl font-semibold">Add New Card</h1>
            <div class="my-8">
                <span class="block my-2 text-sm">Card Owner Name</span>
                <input v-model="form.card_owner" type="text" class="max-w-md w-screen">
                <span class="text-red-500 text-sm block mx-1 mt-1" v-if="form.errors.card_owner"
                    v-text="$page.props.errors.card_owner"></span>
            </div>
            <div class="mb-8">
                <span class="block my-2 text-sm text-red-500">Click The Input Befor Tap*</span>
                <input placeholder="Card ID" v-model="form.card_id" type="text" class="max-w-md w-screen">
                <span class="text-red-500 text-sm block mx-1 mt-1" v-if="form.errors.card_id"
                    v-text="$page.props.errors.card_id"></span>
            </div>
            <div class="mt-8">
                <button :disabled="form.processing" type="submit"
                    class="btn btn-success max-w-md w-screen">Add New Card</button>
            </div>
        </form>
    </div>
</template>
<script>
import { Head,useForm } from '@inertiajs/vue3'
import LayoutVue from '../Layouts/Layout.vue'
export default {
    components:{
        Head
    },
    layout:LayoutVue
}
</script>
<script setup>
let form = useForm({
    'card_id':'',
    'card_owner':'',
})
let submit = () =>{
    form.post('/card/create',form);
    form.reset();
}
</script>
<style lang="">
    
</style>