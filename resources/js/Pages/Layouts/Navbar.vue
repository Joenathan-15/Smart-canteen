<template>
    <div class="navbar bg-base-200">
        <div class="navbar-start">
          <div class="dropdown">
            <label tabindex="0" class="btn btn-ghost btn-circle">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7" /></svg>
            </label>
            <ul tabindex="0" class="menu menu-sm dropdown-content mt-3 p-2 shadow bg-base-200 rounded-box w-52">
              <li><Link class="p-4 rounded-lg" :class="{'bg-base-300':$page.component === 'Dashboard'}" href="/">Product</Link></li>
              <li><Link class="p-4 rounded-lg" :class="{'bg-base-300':$page.component === 'Sales/index'}" href="/sales">Sales</Link></li>
              <li><Link class="p-4 rounded-lg" :class="{'bg-base-300':$page.component === 'Card/index'}" href="/topup">Top-Up</Link></li>
              <div v-if="$page.props.auth.user.is_admin == true">
                <li><Link class="p-4 rounded-lg" :class="{'bg-base-300':$page.component === 'Card/create'}" href="/card/create">Add New Card</Link></li>
                <li><Link class="p-4 rounded-lg" :class="{'bg-base-300':$page.component === 'User/create'}" href="/user/create">Add New Store</Link></li>
              </div>
            </ul>
          </div>
        </div>
        <div class="navbar-center">
          <Link  href="/" class="btn btn-ghost normal-case text-xl rounded-xl   ">Smart canteen</Link>
        </div>
        <div class="navbar-end">
            <div class="mx-2 text-xl font-medium">
                <span>Welcome Back, {{ name }}</span>
            </div>
            <div class="mx-2">
                <Link as="button" href="/logout" method="Post" class="btn btn-ghost rounded-lg">Logout</Link>
            </div>
        </div>
      </div>
</template>
<script>
import { Link } from '@inertiajs/vue3';
import { computed } from 'vue';
export default {
    components:{
        Link
    },
    computed:{
        name(){
            return this.$page.props.auth.user.name
        }
    }
}
</script>
<style lang="">
    
</style>