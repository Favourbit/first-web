<script setup>
    import { Link, usePage } from '@inertiajs/vue3';
    import { computed } from 'vue';
    
    const page = usePage();
    // This checks if the current URL matches the link
    const currentUrl = computed(() => page.url);
</script>

<template>
    <header>
        <h1>Smart Tracker</h1>
        <nav class="nav-1">
            <Link href="/" :style="{color: currentUrl === '/' ? 'black' : '#a1a1a1' }" class="nav-link">Home</Link>
            <Link href="/about-us" :style="{color: currentUrl === '/about-us' ? 'black' : '#a1a1a1' }" class="nav-link">About-us</Link>
            <Link href="/FAQs" :style="{color: currentUrl === '/FAQs' ? 'black' : '#a1a1a1' }" class="nav-link">FAQs</Link>
        </nav>
        <nav class="nav-2">
            <Link href="/home" class="nav-link-signin">signin</Link>
            <Link href="/home" class="nav-link-signup">signup</Link>
        </nav>
    </header>
</template>

<style scoped>
    header{
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        align-items: center;
        width: 100%;
        height: 80px;
        gap: 70px;
        position: fixed;
        background-color: white;


    }
    .nav-1{
        display: flex;
        gap: 20px;
        color: #a1a1a1;
        align-items: center;
        .nav-link{
            font-family: 'Poppins';
            font-weight: 500;
            font-style: normal;
            font-size: 24px;
        }
        .nav-link:hover{
            text-decoration: underline;
        }
    }
    .nav-2{
        display: flex;
        gap: 13px;
        margin-right: 50px;
        align-items: center;
        .nav-link-signin{
            color: black;
            font-family: 'Poppins';
            font-weight: 500;
            font-style: normal;
            font-size: 24px;
        }
        .nav-link-signin:hover{
            text-decoration: underline;
        }
        .nav-link-signup{
            color: rgb(255, 255, 255);
            font-family: 'Poppins';
            font-weight: 500;
            font-style: normal;
            font-size: 24px;
            background-image: linear-gradient(to right, #9E3FFC, #408BFA);
            width: 120px;
            height: 45px;
            display: flex;
            align-items: center;
            text-align: center;
            justify-content: center;
            border-radius: 100px;
        }

    }

  h1{
    width: 241px;
    height: 47px;
    margin-left: 50px;
    font-family: 'Poppins';
    font-style: normal;
    font-weight: 700;
    font-size: 32px;
    line-height: 48px;
    color: #9E3FFC;
  }
</style>