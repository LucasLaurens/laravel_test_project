<template>
    <div>
        <router-link :to="'/privateInformations'">Dashboard</router-link>
        <h1>login</h1>
        <form @submit.prevent="login">
            <input type="email" name="email" v-model="email">
            <input type="password" name="password" v-model="password">
            <button type="submit">Se connecter</button>
        </form>
    </div>
</template>

<script>
import store from '../store';

export default {
    data() {
        return {
            email: '',
            password: '',
        }
    },
    methods: {
        login() {
            axios.post('api/login', {
                email: this.email,
                password: this.password
            })
                .then(res => {
                    store.state.user.token = res.data.token;
                    localStorage.setItem('auth-token', res.data.token);
                })
                .catch(err => console.log(err));
        }
    }
}
</script>
