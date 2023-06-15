<template>
    <Head title="Sales"/>
    <div class="grid float-right">
        <input class="rounded-md my-5" placeholder="Search...." type="text">
        <ul class="menu menu-md bg-base-200 w-56 rounded-box">
            <li><Link href="/cart/checkout">Shopping Cart</Link></li>
        </ul>
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
                    <tr v-for="(product,index) in products" :key="product.id" class="hover">
                      <th>{{index+1}}</th>
                      <td>{{product.product_name}}</td>
                      <td>Rp.{{Intl.NumberFormat('id-ID', { maximumSignificantDigits: 3 }).format(product.product_price) }}</td>
                      <td>
                        <Link :href="`/product/add/${product.id}`" method="post" as="button" class="btn btn-success">+</Link>
                      </td>
                    </tr>
                  </tbody>
            </table>
          </div>
    </div>
</template>
<script>
import { Head,Link } from '@inertiajs/vue3'
import LayoutVue from '../Layouts/Layout.vue'
export default {
    props:{
        products:Array
    },
    components:{
        Link,
        Head
    },
    layout:LayoutVue
}
</script>
<style lang="">
    
</style>