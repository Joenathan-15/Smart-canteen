<template>
    <Head title="Top Up" />
    <div>
        <div class="bg-base-200 grid float-left p-6">
            <span class="text-2xl font-semibold text-center my-3">Card Top Up</span>
            <form @submit.prevent="submit">
                <div class="mb-8">
                    <span class="block my-2 text-sm">balance to be loaded</span>
                    <input min="0" v-model="form.card_balance" type="number" class="max-w-md w-screen">
                    <span class="text-red-500 text-sm block mx-1 mt-1" v-if="form.errors.card_balance"
                        v-text="$page.props.errors.card_balance"></span>
                </div>
                <div class="mb-8">
                    <span class="block my-2 text-sm text-red-500">Click The Input Before Tap*</span>
                    <input v-model="form.card_id" type="text" class="max-w-md w-screen">
                    <span class="text-red-500 text-sm block mx-1 mt-1" v-if="form.errors.card_id"
                        v-text="$page.props.errors.card_id"></span>
                </div>
                <div class="mt-8">
                    <button :disabled="form.processing" type="submit"
                        class="btn btn-success max-w-md w-screen">Confirm Top Up</button>
                </div>
            </form>
        </div>
        <div class="grid float-right bg-base-200 max-w-4xl w-screen">
            <div class="overflow-x-auto">
                <table class="table">
                    <!-- head -->
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Card ID</th>
                            <th>Card Owner</th>
                            <th>Balance</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- row 1 -->
                        <tr v-for="(card,index) in cards" :key="card.id">
                            <th>{{ index+1 }}</th>
                            <td>{{ card.card_id }}</td>
                            <td>{{ card.card_owner }}</td>
                            <td>Rp.{{ new Intl.NumberFormat('id-ID', { maximumSignificantDigits: 3 }).format(card.card_balance) }}</td>
                            <td class="p-5">
                                <Link :href="`/card/${card.id}/edit`" class="btn btn-warning mx-2 px-7">Edit</Link>
                                <Link :href="`/card/${card.id}/delete`" class="btn btn-error mx-2">Delete</Link>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>
<script>
import LayoutVue from '../Layouts/Layout.vue'
import { Head, Link, useForm } from '@inertiajs/vue3';
export default {
    components: {
        Head,
        Link
    },
    props: {
        cards: Array,
    },
    layout: LayoutVue
}
</script>
<script setup>
let form = useForm({
    card_balance: "",
    card_id: "",
})
let submit = () => {
    form.post('/topup', form,)
    form.reset()
}
</script>
<style lang="">

</style>