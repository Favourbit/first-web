<script setup>
import { ref, computed } from 'vue';
import Sidebar from '@/components/Sidebar.vue';
import Header from '@/components/Header1.vue';

// 1. Receive data from Laravel
const props = defineProps({
    transactions: Array
});

// 1. Add a processing state
const isProcessing = ref(false);

const submitDeposit = () => {
    if (isProcessing.value) return; // Stop if already running
    
    isProcessing.value = true;
    
    router.post('/transactions', form, {
        onFinish: () => {
            isProcessing.value = false; // Re-enable when done
        }
    });
};

// ADD THIS LINE
console.log("Check this in F12 Console:", props.transactions);
const searchQuery = ref('');

// 2. Filter Logic (Updated to use props.transactions)
const filteredTransactions = computed(() => {
    if (!props.transactions) return [];
    return props.transactions.filter(t =>
        t.description.toLowerCase().includes(searchQuery.value.toLowerCase()) ||
        t.category.toLowerCase().includes(searchQuery.value.toLowerCase())
    );
});

// 3. Export Logic (Updated keys to match your DB columns)
const downloadCSV = () => {
    const headers = "Date,Description,Category,Amount,Type\n";
    const rows = filteredTransactions.value.map(t =>
        `${t.transaction_time},${t.description},${t.category},${t.amount},${t.type}`
    ).join("\n");

    const blob = new Blob([headers + rows], { type: 'text/csv' });
    const url = window.URL.createObjectURL(blob);
    const a = document.createElement('a');
    a.href = url;
    a.download = 'my_transactions.csv';
    a.click();
};
</script>


<template>
    <div class="layout">
        <Sidebar />

        <div class="main-content">
            <Header />

            <div class="trans-page-header">
                <div>
                    <h1 class="main-title">Transaction <span class="lime-text">History</span></h1>
                    <p class="sub-text">Viewing {{ filteredTransactions.length }} total records</p>
                </div>

                <div class="action-bar">
                    <div class="search-box">
                        <i class="fa-solid fa-magnifying-glass"></i>
                        <input v-model="searchQuery" type="text" placeholder="Search categories...">
                    </div>
                    <button @click="downloadCSV" class="download-btn">
                        <i class="fa-solid fa-file-export"></i> Export CSV
                    </button>
                </div>
            </div>

            <div class="full-table-box">
                <table class="styled-table">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Category</th>
                            <th>Status</th>
                            <th>Type</th>
                            <th>Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="t in filteredTransactions" :key="t.id">
                            <td class="date-col">{{ new Date(t.transaction_time).toLocaleDateString() }}</td>
                            <td class="cat-col">
                                <strong>{{ t.description }}</strong><br>
                                <small>{{ t.category }}</small>
                            </td>
                            <td>
                                <span class="status-pill completed">Completed</span>
                            </td>
                            <td>{{ t.type }}</td>
                            <td :class="['amt-col', t.type === 'income' ? 'income' : 'expense']">
                                {{ t.type === 'income' ? '+' : '-' }} {{ t.amount.toLocaleString() }} FCFA
                            </td>
                        </tr>
                    </tbody>
                </table>

                <div v-if="filteredTransactions.length === 0" class="empty-state">
                    <p>No transactions found matching "{{ searchQuery }}"</p>
                </div>
            </div>
        </div>
    </div>
</template>

<style scoped>
.layout {
    display: flex;
    background: #f9fafb;
    height: 100vh;
    overflow: hidden;
}

.main-content {
    margin-left: 80px;
    flex: 1;
    padding: 30px;
    display: flex;
    flex-direction: column;
}

/* Header Section */
.trans-page-header {
    display: flex;
    justify-content: space-between;
    align-items: flex-end;
    margin-bottom: 30px;
}

.main-title {
    font-family: 'Poppins';
    font-size: 32px;
    font-weight: 800;
}

.lime-text {
    color: #B4E466;
}

.sub-text {
    color: #666;
    font-weight: 500;
}

/* Actions */
.action-bar {
    display: flex;
    gap: 15px;
}

.search-box {
    background: white;
    border: 1.5px solid #000;
    border-radius: 12px;
    padding: 10px 15px;
    display: flex;
    align-items: center;
    gap: 10px;
}

.search-box input {
    border: none;
    outline: none;
    font-family: 'Poppins';
    width: 200px;
}

.download-btn {
    background: #000;
    color: #fff;
    border: none;
    padding: 12px 20px;
    border-radius: 12px;
    font-weight: 600;
    cursor: pointer;
    transition: 0.3s;
    display: flex;
    align-items: center;
    gap: 8px;
}

.download-btn:hover {
    background: #9E3FFC;
    transform: translateY(-2px);
}

/* Table Box */
.full-table-box {
    background: white;
    border: 1px solid #000;
    border-radius: 15px;
    flex: 1;
    overflow-y: auto;
    /* box-shadow: 8px 8px 0px #000; Neobrutalist style */
}

.styled-table {
    width: 100%;
    border-collapse: collapse;
    text-align: left;
}

.styled-table th {
    padding: 20px;
    background: #f8f8f8;
    border-bottom: 2px solid #000;
    font-family: 'Poppins';
    font-weight: 700;
    text-transform: uppercase;
    font-size: 13px;
    letter-spacing: 1px;
}

.styled-table td {
    padding: 20px;
    border-bottom: 1px solid #eee;
    font-family: 'Poppins';
    font-size: 15px;
}

/* Status & Colors */
.status-pill {
    padding: 4px 12px;
    border-radius: 50px;
    font-size: 12px;
    font-weight: 600;
}

.status-pill.completed {
    background: #e9fdca;
    color: #4e7a00;
}

.status-pill.pending {
    background: #fff4ca;
    color: #856a00;
}

.amt-col {
    font-weight: 800;
}

.income {
    color: #2ecc71;
}

.expense {
    color: #000;
}

.empty-state {
    padding: 50px;
    text-align: center;
    color: #888;
}

@media (max-width: 900px) {
    .trans-page-header {
        flex-direction: column;
        align-items: flex-start;
        gap: 20px;
    }

    .action-bar {
        width: 100%;
    }

    .search-box {
        flex: 1;
    }
}
</style>