<script setup></script>

<template>
    <div
        class="min-h-screen flex flex-col bg-base-200 text-gray-900 dark:bg-gray-900 dark:text-gray-100"
    >
        <!-- Navigacija -->
        <nav class="bg-gray-400 text-white p-4 shadow-md">
            <div
                class="container mx-auto flex flex-row justify-between items-center"
            >
                <h1 class="text-xl font-bold">Vue 3 App</h1>
                <ul class="flex flex-row space-x-4">
                    <li>
                        <router-link to="/" class="hover:underline"
                            >Home</router-link
                        >
                    </li>
                    <li>
                        <router-link to="/about" class="hover:underline"
                            >About</router-link
                        >
                    </li>
                </ul>
            </div>
        </nav>

        <!-- Pagrindinis turinys -->
        <main class="flex-grow container mx-auto pt-4">
            <router-view></router-view>
        </main>

        <!-- Poraštė -->
        <footer class="bg-gray-800 text-white text-center p-4 mt-4">
            &copy; {{ new Date().getFullYear() }} Vue 3 App. All rights
            reserved.
        </footer>
    </div>
</template>

<style scoped>
/* Papildomi stiliai jei reikia */
</style>
