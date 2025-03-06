<script setup>
import { ref } from "vue";

const users = ref([]);
const name = ref("");
const orderby = ref("");
const limit = ref("");
const offset = ref("");

const getUsers = async () => {
    fetch(
        `http://localhost:8000/api/users?orderby=${orderby.value}&limit=${limit.value}&name=${name.value}&offset=${offset.value}`
    )
        .then((res) => res.json())
        .then((data) => (users.value = data.data));
};
</script>
<template>
    <div>
        <div class="flex flex-row justify-between align-center">
            <button @click="getUsers" class="btn btn-success">Get Users</button>
            <label for="name" class="self-center">Vardas</label>
            <input v-model="name" type="text" id="name" class="rounded p-2" />
            <label for="order" class="self-center">Ieškoti nuo</label>
            <select id="order" class="rounded" v-model="orderby">
                <option value="desc">galo</option>
                <option value="asc">pradžios</option>
            </select>
            <label for="limit" class="self-center">Limitas</label>
            <select id="limit" class="rounded" v-model="limit">
                <option value="10">10</option>
                <option value="50">50</option>
                <option value="100">100</option>
                <option value="500">500</option>
            </select>
            <label for="offset" class="self-center">Praleisti</label>
            <select id="offset" class="rounded" v-model="offset">
                <option :value="limit * 0">1</option>
                <option :value="limit * 1">2</option>
                <option :value="limit * 2">3</option>
                <option :value="limit * 3">4</option>
                <option :value="limit * 4">5</option>
            </select>
        </div>

        <table
            v-if="users.length > 0"
            class="table table-bordered border-gray-200 border-2 mt-4"
        >
            <thead>
                <tr class="bg-gray-200">
                    <th>ID</th>
                    <th>Name</th>
                    <th>Surname</th>
                    <th>Email</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                </tr>
            </thead>
            <tbody class="table-body">
                <tr
                    v-for="user in users"
                    :key="user.id"
                    class="table-row table-row-bordered border-gray-200 border-2"
                >
                    <td>{{ user.id }}</td>
                    <td>{{ user.name }}</td>
                    <td>{{ user.surname }}</td>
                    <td>{{ user.email }}</td>
                    <td>{{ user.created_at }}</td>
                    <td>{{ user.updated_at }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</template>
<style scoped></style>
