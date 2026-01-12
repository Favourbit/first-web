<script setup>
import { ref, computed } from 'vue';
import Sidebar from '@/components/Sidebar.vue';
import Header from '@/components/Header1.vue';

// 1. Mock Data (In a real app, this would come from your Laravel API)
const allTransactions = ref([
    { id: 18, date: '2023-10-25', cat: 'House Access.', amt: 106000, type: 'Expense', status: 'Completed' },
    { id: 17, date: '2023-10-24', cat: 'Kitchen Equip.', amt: 5000, type: 'Expense', status: 'Completed' },
    { id: 16, date: '2023-10-24', cat: 'Shoes', amt: 16000, type: 'Expense', status: 'Pending' },
    { id: 15, date: '2023-10-23', cat: 'Deposit', amt: 500000, type: 'Income', status: 'Completed' },
    { id: 14, date: '2023-10-22', cat: 'Books', amt: 15000, type: 'Expense', status: 'Completed' },
    { id: 13, date: '2023-10-21', cat: 'Groceries', amt: 4450, type: 'Expense', status: 'Completed' },
]);

const searchQuery = ref('');

// 2. Filter Logic
const filteredTransactions = computed(() => {
    return allTransactions.value.filter(t => 
        t.cat.toLowerCase().includes(searchQuery.value.toLowerCase())
    );
});

// 3. Export Logic (Simple CSV version for now)
const downloadCSV = () => {
    const headers = "ID,Date,Category,Amount,Type,Status\n";
    const rows = filteredTransactions.value.map(t => 
        `${t.id},${t.date},${t.cat},${t.amt},${t.type},${t.status}`
    ).join("\n");
    
    const blob = new Blob([headers + rows], { type: 'text/csv' });
    const url = window.URL.createObjectURL(blob);
    const a = document.createElement('a');
    a.setAttribute('href', url);
    a.setAttribute('download', 'transactions_report.csv');
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
                            <td class="date-col">{{ t.date }}</td>
                            <td class="cat-col">
                                <span class="cat-icon"></span> {{ t.cat }}
                            </td>
                            <td>
                                <span :class="['status-pill', t.status.toLowerCase()]">
                                    {{ t.status }}
                                </span>
                            </td>
                            <td>{{ t.type }}</td>
                            <td :class="['amt-col', t.type === 'Income' ? 'income' : 'expense']">
                                {{ t.type === 'Income' ? '+' : '-' }} {{ t.amt.toLocaleString() }} FCFA
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
.layout { display: flex; background: #f9fafb; height: 100vh; overflow: hidden; }
.main-content { margin-left: 80px; flex: 1; padding: 30px; display: flex; flex-direction: column; }

/* Header Section */
.trans-page-header {
    display: flex;
    justify-content: space-between;
    align-items: flex-end;
    margin-bottom: 30px;
}
.main-title { font-family: 'Poppins'; font-size: 32px; font-weight: 800; }
.lime-text { color: #B4E466; }
.sub-text { color: #666; font-weight: 500; }

/* Actions */
.action-bar { display: flex; gap: 15px; }
.search-box {
    background: white;
    border: 1.5px solid #000;
    border-radius: 12px;
    padding: 10px 15px;
    display: flex;
    align-items: center;
    gap: 10px;
}
.search-box input { border: none; outline: none; font-family: 'Poppins'; width: 200px; }

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
.download-btn:hover { background: #9E3FFC; transform: translateY(-2px); }

/* Table Box */
.full-table-box {
    background: white;
    border: 1px solid #000;
    border-radius: 15px;
    flex: 1;
    overflow-y: auto;
    /* box-shadow: 8px 8px 0px #000; Neobrutalist style */
}

.styled-table { width: 100%; border-collapse: collapse; text-align: left; }
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

.styled-table td { padding: 20px; border-bottom: 1px solid #eee; font-family: 'Poppins'; font-size: 15px; }

/* Status & Colors */
.status-pill {
    padding: 4px 12px;
    border-radius: 50px;
    font-size: 12px;
    font-weight: 600;
}
.status-pill.completed { background: #e9fdca; color: #4e7a00; }
.status-pill.pending { background: #fff4ca; color: #856a00; }

.amt-col { font-weight: 800; }
.income { color: #2ecc71; }
.expense { color: #000; }

.empty-state { padding: 50px; text-align: center; color: #888; }

@media (max-width: 900px) {
    .trans-page-header { flex-direction: column; align-items: flex-start; gap: 20px; }
    .action-bar { width: 100%; }
    .search-box { flex: 1; }
}
</style>