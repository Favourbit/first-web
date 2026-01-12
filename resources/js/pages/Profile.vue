<script setup>
import { ref } from 'vue';
import { useForm, usePage } from '@inertiajs/vue3';
import Sidebar from '@/components/Sidebar.vue';
import Header from '@/components/Header1.vue';

const isSideBarExpanded = ref(false);
const page = usePage();
const user = page.props.auth.user;

// 1. Initialize Form
const form = useForm({
  fullname: user.fullname,
  email: user.email,
  password: '',
  password_confirmation: '',
  user_profile: null,
});

// 2. Local preview URL
const previewUrl = ref(null);

const onFileChange = (e) => {
  const file = e.target.files[0];
  if (file) {
    form.user_profile = file;
    previewUrl.value = URL.createObjectURL(file);
  }
};



const submit = () => {
  form.post('/profile-update', {
    forceFormData: true,
    preserveScroll: true,
    onSuccess: () => {
      // Clear the password fields so they are empty for the next update
      form.password = '';
      form.password_confirmation = '';
      alert('Profile Updated!');
    },
  });
};
</script>

<template>
  <div class="layout">
    <Sidebar :is-expanded="isSideBarExpanded" @toggle="(val) => isSideBarExpanded = val" />

    <div class="main-content" :style="{ marginLeft: isSideBarExpanded ? '240px' : '80px' }">
      <Header />

      <div class="profile-container">
        <div class="profile-grid">

          <div class="identity-side">
            <div class="avatar-wrapper">
              <div class="avatar-circle">
                <img v-if="previewUrl" :src="previewUrl" class="profile-img">

                <img v-else-if="$page.props.auth.user.user_profile"
                  :src="`data:image/jpeg;base64,${$page.props.auth.user.user_profile}`" class="profile-img">

                <div v-else class="placeholder-icon">
                  {{ $page.props.auth.user.fullname.charAt(0).toUpperCase() }}
                </div>
              </div>
              <label class="camera-badge">
                <i class="fa-solid fa-camera"></i>
                <input type="file" @change="onFileChange" hidden>
              </label>
            </div>
            <h1 class="bold-name">{{ $page.props.auth.user.fullname }}</h1>
            <p class="role-subtitle">Account Manager</p>
          </div>

          <form @submit.prevent="submit" class="form-side">
            <div class="input-group">
              <label>Full Name</label>
              <input type="text" v-model="form.fullname" class="styled-input"
                :placeholder="$page.props.auth.user.fullname">
              <div v-if="form.errors.fullname" style="color: red; font-size: 12px;">{{ form.errors.fullname }}</div>
            </div>

            <div class="input-group">
              <label>Email Address</label>
              <input type="email" v-model="form.email" class="styled-input" :placeholder="$page.props.auth.user.email">
              <div v-if="form.errors.email" style="color: red; font-size: 12px;">{{ form.errors.email }}</div>
            </div>

            <div class="password-split">
              <div class="input-group">
                <label>New Password</label>
                <input v-model="form.password" type="password" class="styled-input" placeholder="********">
              </div>
              <div class="input-group">
                <label>Confirm Password</label>
                <input v-model="form.password_confirmation" type="password" class="styled-input" placeholder="********">
              </div>
            </div>

            <button type="submit" class="save-btn" :disabled="form.processing">
              <span v-if="form.processing">Saving...</span>
              <span v-else>Save Changes</span>
              <i class="fa-solid fa-check"></i>
            </button>
            <div v-if="Object.keys(form.errors).length > 0"
              style="background: #fee2e2; color: #b91c1c; padding: 15px; border-radius: 10px; margin-bottom: 20px;">
              <ul>
                <li v-for="error in form.errors" :key="error">{{ error }}</li>
              </ul>
            </div>
          </form>

        </div>
      </div>
    </div>
  </div>
</template>


<style scoped>
/* Base Layout */
.layout {
  display: flex;
  background: #f0f2f5;
  min-height: 100vh;
}

.main-content {
  flex: 1;
  padding: 20px;
  transition: margin-left 0.3s cubic-bezier(0.4, 0, 0.2, 1);
}

/* Profile Container */
.profile-container {
  background: white;
  border-radius: 30px;
  padding: 40px;
  margin-top: 20px;
  box-shadow: 0 10px 25px rgba(0, 0, 0, 0.05);
}

.profile-grid {
  display: grid;
  grid-template-columns: 1fr 1.5fr;
  /* Identity left, Form right */
  gap: 60px;
  align-items: center;
}

/* Identity Styles */
.identity-side {
  display: flex;
  flex-direction: column;
  align-items: center;
  text-align: center;
}

.avatar-wrapper {
  position: relative;
  margin-bottom: 20px;
}

.avatar-circle {
  width: 220px;
  height: 220px;
  background: #9E3FFC;
  border-radius: 50%;
  overflow: hidden;
  border: 5px solid #fff;
  box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
}

.avatar-circle img {
  width: 100%;
  height: 100%;
  object-fit: cover;
}

.placeholder-icon {
  font-size: 80px;
  display: flex;
  align-items: center;
  justify-content: center;
  height: 100%;
  color: #adb5bd;
}

.camera-badge {
  position: absolute;
  bottom: 10px;
  right: 10px;
  background: #9E3FFC;
  color: white;
  width: 45px;
  height: 45px;
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  cursor: pointer;
  border: 3px solid white;
  transition: transform 0.2s;
}

.camera-badge:hover {
  transform: scale(1.1);
}

.bold-name {
  font-size: 2.2rem;
  font-weight: 800;
  color: #1a1a1a;
  margin: 0;
}

.role-subtitle {
  color: #6c757d;
  font-size: 1rem;
  margin-top: 5px;
}

/* Form Styles */
.form-side {
  display: flex;
  flex-direction: column;
  gap: 20px;
}

.input-group {
  display: flex;
  flex-direction: column;
  gap: 8px;
}

.input-group label {
  font-size: 0.9rem;
  font-weight: 600;
  color: #495057;
  margin-left: 5px;
}

.styled-input {
  background: #f8f9fa;
  border: 2px solid #f1f3f5;
  border-radius: 15px;
  padding: 16px 20px;
  font-size: 1rem;
  transition: all 0.2s;
}

.styled-input:focus {
  outline: none;
  background: white;
  border-color: #9E3FFC;
  box-shadow: 0 0 0 4px rgba(158, 63, 252, 0.1);
}

.password-split {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 20px;
}

.save-btn {
  background: #1a1a1a;
  color: white;
  border: none;
  border-radius: 15px;
  padding: 18px;
  font-size: 1.1rem;
  font-weight: 600;
  cursor: pointer;
  display: flex;
  align-items: center;
  justify-content: center;
  gap: 10px;
  transition: all 0.3s;
  margin-top: 10px;
}

.save-btn:hover {
  background: #9E3FFC;
  transform: translateY(-2px);
  box-shadow: 0 5px 15px rgba(158, 63, 252, 0.3);
}

/* RESPONSIVE DESIGN */
@media (max-width: 1024px) {
  .profile-grid {
    grid-template-columns: 1fr;
    /* Stack columns */
    gap: 40px;
  }

  .identity-side {
    order: 1;
  }

  .form-side {
    order: 2;
  }
}

@media (max-width: 768px) {
  .main-content {
    margin-left: 80px !important;
    /* Sidebar usually becomes a drawer on mobile */
    padding: 15px;
  }

  .profile-container {
    padding: 25px;
  }

  .password-split {
    grid-template-columns: 1fr;
  }

  .bold-name {
    font-size: 1.8rem;
  }

  .avatar-circle {
    width: 160px;
    height: 160px;
  }
}
</style>