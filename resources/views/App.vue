<template>
    <div>
        <h1>Welcome to the Compound</h1>

        <p>
            <router-link :to="{ name: 'home' }">Home</router-link> |
            <router-link :to="{ name: 'food' }">Food Inventory</router-link>
            <router-link :to="{ name: 'tools' }">Tool Inventory</router-link>
        </p>

        <div class="container">
            <router-view></router-view>
        </div>
    </div>
</template>
<script>
    export default {}
</script>
