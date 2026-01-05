<script setup lang="ts">
import { Link } from '@inertiajs/vue3';
import MyHeader from '@/components/header.vue';
import MyFooter from '@/components/footer1.vue';
</script>

<template>
    <MyHeader />
    <main class="main-login">
        <div class="form-cont">
            <h1 class="logo-head" style="color:white;">Smart Tracker</h1>
            <h2 class="welcome-head">Hi, Welcome back! </h2>
            <h3 class="tag-head">Login to your account</h3>
            <form action="" class="form" method="post">
                <input class="input-email" type="email" placeholder="Email" id="email" name="email" required>
                <input class="input-password" ntype="password" placeholder="Password" id="password" name="password"
                    required>
                <Link  href="/forgotPassword" class="forgot-link">forgoten password?</Link>
                <button type="submit" class="submit-login">
                    Login
                </button>
                <div class="else-cont">
                    <hr>
                    <p class="else">or with</p>
                    <hr>
                </div>
                <div class="else-button-cont">
                    <button class="button-google">Google</button>
                    <button class="button-apple">Apple</button>
                </div>

                <p class="footer-text">
                    Already have an account?
                    <Link href="/signup" class="login-link">Signup</Link>
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
    /* Fallback color */
    background-image:
        radial-gradient(at 15% 55%, rgba(190, 150, 240, 0.6) 0px, transparent 50%),
        radial-gradient(at 35% 20%, rgba(200, 180, 245, 0.5) 0px, transparent 50%),
        radial-gradient(at 60% 40%, rgba(160, 180, 240, 0.5) 0px, transparent 50%),
        radial-gradient(at 85% 25%, rgba(190, 210, 245, 0.5) 0px, transparent 50%),
        radial-gradient(at 85% 85%, rgba(220, 240, 200, 0.6) 0px, transparent 50%),
        radial-gradient(at 20% 90%, rgba(230, 215, 250, 0.4) 0px, transparent 50%);
    /* Optional: extra smoothing */
    width: 100%;
    height: 100vh;

}

.form-cont {
    height: 80vh;
    margin: 10px auto;
    background: rgba(255, 255, 255, 0.14);
    border: 1px solid #FFFFFF;
    box-shadow: 0px 0px 6px rgba(0, 0, 0, 0.15);
    backdrop-filter: blur(4.05px);
    /* Note: backdrop-filter has minimal browser support */
    border-radius: 15px;
    width: 40%;
    text-align: center;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    padding: 30px;
}

.logo-head {
    position: relative; /* Necessary to position the blur behind */
    width: fit-content;
    height: fit-content;
    padding: 15px 30px;
    font-family: 'Poppins', sans-serif;
    font-size: 26px;
    font-weight: 700;
    color: white;
    z-index: 1; /* Keeps text on top */
    text-align: center;
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
    z-index: -1; /* Pushes the blur behind the text */
    transform: scale(1.1); /* Optional: makes the glow slightly larger than the text area */
}
.welcome-head{
    font-family: 'Poppins';
    font-weight: 600;
    font-size: 26px;
    margin-top: 5px;
    /* line-height: 20px; */
}
.tag-head{
    font-size: 16px;
    font-family: 'Poppins';
    font-weight: 300;
    margin-top: 1px;
}
.form{
    display: flex;
    flex-direction: column;
    gap: 5px;
    width: 100%;
    align-items: center;


}
.input-email{
    width: 90% ;
    height: 55px;
    background-color: #f4f4f4;
    border-radius: 100px;
    margin-top: 20px;
    padding: 0 30px;
    display: block;
    box-sizing: border-box;
  
}
.input-email:focus, .input-password:focus{
    outline: none;
    border: 1px solid #9E3FFC;
    box-shadow: 0px 0px 6px rgba(0, 0, 0, 0.25);
}
.input-password{
    display: block;
    width: 90%;
    height: 55px;
    background-color: #f4f4f4;
    border-radius: 100px;
    padding: 0 30px;
    box-sizing: border-box;
}
.forgot-link{
    font-family: 'Poppins';
    font-weight: 200;
    font-size: 16px;
    text-align: right;
    width: 90%;

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
.submit-login{
    width: 90%;
    height: 55px;
    display: block;
    background-color: #f4f4f4;
    border-radius: 100px;
    background: linear-gradient(to right, #9E3FFC, #408BFA);
    box-sizing: border-box;
    color: white;
    font-family: 'Poppins';
    font-weight: 500;
    font-size: 16px;
}
.submit-login:hover{
    transform: scale(1.025);
    cursor: pointer;
    box-shadow: 0 10px 15px rgba(0, 0, 0, 0.1);
}
.submit-login:active{
    transform: scale(1);
}
.else-cont{
    display: flex;
    flex-direction: row;
    gap: 14px;
    align-items: center;
}
hr{
    background-color: white;
    width: 160px;
    height: 1px;
}
.else-button-cont{
    display: flex;
    flex-direction: row;
    gap: 30px;
    width: 90%;
}
.button-google{
    flex: 1;        /* Both buttons stay the same size */
    height: 50px;
    border-radius: 100px;
    font-family: 'Poppins';
    font-weight: 600;
    font-size: 14px;
    cursor: pointer;
    border: 1px solid #ddd; /* Subtle border */
    display: flex;
    align-items: center;
    justify-content: center;
    transition: transform 0.2s;
}
.button-apple{
    flex: 1;        /* Both buttons stay the same size */
    height: 50px;
    border-radius: 100px;
    font-family: 'Poppins';
    font-weight: 600;
    font-size: 14px;
    cursor: pointer;
    border: 1px solid #ddd; /* Subtle border */
    display: flex;
    align-items: center;
    justify-content: center;
    transition: transform 0.2s;
}
.button-google {
    background-color: white;
    color: black;
}

.button-apple {
    background-color: black;
    color: white;
}

.button-google:hover, .button-apple:hover {
    transform: translateY(-2px);
    box-shadow: 0 5px 10px rgba(0,0,0,0.1);
}

/* Media Query for Mobile Devices (Tablets and Phones) */
@media (max-width: 768px) {
    .form-cont {
        width: 90%;      /* Expand the glass container on mobile */
        height: auto;    /* Allow it to grow with content */
        padding: 40px 20px;
        margin-top: 20px;
    }

    .main-login {
        padding: 20px;   /* Reduce outer padding so form has more room */
        height: auto;    /* Prevent clipping on long forms */
        min-height: 100vh;
    }

    .else-cont {
        width: 95%;      /* Give the divider more room */
    }

    hr {
        width: 100%;     /* Ensure lines stretch in the flex container */
    }

    .logo-head {
        font-size: 22px; /* Slightly smaller text for small screens */
    }
}

/* Extra Small Phones */
@media (max-width: 480px) {
    .else-button-cont {
        flex-direction: column; /* Stack Google/Apple buttons vertically if it's too tight */
        gap: 10px;
    }
    
    .button-google, .button-apple {
        width: 100%;
    }
}
</style>