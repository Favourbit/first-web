<script setup lang="ts">
import { Link, useForm } from '@inertiajs/vue3';
import MyHeader from '@/components/header.vue';
import MyFooter from '@/components/footer1.vue';

// 1. Create the Form Object
const form = useForm({
    fullname: '',           // Matches your database column
    email: '',              // Matches your database column
    password: '',
    password_confirmation: '', // Required for the 'confirmed' rule in Laravel
});

// 2. The Submit Function
const submit = () => {
    // We send a POST request to the URL we just made in routes/web.php
    form.post('/signup', {
        onFinish: () => form.reset('password', 'password_confirmation'),
    });
};

</script>

<template>
    <MyHeader />
    <main class="main-login">
        <div class="form-cont">
            <h1 class="logo-head">Smart Tracker</h1>
            <h2 class="welcome-head">Create Your Account</h2>
            <!-- <h3 class="tag-head">Join us to start tracking smart</h3> -->

            <form class="form" @submit.prevent="submit">

                <input v-model="form.fullname" class="input-field" type="text" placeholder="full name" name="fullname"
                    id="fullname" required>
                <p v-if="form.errors.fullname" class="error-text">{{ form.errors.fullname }}</p>

                <input v-model="form.email" class="input-field" type="email" placeholder="Email Address" name="email"
                    id="email" required>
                <p v-if="form.errors.email" class="error-text">{{ form.errors.email }}</p>

                <div class="password-cont">
                    <input v-model="form.password" class="input-field" type="password" placeholder="Password"
                        name="password" id="password" required>
                    <p v-if="form.errors.password" style="color: red; font-size: 12px;">
                        {{ form.errors.password }}
                    </p>

                    <input v-model="form.password_confirmation" class="input-field" type="password"
                        placeholder="Confirm Password" id="password_confirmation" name="password_confirmation" required>
                </div>

                <button type="submit" class="submit-login" :disabled="form.processing">
                    Signup
                </button>

                <div class="else-cont">
                    <hr>
                    <p class="else">or join with</p>
                    <hr>
                </div>

                <div class="else-button-cont">
                    <button type="button" class="button-google"><a href="/auth/google" class="google-login-btn">Google</a> </button>
                    <button type="button" class="button-apple">Apple</button>
                </div>

                <p class="footer-text">
                    Already have an account?
                    <Link href="/login" class="login-link">Login</Link>
                </p>
            </form>
        </div>
    </main>
    <MyFooter />
</template>


<style scoped>
.main-login {
    padding: 50px;
    margin-top: 50px;
    background-color: #f0f2f5;
    background-image:
        radial-gradient(at 15% 55%, rgba(190, 150, 240, 0.6) 0px, transparent 50%),
        radial-gradient(at 35% 20%, rgba(200, 180, 245, 0.5) 0px, transparent 50%),
        radial-gradient(at 60% 40%, rgba(160, 180, 240, 0.5) 0px, transparent 50%),
        radial-gradient(at 85% 25%, rgba(190, 210, 245, 0.5) 0px, transparent 50%),
        radial-gradient(at 85% 85%, rgba(220, 240, 200, 0.6) 0px, transparent 50%),
        radial-gradient(at 20% 90%, rgba(230, 215, 250, 0.4) 0px, transparent 50%);
    width: 100%;
    min-height: 100vh;
}

.password-cont {
    display: flex;
    width: 90%;
    flex-direction: row;
    gap: 10px;
}

.logo-head {
    position: relative;
    /* Necessary to position the blur behind */
    width: fit-content;
    height: fit-content;
    padding: 15px 30px;
    font-family: 'Poppins', sans-serif;
    font-size: 26px;
    font-weight: 700;
    color: white;
    z-index: 1;
    /* Keeps text on top */
    text-align: center;
}

.welcome-head {
    font-family: 'Poppins';
    font-weight: 600;
    font-size: 26px;
    margin-top: 5px;
    margin-bottom: 10px;
    /* line-height: 20px; */
}

.logo-head::before {
    content: "";
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    text-align: center;
    background-color: #9E3FFC;
    /* This blurs ONLY the purple box, not the text */
    filter: blur(12.5px);
    border-radius: 15px;
    z-index: -1;
    /* Pushes the blur behind the text */
    transform: scale(1.1);
    /* Optional: makes the glow slightly larger than the text area */
}

.form-cont {
    min-height: 80vh;
    margin: 10px auto;
    background: rgba(255, 255, 255, 0.14);
    border: 1px solid #FFFFFF;
    box-shadow: 0px 0px 6px rgba(0, 0, 0, 0.15);
    backdrop-filter: blur(4.05px);
    border-radius: 15px;
    width: 40%;
    text-align: center;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    padding: 40px 30px;
}

.form {
    display: flex;
    flex-direction: column;
    gap: 5px;
    /* Tightened gap for more inputs */
    width: 100%;
    align-items: center;
}

.submit-login:hover {
    transform: scale(1.025);
    cursor: pointer;
    box-shadow: 0 10px 15px rgba(0, 0, 0, 0.1);
}

.submit-login:active {
    transform: scale(1);
}

/* Unified input style */
.input-field {
    width: 90%;
    height: 50px;
    background-color: #f4f4f4;
    border-radius: 100px;
    padding: 0 30px;
    box-sizing: border-box;
    border: 1px solid transparent;
    outline: none;
}

.input-field:focus {
    border: 1px solid #9E3FFC;
    box-shadow: 0px 0px 6px rgba(0, 0, 0, 0.1);
}

.submit-login {
    width: 90%;
    height: 55px;
    margin-top: 10px;
    border-radius: 100px;
    background: linear-gradient(to right, #9E3FFC, #408BFA);
    color: white;
    font-family: 'Poppins';
    font-weight: 600;
    border: none;
    cursor: pointer;
}

.else-cont {
    display: flex;
    align-items: center;
    width: 90%;
    margin: 5px 0;
}

hr {
    flex: 1;
    height: 1px;
    border: none;
    background-color: white;
}

.else {
    padding: 0 10px;
    font-family: 'Poppins';
    font-size: 14px;
}

.else-button-cont {
    display: flex;
    gap: 20px;
    width: 90%;
}

.button-google,
.button-apple {
    flex: 1;
    height: 45px;
    border-radius: 100px;
    border: none;
    font-weight: 600;
    cursor: pointer;
}

.button-google {
    background: white;
    color: black;
}

.button-apple {
    background: black;
    color: white;
}

.button-google:hover,
.button-apple:hover {
    transform: translateY(-2px);
    box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
}

.footer-text {
    margin-top: 10px;
    font-family: 'Poppins';
    font-size: 14px;
}

.login-link {
    color: #9E3FFC;
    font-weight: 700;
    text-decoration: none;
}

/* Mobile responsive */
@media (max-width: 768px) {
    .form-cont {
        width: 90%;
    }
}
</style>