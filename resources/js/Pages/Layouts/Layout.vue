<template>
       <NavbarVue/>
       <div class="p-10">
           <slot/> 
       </div>
</template>
<script>
import NavbarVue from './Navbar.vue'
export default {
    components:{
        NavbarVue
    }
}
</script>
<style lang="">
    
</style>