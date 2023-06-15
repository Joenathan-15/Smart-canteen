<template>
    <Head title="Dashboard" />
     <div class="grid float-right">
        <ul class="menu menu-md bg-base-200 w-56 rounded-box">
            <li><Link href="/product/create">Add New Product</Link></li>
          </ul>
    </div>
    <div>
        <div class="overflow-x-auto max-w-2xl mx-auto border">
            <table class="table">
              <!-- head -->
              <thead>
                <tr>
                  <th>No.</th>
                  <th>Product Name</th>
                  <th>Product Price</th>
                  <th class="text-center">Edit</th>
                  <th class="text-center">Delete</th>
                </tr>
              </thead>
              <tbody>
                <!-- row 1 -->
                <tr v-for="(product,index) in products" :key="product.id">
                  <th>{{ index+1 }}</th>
                  <td>{{product.product_name}}</td>
                  <td>Rp.{{new Intl.NumberFormat('id-ID', { maximumSignificantDigits: 3 }).format(product.product_price)}}</td>
                    <td><Link :href='`/product/${product.id}/edit`' class="btn btn-warning px-10">Edit</Link></td>
                  <td><Link :href='`/product/${product.id}/delete`' class="btn btn-error px-10">Remove</Link></td>
                </tr>
              </tbody>
            </table>
          </div>
    </div>
</template>
<script>
import { Head,Link } from '@inertiajs/vue3';
import LayoutVue from './Layouts/layout.vue';
export default {
    components:{
        Link,
        Head
    },
    props:{
        products:Array
    },
    layout:LayoutVue
}
</script>
<style lang="">
    
</style>