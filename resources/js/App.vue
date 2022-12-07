<template>
    <router-view></router-view>
</template>
<script>
import {useStore} from "vuex";
import {onMounted} from "vue";

export default {
    setup(){
        const store=useStore();

        onMounted(()=>{
            store.dispatch('getAuthToken')
        })
    }
}
</script>

<style>
</style>
