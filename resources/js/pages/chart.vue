<script setup>
import { ref, watch } from 'vue';
import Sidebar from '@/components/Sidebar.vue';
import Header from '@/components/Header1.vue';
import { Line, Doughnut } from 'vue-chartjs';
import { 
    Chart as ChartJS, Title, Tooltip, Legend, LineElement, CategoryScale, 
    LinearScale, PointElement, ArcElement, Filler 
} from 'chart.js';

ChartJS.register(Title, Tooltip, Legend, LineElement, CategoryScale, LinearScale, PointElement, ArcElement, Filler);

// 1. STATE FOR THE ACTIVE FILTER
const activeFilter = ref('Weekly');

// 2. MOCK DATA FOR DIFFERENT TIME PERIODS
const dataSets = {
    Weekly: {
        labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
        data: [4500, 15000, 35000, 16000, 5000, 106000, 20000]
    },
    Monthly: {
        labels: ['Week 1', 'Week 2', 'Week 3', 'Week 4'],
        data: [150000, 230000, 120000, 180000]
    },
    Yearly: {
        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
        data: [1.2, 1.5, 1.1, 1.8, 2.1, 1.9, 2.5, 2.2, 3.0, 2.8, 3.5, 4.0].map(v => v * 100000)
    }
};

// 3. REACTIVE CHART DATA (Changes when activeFilter changes)
const chartData = ref({
    labels: dataSets.Weekly.labels,
    datasets: [{
        label: 'Spending (FCFA)',
        backgroundColor: 'rgba(158, 63, 252, 0.2)',
        borderColor: '#9E3FFC',
        borderWidth: 3,
        tension: 0.4,
        fill: true,
        data: dataSets.Weekly.data
    }]
});

// Update the chart when user clicks buttons
const updateFilter = (filter) => {
    activeFilter.value = filter;
    chartData.value = {
        labels: dataSets[filter].labels,
        datasets: [{
            ...chartData.value.datasets[0],
            data: dataSets[filter].data
        }]
    };
};

const doughnutData = {
    labels: ['Groceries', 'Shopping', 'Equipment', 'Others'],
    datasets: [{
        backgroundColor: ['#B4E466', '#408BFA', '#9E3FFC', '#000'],
        data: [4450, 51000, 111000, 20000]
    }]
};

const options = {
    responsive: true,
    maintainAspectRatio: false,
    plugins: { legend: { display: false } }
};
</script>

<template>
    <div class="layout">
        <Sidebar />
        <div class="main-content">
            <Header />

            <div class="chart-header">
                <h1 class="chart-title">Visual <span class="span-class">Analytics</span></h1>
                
                <div class="filter-group">
                    <button 
                        v-for="f in ['Weekly', 'Monthly', 'Yearly']" 
                        :key="f"
                        @click="updateFilter(f)"
                        :class="['filter-btn', { active: activeFilter === f }]"
                    >
                        {{ f }}
                    </button>
                </div>
            </div>

            <div class="analytics-grid">
                <div class="card main-card">
                    <div class="card-text">
                        <h3>{{ activeFilter }} Spending Trend</h3>
                        <p class="amt-label">Total: 186,450 FCFA</p>
                    </div>
                    <div class="chart-wrapper">
                        <Line :data="chartData" :options="options" />
                    </div>
                </div>

                <div class="card side-card">
                    <h3>Top Categories</h3>
                    <div class="chart-wrapper">
                        <Doughnut :data="doughnutData" :options="options" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<style scoped>
.layout { display: flex; background: #f9fafb; height: 100vh; overflow: hidden; }
.main-content { margin-left: 80px; flex: 1; padding: 30px; display: flex; flex-direction: column; }

.chart-header { display: flex; justify-content: space-between; align-items: center; margin-bottom: 25px; }
.chart-title { font-family: 'Poppins'; font-size: 32px; font-weight: 700; }
.span-class { color: #B4E466; }

/* Filter Pill Buttons */
.filter-group { background: #eee; padding: 4px; border-radius: 12px; display: flex; }
.filter-btn {
    border: none; padding: 8px 16px; border-radius: 8px; cursor: pointer;
    font-family: 'Poppins'; font-weight: 600; background: transparent; transition: 0.3s;
}
.filter-btn.active { background: #000; color: #fff; box-shadow: 0 4px 10px rgba(0,0,0,0.1); }

/* Dashboard Cards */
.analytics-grid { 
    display: grid; 
    grid-template-columns: 2fr 1fr;
     gap: 25px;
      flex: 1;
     
     }
.card {
    background: white; border: 1.5px solid #000; 
    border-radius: 15px;
    padding: 25px; 
    /* box-shadow: 6px 6px 0px #000;   Neobrutalist Shadow */
    display: flex;
     flex-direction: column;
     overflow-y: auto;
}

.amt-label { font-size: 24px; font-weight: 700; color: #408BFA; margin-bottom: 15px; }
.chart-wrapper { flex: 1; min-height: 250px; position: relative; }

@media (max-width: 1100px) {
    .analytics-grid { grid-template-columns: 1fr; overflow-y: auto; }
}
</style>