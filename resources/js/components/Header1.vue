<script setup>
    import { ref, computed } from 'vue'; 
    import { Link, usePage } from '@inertiajs/vue3';
    

</script>

<template>
  <header class="top-header">
    <div class="profile-section">
      <div class="notif-bell">
        <i class="fa-solid fa-bell fa-xl bell-icon"></i> 
        <span class="badge">+</span>
      </div>
      
      <span class="user-name">John Spake</span>
      <div class="avatar">👤</div>
    </div>
  </header>
</template>

<style scoped>
.top-header {
  background: white;
  border: 1px solid black;
  border-radius: 15px;
  padding: 12px 24px;
  display: flex;
  justify-content: flex-end;
  margin-bottom: 25px;
}

.profile-section { display: flex; align-items: center; gap: 15px; }

.notif-bell { 
  position: relative; 
  cursor: pointer;
  display: flex;
  align-items: center;
}

/* Base style for the bell icon */
.bell-icon {
  color: #000000;
  display: inline-block; /* VERY IMPORTANT: required for animations to work */
  transition: transform 0.2s ease;
}

/* Hover effect for the bell */
.notif-bell:hover .bell-icon {
  animation: shake-it 0.8s infinite;
  transform-origin: top center; /* Makes it swing from the top like a real bell */
}

.badge {
  position: absolute; 
  top: -5px; 
  right: -5px;
  background: black; 
  color: white; 
  font-size: 10px;
  width: 15px; 
  height: 15px; 
  border-radius: 50%;
  display: flex; 
  align-items: center; 
  justify-content: center;
}

.user-name { 
  font-weight: 600; 
  color: #374151; 
  border-left: 1px solid #ddd; 
  padding-left: 15px; 
}

.avatar { 
  width: 35px; 
  height: 35px; 
  background: #e5e7eb; 
  border-radius: 50%; 
  display: flex;
  align-items: center;
  justify-content: center;
}

/* Smooth swinging animation */
@keyframes shake-it {
  0% { transform: rotate(0deg); }
  20% { transform: rotate(15deg); }
  40% { transform: rotate(-15deg); }
  60% { transform: rotate(10deg); }
  80% { transform: rotate(-10deg); }
  100% { transform: rotate(0deg); }
}
</style>