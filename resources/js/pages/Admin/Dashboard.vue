<script setup>
import { ref, watch, onMounted } from 'vue';
import { router, useForm } from '@inertiajs/vue3';

const props = defineProps({
    stats: Object,
    users: Array,
    filters: Object
});

// 1. Search Logic
const search = ref(props.filters?.search || '');
let timeout = null;

watch(search, (value) => {
    clearTimeout(timeout);
    timeout = setTimeout(() => {
        router.get('/admin/dashboard', { search: value }, {
            preserveState: true,
            replace: true,
            preserveScroll: true
        });
    }, 500);
});

// 2. User Detail Modal Logic
const selectedUser = ref(null);
const viewUser = (user) => {
    selectedUser.value = user;
};

// 3. Notification Logic
const notifyForm = useForm({
    message: ''
});

const sendNotification = () => {
    if (!notifyForm.message) return alert("Please enter a message!");
    notifyForm.post('/admin/notify', {
        onSuccess: () => {
            notifyForm.reset();
            alert('Broadcast sent successfully!');
        }
    });
};

// 4. Delete Logic
const deleteUser = (id) => {
    if (confirm('Are you sure you want to delete this user?')) {
        router.delete(`/admin/users/${id}`);
    }
};

onMounted(() => {
    console.log("Admin Dashboard Loaded Successfully");
});
</script>

<template>
    <div class="min-h-screen bg-slate-950 text-slate-200 p-6">
        <div class="max-w-7xl mx-auto">

            <div class="mb-8 bg-indigo-600/10 border border-indigo-500/20 p-4 rounded-2xl flex gap-4 items-center">
                <input v-model="notifyForm.message" type="text" placeholder="Send a message to all users..."
                    class="flex-1 bg-slate-900 border-slate-700 rounded-xl text-sm focus:ring-indigo-500 text-white px-4 py-2">
                <button @click="sendNotification" :disabled="notifyForm.processing"
                    class="bg-indigo-600 hover:bg-indigo-500 px-6 py-2 rounded-xl text-sm font-bold transition-all disabled:opacity-50 text-white">
                    Broadcast
                </button>
            </div>

            <div class="mb-10 flex flex-col md:flex-row justify-between items-center gap-4">
                <h1 class="text-3xl font-bold text-white">Admin Dashboard</h1>
                <input v-model="search" type="text" placeholder="Search by name or email..."
                    class="bg-slate-900 border-slate-800 rounded-xl px-4 py-2 text-sm w-full md:w-80 text-white">
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">
                <div v-for="(val, label) in stats" :key="label"
                    class="bg-slate-900 border border-slate-800 p-6 rounded-2xl">
                    <p class="text-slate-400 text-xs uppercase mb-1">{{ label }}</p>
                    <p class="text-3xl font-bold text-white">{{ val }}</p>
                </div>
            </div>

            <div class="bg-slate-900 border border-slate-800 rounded-2xl overflow-hidden">
                <table class="w-full text-left">
                    <thead class="bg-slate-800/50 text-slate-400 text-xs uppercase font-bold">
                        <tr>
                            <th class="p-4">User</th>
                            <th class="p-4">Email</th>
                            <th class="p-4 text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-800">
                        <tr v-for="user in users" :key="user.id" class="hover:bg-slate-800/30">
                            <td class="p-4">{{ user.fullname }}</td>
                            <td class="p-4 text-slate-400">{{ user.email }}</td>
                            <td class="p-4 text-right">
                                <button @click="viewUser(user)"
                                    class="text-indigo-400 mr-4 text-sm font-bold">Details</button>
                                <button @click="deleteUser(user.id)"
                                    class="text-red-500 text-sm font-bold">Delete</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div v-if="selectedUser"
                class="fixed inset-0 bg-black/70 backdrop-blur-sm flex items-center justify-center p-4 z-50">
                <div class="bg-slate-900 border border-slate-800 p-8 rounded-3xl max-w-sm w-full relative">
                    <h2 class="text-2xl font-bold text-white mb-2">{{ selectedUser.fullname }}</h2>
                    <p class="text-slate-400 mb-6">{{ selectedUser.email }}</p>
                    <div class="flex justify-between text-sm">
                        <span class="text-slate-500">Account ID:</span>
                        <span class="text-slate-200">#{{ selectedUser?.id }}</span>
                    </div>
                    <button @click="selectedUser = null"
                        class="w-full bg-slate-800 py-3 rounded-xl font-bold text-white">Close</button>
                </div>
            </div>

        </div>
    </div>
</template>