<template>
    <router-link :to="'/login'">Login</router-link>
    <h1>Dashboard</h1>
    <button @click="getInformations">Obtenir mes informations</button>
    <div v-show="information">{{ information }}</div>
</template>

<script>
import axiosClient from '../api/index';
export default {
    name: "Dashboard",
    data() {
        return {
            information: '',
        }
    },
    methods: {
        getInformations() {
            axiosClient.post('/privateInformations')
                .then(res => {
                    console.log(res)
                    this.information = res.data.information
                    console.log(this.information)
                })
                .catch(err => console.log(err));
        }
    }
}
</script>
