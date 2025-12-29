<script setup lang="ts">
    import ScrollReveal from '@/components/ScrollReveal.vue';
    import { Link } from '@inertiajs/vue3';
    import MyHeader from '@/components/header.vue';
    import MyFooter from '@/components/footer.vue';
</script>

<template>
    <MyHeader />

    <main>
        <section class="main-section">
            <div class="main-fisrt-div translate-y-0 opacity-100 transition-all delay-300 duration-750 starting:translate-y-4 starting:opacity-0">
                <h1 class="main-head">Monitor Your
                    <span class="span-class"> Finances</span> Always
                </h1>
                <p class="main-p">keep track of all the expences you make through out
                    and minimize financial problems</p>

                <Link href="/" class="main-button-link">
                    Get Started <i class="fa-solid fa-circle-right fa-xl" style="color: #ffffff; margin-left: 10px;"></i>
                </Link>
            </div>

            <div class="zip translate-y-0 opacity-100 transition-all delay-300 duration-750 starting:translate-y-4 starting:opacity-0">
                <img class="main-haed-pic" src="/images/illustphone.png" alt="Logo">
            </div>
        </section>

        <ScrollReveal>
            <article class="answer-article">
                <div class="immage-container-1">
                    <img class="immage-1" src="/images/undraw_too-many-options_lpt0-Photoroom.png" alt="image-1">
                </div>
                
                <div class="answer-container">
                    <h2 class="answer-top">Where did my <span class="answer-pay">paycheck</span> go?</h2>
                    <p class="answer-p">
                        We’ve all been there. Small daily purchases add up, 
                        and suddenly your savings goal feels miles away. 
                        Smart Tracker categorizes your spending automatically 
                        so you can see the truth behind your bank account.
                    </p>
                </div>
            </article>
        </ScrollReveal>
    </main>

    <MyFooter />
</template>

<style scoped>
/* --- 1. GLOBAL & MAIN LAYOUT --- */
main {
    padding-top: 80px;
}

/* --- 2. HERO SECTION (Main Shader) --- */
.main-section {
    display: flex;
    flex-direction: row;
    justify-content: space-around;
    align-items: center;
    width: 100%;
    height: 100vh;
    background-color: white;
    background-image:
        radial-gradient(at 0% 0%, rgba(158, 63, 252, 0.25) 0px, transparent 50%),
        radial-gradient(at 100% 0%, rgba(64, 139, 250, 0.25) 0px, transparent 50%),
        radial-gradient(at 100% 100%, rgba(180, 228, 102, 0.35) 0px, transparent 50%),
        radial-gradient(at 0% 100%, rgba(158, 63, 252, 0.15) 0px, transparent 50%);
    animation: shaderMove 15s ease infinite alternate;
}

.main-fisrt-div {
    margin-left: 90px;
    display: flex;
    flex-direction: column;
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

.main-button-link {
    background-color: black;
    width: fit-content;
    padding: 12px 30px;
    color: white;
    border-radius: 100px;
    margin-top: 20px;
    display: flex;
    align-items: center;
    justify-content: center;
    text-decoration: none;
    transition: transform 0.2s;
}

.main-button-link:hover {
    transform: scale(1.05);
    box-shadow: 0 10px 15px rgba(0, 0, 0, 0.1);
}

.main-haed-pic {
    display: block;
    height: 420px;
    width: auto;
    max-width: 1440px;
    object-fit: contain;
    filter: drop-shadow(0 0 50px rgba(180, 228, 102, 0.3));
}

.zip {
    margin-right: 30px;
    display: flex;
    align-items: flex-end;
}

.span-class {
    color: #B4E466;
}

/* --- 3. ANSWER ARTICLE (The Paycheck Card) --- */
.answer-article {
    width: 80%;
    background-image: linear-gradient(90deg, rgba(158, 63, 252, 0.92) 0%, rgba(67, 0, 134, 0.92) 100%);
    margin: 100px auto;
    padding: 40px 50px 40px 110px;
    border-radius: 15px;
    display: flex;
    gap: 90px;
    justify-content: space-between;
    align-items: center;
    box-shadow: 0px 0px 4px 1px rgba(0, 0, 0, 0.25);
}

.answer-top {
    font-family: 'Poppins';
    font-weight: 600;
    font-size: 28px;
    transform: rotate(-2deg);
    background-color: white;
    padding: 7px;
    width: fit-content;
    border-radius: 15px;
    margin-bottom: 10px;
    box-shadow: 0px 0px 4px 1px rgba(0, 0, 0, 0.25);
}

.answer-p {
    font-family: 'Poppins';
    font-size: 16px;
    color: white;
}
.answer-pay{
    color: #B4E466;
    text-decoration: underline;
}


.immage-container-1 {
    height: 190px;
    width: 370px;
    background-color: white;
    border-radius: 15px;
    cursor: pointer;
    transition: transform 0.3s ease;
}

.immage-container-1:hover {
    transform: scale(1.025);
}

.immage-1 {
    width: auto;
    height: 100%;
}

/* --- 4. MOBILE RESPONSIVENESS --- */
@media (max-width: 1100px) {
    .main-section {
        flex-direction: column;
        height: auto;
        padding: 50px 20px;
        text-align: center;
    }

    .main-haed-pic {
        max-width: 300px;
    }

    .main-fisrt-div {
        margin-left: 0;
        align-items: center;
    }

    .main-head {
        font-size: 32px;
        line-height: 42px;
    }

    .answer-article {
        flex-direction: column-reverse;
        padding: 40px;
        gap: 40px;
        width: 90%;
    }

    .immage-container-1 {
        width: 100%;
        height: 150px; /* Adjusted for smaller screens */
    }

    .answer-top {
        font-size: 20px;
    }
}

@keyframes shaderMove {
    0% { background-position: 0% 0%; }
    100% { background-position: 100% 100%; }
}
</style>