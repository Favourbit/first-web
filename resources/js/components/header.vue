<script setup>
    import { ref, computed } from 'vue'; 
    import { Link, usePage } from '@inertiajs/vue3';
    
    const page = usePage();
    const isMenuOpen = ref(false); 
    const currentUrl = computed(() => page.url);
</script>

<template>
    <header>
        <h1>Smart Tracker</h1>
        
        <nav class="nav-1" :class="{ 'mobile-open': isMenuOpen }">
            <Link href="/" :style="{color: currentUrl === '/' ? 'black' : '#a1a1a1' }" class="nav-link">Home</Link>
            <Link href="/about-us" :style="{color: currentUrl === '/about-us' ? 'black' : '#a1a1a1' }" class="nav-link">About-us</Link>
            <Link href="/FAQs" :style="{color: currentUrl === '/FAQs' ? 'black' : '#a1a1a1' }" class="nav-link">FAQs</Link>
        </nav>

        <nav class="nav-2">
            <Link href="/login" class="nav-link-signin">signin</Link>
            <Link href="/signup" class="nav-link-signup">signup</Link>

            <button class="hamburger" @click="isMenuOpen = !isMenuOpen">
                {{ isMenuOpen ? '✕' : '☰' }}
            </button>
        </nav>
    </header>
</template>

<style scoped>
    /* 1. UNIVERSAL & DESKTOP STYLES (Always write these first) */
    header {
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        align-items: center;
        width: 100%;
        height: 80px;
        position: fixed;
        background-color: white;
        z-index: 1000;
        top: 0;
        left: 0;
    }

    h1 {
        margin-left: 50px;
        font-family: 'Poppins';
        font-weight: 700;
        font-size: 32px;
        color: #9E3FFC;
    }

    .nav-1 {
        display: flex;
        gap: 20px;
        align-items: center;
    }

    .nav-link {
        font-family: 'Poppins';
        font-weight: 500;
        font-size: 24px;
        text-decoration: none;
    }

    .nav-2 {
        display: flex;
        gap: 13px;
        margin-right: 50px;
        align-items: center;
    }

    .nav-link-signin {
        color: black;
        font-family: 'Poppins';
        font-size: 24px;
        text-decoration: none;
    }

    .nav-link-signup {
        color: white;
        font-family: 'Poppins';
        font-size: 24px;
        background-image: linear-gradient(to right, #9E3FFC, #408BFA);
        width: 120px;
        height: 45px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 100px;
        text-decoration: none;
    }

    .hamburger {
        display: none; /* Hidden on desktop */
        font-size: 30px;
        background: none;
        border: none;
        cursor: pointer;
        color: #9E3FFC;
    }

    /* 2. MOBILE STYLES (Inside Media Query - Write these last) */
    @media (max-width: 850px) {
        h1 {
            margin-left: 20px;
            font-size: 24px;
        }
        .nav-link-signup {
        color: white;
        font-family: 'Poppins';
        font-size: 16px;
        background-image: linear-gradient(to right, #9E3FFC, #408BFA);
        width: 80px;
        height: 30px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 100px;
        text-decoration: none;
    }
        .nav-link-signin {
        color: black;
        font-family: 'Poppins';
        font-size: 16px;
        text-decoration: none;
    }


        .nav-2 {
            margin-right: 20px;
        }

        .hamburger {
            display: block; /* Show on mobile */
        }

        /* Hide middle links and position them as a dropdown */
        .nav-1 {
            display: none; 
            flex-direction: column;
            position: absolute;
            top: 80px;
            left: 0;
            width: 100%;
            background-color: white;
            padding: 20px;
            border-bottom: 2px solid #9E3FFC;
            gap: 15px;
        }

        /* This is the class that makes the menu show when you click the button */
        .nav-1.mobile-open {
            display: flex;
        }

        /* Optional: Hide the signup button on small phones if it's too crowded */
        @media (max-width: 480px) {
            .nav-link-signup {
                display: none;
            }
        }
    }
</style>