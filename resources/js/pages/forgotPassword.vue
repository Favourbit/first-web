<script setup lang="ts">
    import { Link} from '@inertiajs/vue3';
    
    </script>

<template>
    <main class="main-login">
        <div class="form-cont">
            <h1 class="logo-head">Smart Tracker</h1>
            <h2 class="welcome-head">Reset Password</h2>
            <h3 class="tag-head">Enter your email to receive a reset link</h3>

            <form action="" class="form" method="post">
                <input class="input-email" type="email" placeholder="Email Address" id="email" name="email" required>
                
                <button type="submit" class="submit-login">
                    Send Reset Link
                </button>

                <a href="/login" class="back-link">Return to Login</a>
            </form>
        </div>
    </main>
</template>


<style scoped>
    /* Reuse your background and main container */
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
        height: 100vh;
    }
    
    .form-cont {
        height: auto; /* Changed to auto so it hugs the content */
        min-height: 60vh;
        margin: 10px auto;
        background: rgba(255, 255, 255, 0.14);
        border: 1px solid #FFFFFF;
        box-shadow: 0px 0px 6px rgba(0, 0, 0, 0.15);
        backdrop-filter: blur(4.05px);
        border-radius: 15px;
        width: 40%;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        padding: 40px;
    }
    
    /* Reuse your logo and input styles */
    .logo-head {
        position: relative;
        width: fit-content;
        padding: 15px 30px;
        font-family: 'Poppins', sans-serif;
        font-size: 26px;
        font-weight: 700;
        color: white;
        z-index: 1;
    }
    
    .logo-head::before {
        content: "";
        position: absolute;
        top: 0; left: 0; right: 0; bottom: 0;
        background-color: #9E3FFC;
        filter: blur(12.5px); 
        border-radius: 15px;
        z-index: -1;
        transform: scale(1.1);
    }
    
    .form {
        display: flex;
        flex-direction: column;
        gap: 20px;
        width: 100%;
        align-items: center;
    }
    
    .input-email {
        width: 90%;
        height: 55px;
        background-color: #f4f4f4;
        border-radius: 100px;
        padding: 0 30px;
        box-sizing: border-box;
        border: none;
    }
    
    .submit-login {
        width: 90%;
        height: 55px;
        border-radius: 100px;
        background: linear-gradient(to right, #9E3FFC, #408BFA);
        color: white;
        font-family: 'Poppins';
        font-weight: 600;
        border: none;
        cursor: pointer;
    }
    
    .back-link {
        font-family: 'Poppins';
        font-size: 14px;
        color: #555;
        text-decoration: none;
        margin-top: 10px;
    }
    
    .back-link:hover {
        text-decoration: underline;
    }
    
    /* Mobile Media Query */
    @media (max-width: 768px) {
        .form-cont {
            width: 90%;
        }
    }
    </style>