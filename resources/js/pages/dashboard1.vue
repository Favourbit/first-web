<script setup>
import Sidebar from '@/components/Sidebar.vue';
import Header from '@/components/Header1.vue';
import { Link } from '@inertiajs/vue3';

const transactions = [
    { no: 13, cat: 'Groceries', amt: '4,450', time: '13:45pm' },
    { no: 14, cat: 'Books', amt: '15,000', time: '20:00pm' },
    { no: 15, cat: 'cloths', amt: '35,000', time: '7:25am' },
    { no: 16, cat: 'shoes', amt: '16,000', time: '11:30am' },
    { no: 17, cat: 'kitchen equip', amt: '5,000', time: '15:15pm' },
    { no: 18, cat: 'house assec', amt: '106,000', time: '17:05pm' },
];
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
                        <p>manage your finance</p>
                    </div>

                    <div class="box-cont">
                        <div class="balance-card">
                            <div class="bal-text">
                                <h2>100,500 FCFA</h2>
                                <p>Balance</p>
                            </div>
                            <div class="bal-icon">
                                <i class="fa-solid fa-wallet fa-2xl" style="color: #ffffff;"></i>
                            </div>
                        </div>
                        <div class="action-aside">
                            <button class="v-btn">ADD</button>
                            <button class="v-btn">SUBS</button>
                        </div>
                    </div>

                    <div class="chart-box">
                        <div class="chart-labels">
                            <span>Amt</span>
                            <span>Time</span>
                        </div>
                        <div class="chart-visual"></div>
                    </div>
                </section>

                <section class="right-col">
                    <div class="trans-box">
                        <div class="trans-header">
                            <h3>Recent transactions</h3>
                            <Link href="/transaction">
                            <button class="view-all">View All</button>
                        </Link>
                        </div>
                        <div class="table-responsive">
                            <table class="trans-table">
                                <thead>
                                    <tr>
                                        <th>NO</th>
                                        <th>Categories</th>
                                        <th>Amount</th>
                                        <th>Time</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="t in transactions" :key="t.no">
                                        <td>{{ t.no }}</td>
                                        <td>{{ t.cat }}</td>
                                        <td class="amt-bold">{{ t.amt }}</td>
                                        <td>{{ t.time }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</template>

<style scoped>
/* Full Screen Layout */
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

/* Welcome Text Styles */
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

/* Balance Card Styles */
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
    /* Reduced Shadow */
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

/* Chart Box Styles */
.chart-box {
    background: white;
    border: 1px solid #ddd;
    border-radius: 20px;
    padding: 20px;
    flex: 1;
    margin-bottom: 25px;
    /* Margin at bottom of left col */
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

/* Transaction Box & Table Lines Fix */
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
    /* Table Lines */
}

.trans-table td {
    padding: 15px 0;
    border-bottom: 1px solid #222;
    /* Table Lines */
    font-size: 13px;
}

.amt-bold {
    font-weight: 700;
    color: #408BFA;
}

/* Action Buttons */
.action-aside{
    display: flex;
    flex-direction: column;
    color: #fff;
    gap: 5px;
}
.v-btn{
    background-color: #000;
    color: #fff;
    border-radius: 15px;
    padding: 15px;
}




/* Responsive Queries */
@media (max-width: 1100px) {
    .layout {
        height: auto;
        overflow: visible;
    }

    .dashboard-grid {
        grid-template-columns: 1fr;
    }

    .main-content {
        height: auto;
    }
}

@media (max-width: 768px) {
    .main-content {
        margin-left: 80px;
        padding: 15px;
    }

    .box-cont {
        flex-direction: column;
    }

    .action-aside {
        flex-direction: row;
        width: 100%;
    }

    .v-btn {
        writing-mode: horizontal-tb;
        transform: rotate(0deg);
        flex: 1;
    }
}
</style>