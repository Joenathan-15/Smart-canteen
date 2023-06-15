<template>
    <Head title="Sales"/>
    <div class="grid float-right">
        <ul class="menu menu-md bg-base-200 max-w-md w-screen rounded-box">
            <li class="mb-8"><Link href="/sales">Back</Link></li>
            <li class="text-md mx-4 mb-8">Grand Total: Rp.{{ Intl.NumberFormat('id-ID', { maximumSignificantDigits: 3 }).format(grandTotal) }}</li>
            <span class="text-red-500 text-sm">Click The Input Befor Tap*</span>
          </ul>
          <form @submit.prevent="submit">
          <input v-model="form.card_id" type="text" class="w-screen max-w-md rounded-md">
          <span class="text-red-500 text-sm block mx-1 mt-1" v-if="form.errors.card_id"
          v-text="$page.props.errors.card_id"></span>
          <button class="hidden" type="submit"></button>
        </form>
    </div>
    <div>
        <div class="overflow-x-auto max-w-2xl mx-auto border">
            <table class="table">
                <thead>
                    <tr>
                      <th>No.</th>
                      <th>Name</th>
                      <th>Price</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <!-- row 2 -->
                    <tr v-for="(cart, index) in carts" :key="cart.id" class="hover">
                      <th>{{ index + 1 }}</th>
                      <td>{{ cart.products[0].product_name }}</td>
                      <td>Rp.{{Intl.NumberFormat('id-ID', { maximumSignificantDigits: 3 }).format(cart.products[0].product_price) }}</td>
                      <td><Link :href="`/cart/delete/${cart.id}`" method="post" class="btn btn-error">Remove</Link></td>
                  </tr>
                  </tbody>
            </table>
          </div>
    </div>
</template>
<script>
import { Head,Link,useForm } from '@inertiajs/vue3'
import LayoutVue from '../Layouts/Layout.vue'
export default {
    props:{
        carts:Array,
    },
    components:{
        Link,
        Head
    },
    layout:LayoutVue
}
</script>
<script setup>
import { defineProps, computed } from 'vue';

let props = defineProps({
  carts: Array
});

const grandTotal = computed(() => {
  let total = 0;
  props.carts.forEach((cart) => {
    total += cart.products[0].product_price;
  });
  return total;
});

let form = useForm({
  card_id : '',
  grand_total : grandTotal
})
let submit = () => {
  form.post('/cart/checkout',form)
  form.reset();
}
</script>
<style lang="">
    
</style>