<script setup>
  import { ref, computed } from 'vue';
  import { Link, usePage } from '@inertiajs/vue3';
  
  const isExpanded = ref(false);
  const page = usePage();
  
  // Optional: Helper function to check the current route
  const isPageActive = (componentName) => {
    return page.component === componentName;
  };
  </script>
  
  <template>
    <aside :class="['sidebar', { 'expanded': isExpanded }]">
      <div class="sidebar-header">
        <div class="logo">ST</div>
        <button class="toggle-btn" @click="isExpanded = !isExpanded">
          {{ isExpanded ? '<' : '>' }}
        </button>
      </div>
  
      <nav class="nav-links">
        <div class="nav-item" :class="{ 'active': isPageActive('Dashboard') }">
          <Link href="/dashboard1" class="nav-link-wrapper">
            <span class="icon"><i class="fa-solid fa-house-circle-check fa-xl"></i></span>
            <span v-if="isExpanded" class="label">Dashboard</span>
          </Link>
        </div>
  
        <div class="nav-item" :class="{ 'active': isPageActive('Profile') }">
          <Link href="/Profile" class="nav-link-wrapper">
            <span class="icon"><i class="fa-solid fa-user fa-xl"></i></span>
            <span v-if="isExpanded" class="label">Profile</span>
          </Link>
        </div>
  
        <div class="nav-item" :class="{ 'active': isPageActive('Analytics') }">
          <div class="nav-link-wrapper">
            <span class="icon"><i class="fa-solid fa-chart-pie fa-xl"></i></span>
            <span v-if="isExpanded" class="label">Analytics</span>
          </div>
        </div>
  
        <div class="nav-item" :class="{ 'active': isPageActive('Schedule') }">
          <div class="nav-link-wrapper">
            <span class="icon"><i class="fa-solid fa-table fa-xl"></i></span>
            <span v-if="isExpanded" class="label">Schedule</span>
          </div>
        </div>
      </nav>
  
      <div class="logout">
        <span class="icon"><i class="fa-solid fa-right-from-bracket fa-xl"></i></span>
        <span v-if="isExpanded" class="label">Logout</span>
      </div>
    </aside>
  </template>



<style scoped>
.sidebar {
  margin-left: 10px;
  width: 80px;
  margin-top: 20px;
  background-color: #9E3FFC;
  height: 93vh;
  display: flex;
  flex-direction: column;
  padding: 20px 0;
  color: white;
  border-radius: 15px;
  position: fixed;
  left: 0;
  top: 0;
  transition: width 0.3s ease;
  /* Smooth expansion */
  z-index: 100;
  overflow: hidden;
}

/* Expanded state width */
.sidebar.expanded {
  width: 240px;
  align-items: flex-start;
  padding-left: 20px;
}

.sidebar-header {
  width: 100%;
  display: flex;
  align-items: center;
  justify-content: center;
  margin-bottom: 40px;
  position: relative;
}

.sidebar.expanded .sidebar-header {
  justify-content: space-between;
  padding-right: 20px;
}

.logo {
  font-weight: bold;
  font-size: 1.5rem;
}

.toggle-btn {
  background: rgba(255, 255, 255, 0.2);
  border: none;
  color: white;
  border-radius: 5px;
  cursor: pointer;
  padding: 5px 8px;
}

.nav-links {
  display: flex;
  flex-direction: column;
  gap: 15px;
  width: 100%;
}

.nav-item {
  display: flex;
  align-items: center;
  padding: 12px;
  border-radius: 12px;
  cursor: pointer;
  transition: background 0.2s;
  margin: 0 10px;
  white-space: nowrap;
  /* Prevents text wrapping during animation */
}

.nav-item:hover {
  background: rgba(255, 255, 255, 0.1);
}

.nav-item.active {
  background: rgba(255, 255, 255, 0.2);
}

.icon {
  font-size: 1.2rem;
  min-width: 40px;
  text-align: center;
}

.label {
  margin-left: 10px;
  font-weight: 500;
  font-size: 14px;
}

.logout {
  margin-top: auto;
  display: flex;
  align-items: center;
  padding: 12px;
  margin-left: 10px;
  cursor: pointer;
}

@media (max-width: 768px) {
  .sidebar {
  margin-left: 10px;
  width: 80px;
  margin-top: 20px;
  background-color: #9E3FFC;
  height: 93vh;
  display: flex;
  flex-direction: column;
  padding: 20px 0;
  color: white;
  border-radius: 15px;
  position: fixed;
  left: 0;
  top: 0;
  transition: width 0.3s ease;
  /* Smooth expansion */
  z-index: 1;
  overflow: hidden;
}
  }
</style>