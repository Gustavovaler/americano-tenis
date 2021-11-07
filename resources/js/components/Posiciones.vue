<template>
    <div>
        posiciones lista
    </div>
</template>

<script>
import axios from 'axios'
export default {
    data() {
        return {
            posiciones_list:[]

        }
    },
    created() {
        axios.get(`${process.env.MIX_APP_URL}/posiciones`)
            .then(res => {
                this.posiciones_list = res.data;
            }).catch(console.error)
    },
}
</script>

<style scoped>

</style>
