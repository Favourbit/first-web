<script setup>
import Sidebar from '@/components/Sidebar.vue';
import Header from '@/components/Header1.vue';
import { Link, useForm } from '@inertiajs/vue3';
import { ref } from 'vue';

// 1. Receive dynamic data from Laravel
const props = defineProps({
    transactions: { type: Array, default: () => [{description: 'Test Item', amount: 1000, category: 'Food'}] },
    balance: { type: Number, default: 0}
});

// 2. Control the Popup visibility
const showModal = ref(false);

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
// 3. Setup the manual data form
const form = useForm({
    item_id: '',       // Optional Ref # or Receipt ID
    description: '',
    amount: null,
    type: 'expense',   // 'income' for deposits, 'expense' for purchases
    category: 'General',
    transaction_time: new Date().toISOString().slice(0, 16),
});

// 4. Open Modal and set the transaction mode
const openModal = (type) => {
    form.reset();
    form.type = type;
    form.transaction_time = new Date().toISOString().slice(0, 16);

    if (type === 'income') {
        form.category = 'Personal Deposit';
        form.description = 'Manual Cash In';
    }
    showModal.value = true;
};

// 5. Submit to Backend (Reduces/Adds money in database)
const submitTransaction = () => {
    // console.log("Form data being sent:", form.data()); // Optional: check data in console

    form.post('/transactions', {
        preserveScroll: true,
        onSuccess: () => {
            showModal.value = false;
            form.reset();
            alert("Saved to Database!");
        },
        onError: (errors) => {
            console.log("Database refused the data:", errors);
            alert("Error: Check the console red text.");
        }
    });
};
const formatNumber = (num) => new Intl.NumberFormat().format(num);
</script>

<template>
    <div class="layout">
        <Sidebar />
        <div class="main-content">
            <Header />
            <div class="dashboard-grid">
                <section class="left-col">
                    <div class="welcome">
                        <h1>welcome {{ $page.props.auth.user.fullname }}!</h1>
                        <p>manual expense ledger</p>
                    </div>

                    <div class="box-cont">
                        <div class="balance-card">
                            <div class="bal-text">
                                <h2>{{ (props.balance || 0).toLocaleString() }} FCFA</h2>
                                <p>Visual Balance</p>
                            </div>
                            <div class="bal-icon">
                                <i class="fa-solid fa-wallet fa-2xl" style="color: #ffffff;"></i>
                            </div>
                        </div>
                        <div class="action-aside">
                            <button @click="openModal('income')" class="v-btn">DEPOSIT</button>
                            <button @click="openModal('expense')" class="v-btn">PURCHASE</button>
                        </div>
                    </div>

                    <div class="chart-box">
                        <div class="chart-labels"><span>Flow</span><span>Summary</span></div>
                        <div class="chart-visual">
                            <p style="text-align: center; color: #ccc; margin-top: 50px;">Daily Visual Tracking</p>
                        </div>
                    </div>
                </section>

                <section class="right-col">
                    <div class="trans-box">
                        <div class="trans-header">
                            <h3>Transaction History</h3>
                            <Link href="/transaction"><button class="view-all">View All</button></Link>
                        </div>
                        <div class="table-responsive">
                            <table class="trans-table">
                                <thead>
                                    <tr>
                                        <th>Category</th>
                                        <th>Amount</th>
                                        <th>Date</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <tr v-for="transaction in props.transactions" :key="transaction.id">
                                        <td>{{ transaction.category }}</td>
                                        <td :class="transaction.type === 'income' ? 'text-blue' : 'text-red'"
                                            class="amt-bold">
                                            {{ transaction.type === 'income' ? '+' : '-' }}
                                            {{ formatNumber(transaction.amount) }}
                                        </td>
                                        <td>{{ new Date(transaction.transaction_time).toLocaleDateString() }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </section>
            </div>
        </div>

        <div v-if="showModal" class="modal-overlay">
            <div class="modal-window">
                <div class="modal-header">
                    <h3>{{ form.type === 'income' ? 'Input Deposit' : 'Input Purchase' }}</h3>
                </div>

                <div class="modal-body">
                    <div class="f-group" v-if="form.type === 'expense'">
                        <label>What did you buy?</label>
                        <input v-model="form.description" type="text" placeholder="e.g. Lunch, Taxi, Rent">
                    </div>

                    <div class="f-group">
                        <label>Amount (FCFA)</label>
                        <input v-model="form.amount" type="number" placeholder="Enter amount manually">
                    </div>

                    <div class="f-group" v-if="form.type === 'expense'">
                        <label>Category</label>
                        <select v-model="form.category">
                            <option value="Food">Food & Drinks</option>
                            <option value="Transport">Transport</option>
                            <option value="Health">Health</option>
                            <option value="Education">Education</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>

                    <div class="f-group">
                        <label>Ref / ID (Optional)</label>
                        <input v-model="form.item_id" type="text" placeholder="Reference number">
                    </div>
                </div>

                <div class="modal-actions">
                    <button @click="showModal = false" class="m-btn-cancel">Cancel</button>
                    <button type="button" @click.prevent="submitTransaction" class="m-btn-confirm">
                        Save Entry
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>

<style scoped>
/* (All original CSS provided in previous messages remains exactly the same) */
.layout {
    display: flex;
    background: #f9fafb;
    height: 100vh;
    overflow: hidden;
}

.main-content {
    margin-left: 80px;
    flex: 1;
    padding: 25px;
    display: flex;
    flex-direction: column;
    height: 100vh;
    box-sizing: border-box;
}

.dashboard-grid {
    display: grid;
    grid-template-columns: 1.2fr 1fr;
    gap: 30px;
    flex: 1;
    min-height: 0;
}

.left-col {
    display: flex;
    flex-direction: column;
    height: 100%;
}

.welcome {
    font-family: 'Poppins', sans-serif;
    margin-left: 20px;
    margin-bottom: 10px;
}

.welcome h1 {
    font-size: 32px;
    line-height: 40px;
    font-weight: 600;
    margin: 0;
}

.welcome p {
    font-size: 16px;
    font-weight: 700;
    color: #11111193;
    margin: 0;
}

.box-cont {
    display: flex;
    gap: 10px;
    align-items: stretch;
    margin-bottom: 20px;
}

.balance-card {
    background: linear-gradient(90deg, #9E3FFC 46.48%, #408BFA 100%);
    color: white;
    padding: 30px 40px;
    border-radius: 20px;
    display: flex;
    flex: 1;
    justify-content: space-between;
    align-items: center;
    box-shadow: 0 4px 15px rgba(158, 63, 252, 0.1);
}

.bal-text h2 {
    font-family: 'Poppins', sans-serif;
    font-size: 32px;
    font-weight: 700;
    margin: 0;
}

.bal-text p {
    font-family: 'Poppins', sans-serif;
    font-size: 26px;
    color: #000;
    font-weight: 600;
    margin: 0;
}

.chart-box {
    background: white;
    border: 1px solid #ddd;
    border-radius: 20px;
    padding: 20px;
    flex: 1;
    margin-bottom: 25px;
    display: flex;
    flex-direction: column;
}

.chart-labels {
    display: flex;
    justify-content: space-between;
    font-family: 'Poppins', sans-serif;
    font-weight: 600;
    color: #666;
    margin-bottom: 15px;
}

.right-col {
    height: 100%;
    min-height: 0;
    padding-bottom: 25px;
}

.trans-box {
    background: #000;
    color: #fff;
    padding: 25px;
    border-radius: 20px;
    height: 100%;
    display: flex;
    flex-direction: column;
}

.trans-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 15px;
}

.view-all {
    background: #333;
    color: white;
    border: none;
    padding: 5px 12px;
    border-radius: 8px;
    font-size: 12px;
    cursor: pointer;
}

.table-responsive {
    flex: 1;
    overflow-y: auto;
}

.trans-table {
    width: 100%;
    border-collapse: collapse;
}

.trans-table th {
    text-align: left;
    color: #888;
    font-size: 13px;
    padding-bottom: 12px;
    border-bottom: 1px solid #333;
}

.trans-table td {
    padding: 15px 0;
    border-bottom: 1px solid #222;
    font-size: 13px;
}

.amt-bold {
    font-weight: 700;
}

.text-blue {
    color: #408BFA;
}

.text-red {
    color: #ff4d4d;
}

.action-aside {
    display: flex;
    flex-direction: column;
    color: #fff;
    gap: 5px;
}

.v-btn {
    background-color: #000;
    color: #fff;
    border-radius: 15px;
    padding: 15px;
    cursor: pointer;
    border: none;
    font-weight: bold;
}

.modal-overlay {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.8);
    display: flex;
    justify-content: center;
    align-items: center;
    z-index: 9999;
}

.modal-window {
    background: white;
    color: #333;
    padding: 30px;
    border-radius: 25px;
    width: 400px;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
    font-family: 'Poppins', sans-serif;
}

.modal-header h3 {
    margin: 0;
    font-size: 22px;
    font-weight: 700;
}

.modal-body {
    display: flex;
    flex-direction: column;
    gap: 15px;
    margin: 20px 0;
}

.f-group {
    display: flex;
    flex-direction: column;
    gap: 5px;
}

.f-group label {
    font-size: 12px;
    font-weight: bold;
    color: #888;
    text-transform: uppercase;
}

.f-group input,
.f-group select {
    padding: 12px;
    border: 1px solid #eee;
    border-radius: 12px;
    background: #f9f9f9;
}

.modal-actions {
    display: flex;
    gap: 10px;
}

.m-btn-cancel {
    flex: 1;
    padding: 12px;
    border: none;
    background: #eee;
    border-radius: 12px;
    cursor: pointer;
}

.m-btn-confirm {
    flex: 2;
    padding: 12px;
    border: none;
    background: #000;
    color: #fff;
    border-radius: 12px;
    cursor: pointer;
    font-weight: bold;
}
</style>