<template>
    <router-link :to="'/login'">Login</router-link>
    <h1>Dashboard</h1>
    <button @click="getInformations">Obtenir mes informations</button>
    <div v-if="isAdmin">{{ information }}</div>
</template>

<script>
import { ref, computed, onMounted } from '@vue/runtime-core';
import axiosClient from '../api/index';
import store from '../store';

export default {
    name: "Dashboard",
    setup() {
        const information = ref(null);

        const getInformations = async() => {
            await axiosClient.post('/privateInformations')
                .then(res => {
                    console.log(res)
                    information.value = res.data.information
                    console.log(information)
                })
                .catch(err => console.log("error=>", err));
        }

        const getRole = () => {
            store.dispatch('getUserRole');
        }

        onMounted(() => {
            getRole();
            console.log('dashboard');
        });

        return {
            getInformations,
            isAdmin: computed(() => store.state.user.role),
            information
        }
    }
}
</script>
