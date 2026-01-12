<script setup>
  import { ref } from 'vue';
  import { usePage, router } from '@inertiajs/vue3';
//   import { router } from '@inertiajs/vue3';

// const markAsRead = () => {
//     router.post('/notifications/mark-as-read', {}, { preserveScroll: true });
// };
  const showNotifications = ref(false);
  
  // Function to mark notifications as read when they open the bell
  const toggleDropdown = () => {
    showNotifications.value = !showNotifications.value;
    
    if (showNotifications.value && usePage().props.auth.unreadCount > 0) {
        console.log("Attempting to mark as read..."); // Check your F12 console
        router.post('/notifications/mark-as-read', {}, { 
            preserveScroll: true,
            onSuccess: () => console.log("Success: Count should be 0 now")
        });
    }
};
  
  </script>

<template>
  <header class="top-header">
    <div class="profile-section">
      <div class="notif-bell" @click="toggleDropdown">
        <i class="fa-solid fa-bell fa-xl bell-icon"></i>
        
        <span v-if="$page.props.auth.unreadCount > 0" class="badge">
            {{ $page.props.auth.unreadCount }}
        </span>

        <div v-if="showNotifications" class="notif-dropdown" @click.stop>
            <div class="notif-header">Notifications</div>
            <div class="notif-body">
                <div v-if="$page.props.auth.notifications.length === 0" class="notif-empty">
                    No new notifications
                </div>
                
                <div v-for="notif in $page.props.auth.notifications" 
                     :key="notif.id" 
                     :class="['notif-item', { 'unread': !notif.read_at }]">
                    <p class="title">{{ notif.data.title }}</p>
                    <p class="msg">{{ notif.data.message }}</p>
                    <span class="time">{{ new Date(notif.created_at).toLocaleTimeString() }}</span>
                </div>
            </div>
        </div>
      </div>

      <span class="user-name">{{ $page.props.auth.user.fullname }}</span>
      <div class="header-profile">
        <img v-if="$page.props.auth.user.user_profile"
          :src="`data:image/jpeg;base64,${$page.props.auth.user.user_profile}`" class="header-avatar">
        <div v-else class="header-initial">
          {{ $page.props.auth.user.fullname.charAt(0).toUpperCase() }}
        </div>
      </div>
    </div>
  </header>
</template>

<style scoped>

/* Add these to your existing <style> */

  .notif-dropdown {
    position: absolute;
    top: 40px;
    right: 0;
    width: 280px;
    background: white;
    border: 1px solid #eee;
    border-radius: 12px;
    box-shadow: 0 10px 25px rgba(0,0,0,0.1);
    z-index: 1000;
    cursor: default;
}

.notif-header {
    padding: 12px;
    font-weight: bold;
    border-bottom: 1px solid #f0f0f0;
}

.notif-body {
    max-height: 300px;
    overflow-y: auto;
}

.notif-item {
    padding: 12px;
    border-bottom: 1px solid #f9f9f9;
}

.notif-item.unread {
    background-color: #f8f4ff; /* Slight purple tint for unread */
}

.notif-item .title {
    font-size: 14px;
    font-weight: 600;
    margin: 0;
}

.notif-item .msg {
    font-size: 12px;
    color: #666;
    margin: 4px 0;
}

.notif-item .time {
    font-size: 10px;
    color: #999;
}

.notif-empty {
    padding: 20px;
    text-align: center;
    color: #999;
    font-size: 14px;
}

.top-header {
  background: white;
  border: 1px solid black;
  border-radius: 15px;
  padding: 12px 24px;
  display: flex;
  justify-content: flex-end;
  margin-bottom: 25px;
}

.header-profile {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    overflow: hidden;
    display: flex;
    align-items: center;
    justify-content: center;
    background: #9E3FFC; /* Same purple as your badge */
    color: white;
    font-weight: bold;
    font-size: 16px;
    border: 2px solid #fff;
    box-shadow: 0 2px 5px rgba(0,0,0,0.1);
}

.header-avatar {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.header-initial {
    display: flex;
    align-items: center;
    justify-content: center;
}

.profile-section {
  display: flex;
  align-items: center;
  gap: 15px;
}

.notif-bell {
  position: relative;
  cursor: pointer;
  display: flex;
  align-items: center;
}

/* Base style for the bell icon */
.bell-icon {
  color: #000000;
  display: inline-block;
  /* VERY IMPORTANT: required for animations to work */
  transition: transform 0.2s ease;
}

/* Hover effect for the bell */
.notif-bell:hover .bell-icon {
  animation: shake-it 0.8s infinite;
  transform-origin: top center;
  /* Makes it swing from the top like a real bell */
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
  0% {
    transform: rotate(0deg);
  }

  20% {
    transform: rotate(15deg);
  }

  40% {
    transform: rotate(-15deg);
  }

  60% {
    transform: rotate(10deg);
  }

  80% {
    transform: rotate(-10deg);
  }

  100% {
    transform: rotate(0deg);
  }
}
</style>