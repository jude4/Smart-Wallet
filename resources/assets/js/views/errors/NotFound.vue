<template>
    <v-container class="text-center">
        <h2>
            404|Page Not Found
        </h2>
        <p>
            Woops! Looks like the page you requested cannot be found.
            <router-link :to="{name: 'home', path: '/'}">Home Page</router-link>
        </p>
    </v-container>
</template>