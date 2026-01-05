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
            <div
                class="main-fisrt-div translate-y-0 opacity-100 transition-all delay-300 duration-750 starting:translate-y-4 starting:opacity-0">
                <h1 class="main-head">Monitor Your
                    <span class="span-class"> Finances</span> Always
                </h1>
                <p class="main-p">keep track of all the expences you make through out
                    and minimize financial problems</p>

                <Link href="/signup" class="main-button-link">
                    Get Started <i class="fa-solid fa-circle-right fa-xl"
                        style="color: #ffffff; margin-left: 10px;"></i>
                </Link>
            </div>

            <div
                class="zip translate-y-0 opacity-100 transition-all delay-300 duration-750 starting:translate-y-4 starting:opacity-0">
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
        <hr class="line">
        </hr>
        <section>

            <h2 class="head-tut">How it Works</h2>
            <article class="article-tut ">
                <div class="container1-tut ">
                    <h3 class="haed1-tut">Real-Time Tracking</h3>
                    <p class="tut-p1">Sync your transactions instantly. Watch your net worth grow as you
                        make smarter daily choices.</p>
                    <div class="img-tut1-cont @container">
                        <img class="img-tut1"
                            src="/images/icône de chronomètre de temps au tour, style simple-Photoroom.png"
                            alt="tracking">
                    </div>
                </div>

                <div class="container2-tut @container">
                    <h3 class="haed2-tut">Smart Budgeting</h3>
                    <p class="tut-p2">Set monthly limits for groceries, dining, or entertainment.
                        We’ll nudge you before you overspend.</p>
                    <div class="img-tut2-cont @container">
                        <img class="img-tut2" src="/images/financial cost budget vector icon-Photoroom.png"
                            alt="budget-icon">
                    </div>
                </div>
                <div class="container3-tut @container">
                    <h3 class="haed3-tut">Goal Visualizer</h3>
                    <p class="tut-p3">Saving for a house or a vacation? Track
                        your progress with visual bars that
                        move as you save.</p>
                    <div class="img-tut3-cont @container">
                        <img class="img-tut3" src="/images/Personal improvement black icon-Photoroom.png" alt="growth">
                    </div>
                </div>
            </article>
        </section>
        <div class="choice-cont">
            <h3 class="head-choice">why Choose Us</h3>
            <h4 class="headline-choice">Intelligence that works for you</h4>
            <article class="choicee-article">
                <div class="choice-cont1 ">
                    <h2 class="choice-number1">1</h2>
                    <h3 class="h3-choice1">Auto-Categorization</h3>
                    <p class="p-choice1">No more manual entry. We know the difference between a coffee shop and a gas
                        station</p>
                </div>
                <div class="choice-cont2">
                    <span class="choice-number2">2</span>
                    <h3 class="h3-choice2">Spend Forecast</h3>
                    <p class="p-choice2"> Based on your current habits, we’ll tell you exactly how much you’ll have left
                        at the end of the month</p>
                </div>
                <div class="choice-cont3">
                    <span class="choice-number3">3</span>
                    <h3 class="h3-choice3">Privacy First</h3>
                    <p class="p-choice3">Your data is encrypted and secure. We track your numbers, not your identity.
                    </p>
                </div>
            </article>
        </div>
        <div class="cont-cta">
            <div class="cont-ct1a"><h1 class="ready-cta">Ready</h1> <h1 class="h1-cta"> to take </h1><h1 class="control-cta">Control?</h1></div>
            <p class="p-cta">Join thousands of users who are building better financial future today.</p>
            <button class="link-cta"><Link href="/signup">Create Your Account</Link></button>
        </div>

    </main>

    <MyFooter />
</template>

<style scoped>
    /* call to action */
    .cont-cta{
        padding-top: 70px;
        padding-bottom: 70px;
        text-align: center;
        width: 100%;
        height: fit-content;
        background: radial-gradient(100.42% 286.9% at 100% 50%, #DAF2B3 0%, #E9FDCA 51.92%, #B4E466 100%)
    }
    .h1-cta{
        font-size: 32px;
        font-family: 'Poppins';
        font-weight: 600;
        font-style: normal;
        color: black;
    }
    .link-cta{
        width: fit-content;
        height: fit-content;
        background-image: linear-gradient(to right, #408BFA, #9E3FFC);
        padding-left: 15px;
        padding: 15px;
        padding-top: 10px;
        padding-bottom: 10px;
        font-family: 'Poppins';
        font-size: 20px;
        font-weight: 700;
        color: white;
        border-radius: 100px;
        margin-top: 30px;
        cursor: pointer;
    }
    .link-cta:hover{
        transform: scale(1.05);
        box-shadow: 0 10px 15px rgba(0, 0, 0, 0.1);
    }
    .link-cta:active{
        transform: scale(1);
    }
    .p-cta{
        font-size: 26px;
        font-style: normal;
        font-family: 'Poppins';
        font-weight: 300;
        padding-left: 300px;
        padding-right: 300px;
        line-height: 30px;
        margin-top: 10px;
    }
    .ready-cta{
        background-color: #408BFA;
        padding: 5px;
        padding-left: 10px;
        padding-right: 10px;
        transform: rotate(5.9deg);
        border-radius: 15px;
        color: white;
        height: fit-content;
        width: fit-content;
        font-size: 32px;
        font-family: 'Poppins';
        font-weight: 600;
        font-style: normal;
        box-shadow: 0 10px 15px rgba(0, 0, 0, 0.1);
    }
    .cont-ct1a{
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
    }
    .control-cta{
        background-color: #9E3FFC;
        padding: 5px;
        padding-left: 10px;
        padding-right: 10px;
        transform: rotate(-5.9deg);
        border-radius: 15px;
        color: white;
        height: fit-content;
        width: fit-content;
        font-size: 32px;
        font-family: 'Poppins';
        font-weight: 600;
        font-style: normal;
        box-shadow: 0 10px 15px rgba(0, 0, 0, 0.1);
    }
    /* chioce area */
    .choice-cont{
        display: flex;
        flex-direction: column;
        margin: 0 auto;
        text-align: center;
        padding: 30px;
    }
    .head-choice{
        font-family: 'Poppins';
        font-weight: 600;
        font-size: 32px;
    }
    .headline-choice{
        font-family: 'Poppins';
        font-size: 20px;
        font-weight: 400;
        margin-top: 10px;
    }
    .choice-number1{
        width: 46px;
         height: 46px;
        background-color: #408BFA;
        border-radius: 100%;
        box-shadow: 0 10px 15px rgba(0, 0, 0, 0.1);
        text-align: center;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
    }
    .choice-number2{
        width: 46px;
         height: 46px;
        background-color: #B4E466;
        border-radius: 100%;
        box-shadow: 0 10px 15px rgba(0, 0, 0, 0.1);
        text-align: center;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
    }
    .h3-choice1{
        font-family: 'Poppins';
        font-weight: 600;
        font-size: 15px;
        
    }
    .h3-choice2{
        font-family: 'Poppins';
        font-weight: 600;
        font-size: 15px;


    }
    .h3-choice3{
        font-family: 'Poppins';
        font-weight: 600;
        font-size: 15px;

    }
    .choice-number3{
        width: 46px;
         height: 46px;
        background-color: #9E3FFC;
        border-radius: 100%;
        box-shadow: 0 10px 15px rgba(0, 0, 0, 0.1);
        text-align: center;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
    }
    .choicee-article{
        display: flex;
        flex-direction: row;
        gap: 10px;
        margin: 10px auto;
        margin-left: 100px;
        margin-right: 100px;
    }
    .choice-cont1{
        color: black;
    }
    .p-choice1{
        font-size: 15px;
        font-weight: 300;
        font-family: 'Poppins';
        font-style: normal;
    }
    .p-choice2{
        font-size: 15px;
        font-weight: 300;
        font-family: 'Poppins';
        font-style: normal;
    }
    .p-choice3{
        font-size: 15px;
        font-weight: 300;
        font-family: 'Poppins';
        font-style: normal;
    }
.line {
    background-color: black;
    width: 80%;
    margin: 0px auto;
    margin-bottom: 20px;
    height: 1.5px;

}

/* tuturail section */
.article-tut {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 10px;
    padding: 90px;
    padding-top: 20px;
    margin: 0px auto;
    grid-template-rows: repeat(2, fit-content);


}

.head-tut {
    text-align: center;
    font-family: 'Poppins';
    font-weight: 700;
    font-size: 34px;
}

.container1-tut {
    background-color: rgba(158, 63, 252, 0.53);
    padding-top: 50px;
    padding-bottom: 10px;
    padding-right: 30px;
    padding-left: 30px;
    border-radius: 15px;
    border: 1px solid black;
}

.container1-tut:hover {
    transform: scale(1.02);
    cursor: pointer;
    box-shadow: 0 10px 15px rgba(0, 0, 0, 0.1);
}

.haed1-tut {
    font-family: 'Poppins';
    font-style: normal;
    font-weight: 700;
    font-size: 30px;
}

.img-tut1-cont {
    width: 50px;
    height: 50px;
    float: right;

}

.container2-tut {
    background: rgba(180, 228, 102, 0.49);
    padding-top: 50px;
    padding-bottom: 10px;
    padding-right: 30px;
    padding-left: 30px;
    border-radius: 15px;
    border: 1px solid black;
    grid-row: span 2;
    display: flex;
    flex-direction: column;
    justify-content: center;
    text-align: center;
}

.haed2-tut {
    font-family: 'Poppins';
    font-style: normal;
    font-weight: 700;
    font-size: 32px;
}

.container2-tut:hover {
    transform: scale(1.02);
    cursor: pointer;
    box-shadow: 0 10px 15px rgba(0, 0, 0, 0.1);
}

.img-tut2-cont {
    width: 250px;
    height: 250px;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    margin: 5px auto;

}

.img-tut2 {}

.container3-tut {
    background: rgba(64, 139, 250, 0.33);
    padding-top: 50px;
    padding-bottom: 10px;
    padding-right: 30px;
    padding-left: 30px;
    border-radius: 15px;
    border: 1px solid black;

}

.container3-tut:hover {
    transform: scale(1.02);
    cursor: pointer;
    box-shadow: 0 10px 15px rgba(0, 0, 0, 0.1);
}

.haed3-tut {
    font-family: 'Poppins';
    font-style: normal;
    font-weight: 700;
    font-size: 30px;
}

.img-tut3-cont {
    width: 50px;
    height: 50px;
    float: right;

}

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

.answer-pay {
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

        /* call to action */
        .cont-cta{
        padding-top: 70px;
        padding-bottom: 70px;
        text-align: center;
        width: 100%;
        height: fit-content;
        background: radial-gradient(100.42% 286.9% at 100% 50%, #DAF2B3 0%, #E9FDCA 51.92%, #B4E466 100%)
    }
    .h1-cta{
        font-size: 26px;
        font-family: 'Poppins';
        font-weight: 600;
        font-style: normal;
        color: black;
    }
    .link-cta{
        width: fit-content;
        height: fit-content;
        background-image: linear-gradient(to right, #408BFA, #9E3FFC);
        padding-left: 15px;
        padding: 15px;
        padding-top: 10px;
        padding-bottom: 10px;
        font-family: 'Poppins';
        font-size: 16px;
        font-weight: 700;
        color: white;
        border-radius: 100px;
        margin-top: 30px;
        cursor: pointer;
    }
    .link-cta:hover{
        transform: scale(1.05);
        box-shadow: 0 10px 15px rgba(0, 0, 0, 0.1);
    }
    .link-cta:active{
        transform: scale(1);
    }
    .p-cta{
        font-size: 22px;
        font-style: normal;
        font-family: 'Poppins';
        font-weight: 300;
        padding-left: 30px;
        padding-right: 30px;
        line-height: 30px;
        margin-top: 10px;
    }
    .ready-cta{
        background-color: #408BFA;
        padding: 5px;
        padding-left: 10px;
        padding-right: 10px;
        transform: rotate(5.9deg);
        border-radius: 15px;
        color: white;
        height: fit-content;
        width: fit-content;
        font-size: 26px;
        font-family: 'Poppins';
        font-weight: 600;
        font-style: normal;
        box-shadow: 0 10px 15px rgba(0, 0, 0, 0.1);
    }
    .cont-ct1a{
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
    }
    .control-cta{
        background-color: #9E3FFC;
        padding: 5px;
        padding-left: 10px;
        padding-right: 10px;
        transform: rotate(-5.9deg);
        border-radius: 15px;
        color: white;
        height: fit-content;
        width: fit-content;
        font-size: 26px;
        font-family: 'Poppins';
        font-weight: 600;
        font-style: normal;
        box-shadow: 0 10px 15px rgba(0, 0, 0, 0.1);
    }

        /* chioce area */
        .choice-cont{
        display: flex;
        flex-direction: column;
        margin: 0 auto;
        text-align: center;
        padding: 30px;
    }
    .head-choice{
        font-family: 'Poppins';
        font-weight: 600;
        font-size: 16px;
        line-height: 3px;
    }
    .headline-choice{
        font-family: 'Poppins';
        font-size: 10px;
        font-weight: 400;
        margin-top: 10px;
    }
    .choice-number1{
        width: 24px;
         height: 24px;
        background-color: #408BFA;
        border-radius: 100%;
        box-shadow: 0 10px 15px rgba(0, 0, 0, 0.1);
        text-align: center;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
    }
    .choice-number2{
        width: 24px;
         height: 24px;
        background-color: #B4E466;
        border-radius: 100%;
        box-shadow: 0 10px 15px rgba(0, 0, 0, 0.1);
        text-align: center;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
    }
    .h3-choice1{
        font-family: 'Poppins';
        font-weight: 600;
        font-size: 7px;
        
    }
    .h3-choice2{
        font-family: 'Poppins';
        font-weight: 600;
        font-size: 7px;


    }
    .h3-choice3{
        font-family: 'Poppins';
        font-weight: 600;
        font-size: 7px;

    }
    .choice-number3{
        width: 24px;
         height: 24px;
        background-color: #9E3FFC;
        border-radius: 100%;
        box-shadow: 0 10px 15px rgba(0, 0, 0, 0.1);
        text-align: center;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
    }
    .choicee-article{
        display: flex;
        flex-direction: row;
        gap: 10px;
        margin: 10px auto;

    }
    .choice-cont1{
        color: black;
    }
    .p-choice1{
        font-size: 7px;
        font-weight: 300;
        font-family: 'Poppins';
        font-style: normal;
    }
    .p-choice2{
        font-size: 7px;
        font-weight: 300;
        font-family: 'Poppins';
        font-style: normal;
    }
    .p-choice3{
        font-size: 7px;
        font-weight: 300;
        font-family: 'Poppins';
        font-style: normal;
    }


    /* tuturail section */
    .article-tut {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 10px;
        padding: 20px;
        padding-top: 20px;
        margin: 0px auto;
        /* Switch to 1 column on mobile */
        grid-template-columns: 1fr;
        /* Let the height adjust naturally */
        grid-template-rows: auto;


    }

    .head-tut {
        text-align: center;
        font-family: 'Poppins';
        font-weight: 700;
        font-size: 34px;
    }

    .container1-tut {
        background-color: rgba(158, 63, 252, 0.53);
        padding-top: 50px;
        padding-bottom: 10px;
        padding-right: 30px;
        padding-left: 30px;
        border-radius: 15px;
        border: 1px solid black;
    }

    .container1-tut:hover {
        transform: scale(1.02);
        cursor: pointer;
        box-shadow: 0 10px 15px rgba(0, 0, 0, 0.1);
    }

    .haed1-tut {
        font-family: 'Poppins';
        font-style: normal;
        font-weight: 700;
        font-size: 30px;
    }

    .img-tut1-cont {
        width: 50px;
        height: 50px;
        float: right;

    }

    .container2-tut {
        background: rgba(180, 228, 102, 0.49);
        padding-top: 50px;
        padding-bottom: 10px;
        padding-right: 30px;
        padding-left: 30px;
        border-radius: 15px;
        border: 1px solid black;
        text-align: left;


    }

    .haed2-tut {
        font-family: 'Poppins';
        font-style: normal;
        font-weight: 700;
        font-size: 32px;
    }

    .container2-tut:hover {
        transform: scale(1.02);
        cursor: pointer;
        box-shadow: 0 10px 15px rgba(0, 0, 0, 0.1);
    }

    .img-tut2-cont {
        width: 50px;
        height: 50px;
        float: right;

    }

    .img-tut2 {}

    .container3-tut {
        background: rgba(64, 139, 250, 0.33);
        padding-top: 50px;
        padding-bottom: 10px;
        padding-right: 30px;
        padding-left: 30px;
        border-radius: 15px;
        border: 1px solid black;

    }

    .container3-tut:hover {
        transform: scale(1.02);
        cursor: pointer;
        box-shadow: 0 10px 15px rgba(0, 0, 0, 0.1);
    }

    .haed3-tut {
        font-family: 'Poppins';
        font-style: normal;
        font-weight: 700;
        font-size: 30px;
    }

    .img-tut3-cont {
        width: 50px;
        height: 50px;
        float: right;

    }

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
        height: 150px;
        /* Adjusted for smaller screens */
    }

    .answer-top {
        font-size: 20px;
    }
}

@keyframes shaderMove {
    0% {
        background-position: 0% 0%;
    }

    100% {
        background-position: 100% 100%;
    }
}
</style>