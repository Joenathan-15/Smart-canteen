<template>
    <Head title="Edit Card" />
    <div class="grid mt-16 place-items-center">
        <form class="bg-base-200 p-10 rounded-xl" @submit.prevent="submit">
            <h1 class="text-center text-2xl font-semibold">Edit Card</h1>
            <div class="my-8">
                <span class="block my-2 text-sm">Card Owner Name</span>
                <input v-model="form.card_owner" type="text" class="max-w-md w-screen">
                <span class="text-red-500 text-sm block mx-1 mt-1" v-if="form.errors.card_owner"
                    v-text="$page.props.errors.card_owner"></span>
            </div>
            <div class="mb-8">
                <span class="block my-2 text-sm">Card ID</span>
                <input disabled placeholder="Card ID" v-model="form.card_id" type="text" class="max-w-md w-screen disabled">
                <span class="text-red-500 text-sm block mx-1 mt-1" v-if="form.errors.card_id"
                    v-text="$page.props.errors.card_id"></span>
            </div>
            <div class="mt-8">
                <button :disabled="form.processing" type="submit"
                    class="btn btn-warning max-w-md w-screen">Save Change</button>
            </div>
        </form>
    </div>
</template>
<script>
import LayoutVue from '../Layouts/Layout.vue'
import { Head,useForm } from '@inertiajs/vue3';
export default {
    components:{
        Head,
    },
    layout:LayoutVue
}
</script>
<script setup>
let  props = defineProps({
    card:Object
})
let form = useForm({
    'card_owner' : props.card.card_owner,
    'card_id' : props.card.card_id,
})
let submit = () => {
    form.post(`/card/${props.card.id}/edit`)
}
</script>