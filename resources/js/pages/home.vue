<script setup lang="ts">
// This is like 'require'
import { Link } from '@inertiajs/vue3';
import MyHeader from '@/components/header.vue';
import MyFooter from '@/components/footer.vue';
</script>

<template>
    <MyHeader />

    <main>
        <section class="main-section @container">
            <div
                class="main-fisrt-div translate-y-0 opacity-100 transition-all delay-300 duration-750 starting:translate-y-4 starting:opacity-0">
                <h1 class="main-head">Monitor Your
                    <span class="span-class"> Finances</span> Always
                </h1>
                <p class="main-p">keep track of all the expences you make through out
                    and minimize financial problems</p>
                <button class="main-button">
                    <Link href="/" class="nav-link-signin">Get Started <i class="fa-solid fa-circle-right fa-xl"
                            style="color: #ffffff;"></i></Link>
                </button>

            </div>

            <div
                class="translate-y-0 opacity-100 transition-all delay-300 duration-750 starting:translate-y-4 starting:opacity-0 zip">
                <img class="main-haed-pic" src="/images/illustphone.png" alt="Logo" width="200">
            </div>

        </section>
    </main>

    <MyFooter />
</template>

<style scoped>
main {
    top: 80px;
}

.main-section {
    display: flex;
    flex-direction: row;
    justify-content: space-around;
    align-items: center;
    background-image: url('/images/main-background.jpg');
    width: 100%;
    height: 100vh;
    background-repeat: no-repeat;
    background-position: fixed;

}

.zip {
    margin-right: 30px;
}

.main-fisrt-div {
    margin-left: 90px;
    display: flex;
    flex-direction: column;
}

.main-button {
    background-color: black;
    width: 150px;
    height: 47px;
    color: white;
    border-radius: 100px;
    margin-top: 20px;
}

.main-button:hover {
    transform: scale(1.05);
    box-shadow: 0 10px 15px rgba(0, 0, 0, 0.1);
}

.main-button:active {
    transform: scale(0.98);
}

.main-head {
    font-size: 54px;
    font-family: 'Poppins';
    font-weight: 600;
    line-height: 67px;
    color: black;
}

.main-p {
    font-family: 'Poppins';
    font-style: italic;
    font-weight: 400;
    font-size: 20px;
    line-height: 30px;
    color: black;
    margin-top: 10px;
}

.span-class {
    color: #B4E466;
}

.main-haed-pic {
    display: flex;
    margin-bottom: 0;
    height: 420px;
    width: 1440px;
}
</style>