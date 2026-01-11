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
                <h1 class="main-head">Built for Your 
                    <span class="span-class"> Financial</span> Peace
                </h1>
                <p class="main-p">We believe that managing money shouldn't feel like a second job. It should feel like progress.</p>
                
                <Link href="/signup" class="main-button-link">
                    Start Your Journey <i class="fa-solid fa-arrow-right" style="margin-left: 10px;"></i>
                </Link>
            </div>

            <div class="zip translate-y-0 opacity-100 transition-all delay-300 duration-750 starting:translate-y-4 starting:opacity-0">
                <img class="main-haed-pic" src="images/financial cost budget vector icon-Photoroom.png" alt="Our Mission">
            </div>
        </section>

        <ScrollReveal>
            <article class="answer-article">
                <div class="answer-container">
                    <h2 class="answer-top">Our <span class="answer-pay">Mission</span></h2>
                    <p class="answer-p">
                        Smart Tracker was born out of a simple frustration: bank apps are boring and spreadsheets are hard. 
                        We set out to build a tool that feels as intuitive as social media but as powerful as a private accountant.
                        <br><br>
                        Today, we help users across the globe stop asking "where did my money go?" and start saying "I know exactly where I'm going."
                    </p>
                </div>
                <div class="immage-container-1" style="display: flex; justify-content: center; align-items: center; background-color: #f0f0f0;">
                     <h2 style="font-family: 'Poppins'; font-weight: 800; color: #408BFA; font-size: 40px;">100% Secure</h2>
                </div>
            </article>
        </ScrollReveal>

        <hr class="line">

        <section>
            <h2 class="head-tut">The Core Principles</h2>
            <article class="article-tut">
                <div class="container1-tut">
                    <h3 class="haed1-tut">Privacy First</h3>
                    <p class="tut-p1">We never sell your data. Your financial business is exactly that—yours.</p>
                    <div class="img-tut1-cont">
                        <i class="fa-solid fa-shield-halved fa-2xl" style="color: #000;"></i>
                    </div>
                </div>

                <div class="container2-tut">
                    <h3 class="haed2-tut">Radical Simplicity</h3>
                    <p class="tut-p2">If it takes more than two taps to log an expense, we failed. We design for speed and clarity above all else.</p>
                    <div class="img-tut2-cont">
                         <img src="/images/Personal improvement black icon-Photoroom.png" alt="Simplicity" style="width: 100px;">
                    </div>
                </div>

                <div class="container3-tut">
                    <h3 class="haed3-tut">Growth Focused</h3>
                    <p class="tut-p3">Tracking is just the start. We provide the insights you need to actually save for the things you love.</p>
                    <div class="img-tut3-cont">
                        <i class="fa-solid fa-chart-line fa-2xl" style="color: #000;"></i>
                    </div>
                </div>
            </article>
        </section>

        <div class="cont-cta">
            <div class="cont-ct1a">
                <h1 class="ready-cta">Ready</h1> 
                <h1 class="h1-cta"> to join </h1>
                <h1 class="control-cta">the Movement?</h1>
            </div>
            <p class="p-cta">Join the community of smart savers building a stress-free financial future.</p>
            <button class="link-cta">
                <Link href="/signup">Get Started for Free</Link>
            </button>
        </div>
        </main>
    
        <MyFooter />
    </template>


    <style scoped>
/* --- 1. REUSING YOUR THEME ANIMATIONS --- */
@keyframes shaderMove {
    0% { background-position: 0% 0%; }
    100% { background-position: 100% 100%; }
}

/* --- 2. HERO SECTION --- */
main {
    padding-top: 80px; /* Space for fixed header */
}

.main-section {
    display: flex;
    flex-direction: row;
    justify-content: space-around;
    align-items: center;
    width: 100%;
    min-height: 90vh;
    background-color: white;
    background-image:
        radial-gradient(at 0% 0%, rgba(158, 63, 252, 0.2) 0px, transparent 50%),
        radial-gradient(at 100% 0%, rgba(64, 139, 250, 0.2) 0px, transparent 50%),
        radial-gradient(at 100% 100%, rgba(180, 228, 102, 0.3) 0px, transparent 50%);
    background-size: 200% 200%;
    animation: shaderMove 15s ease infinite alternate;
}

.main-fisrt-div {
    margin-left: 90px;
    max-width: 600px;
    display: flex;
    flex-direction: column;
}

.main-head {
    font-size: 54px;
    font-family: 'Poppins', sans-serif;
    font-weight: 700;
    line-height: 1.1;
    color: #000;
}

.span-class {
    color: #B4E466; /* Your signature Lime */
}

.main-p {
    font-family: 'Poppins', sans-serif;
    font-size: 1.2rem;
    margin-top: 20px;
    line-height: 1.6;
    color: #333;
}

.main-button-link {
    background-color: #000;
    width: fit-content;
    padding: 14px 35px;
    color: #fff;
    border-radius: 100px;
    margin-top: 30px;
    text-decoration: none;
    font-weight: 600;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.main-button-link:hover {
    transform: translateY(-3px);
    box-shadow: 0 10px 20px rgba(0,0,0,0.15);
}

.main-haed-pic {
    height: 450px;
    filter: drop-shadow(0 20px 30px rgba(0,0,0,0.1));
}

/* --- 3. MISSION CARD (Purple Gradient) --- */
.answer-article {
    width: 85%;
    max-width: 1100px;
    background: linear-gradient(135deg, #9E3FFC 0%, #430086 100%);
    margin: 100px auto;
    padding: 60px;
    border-radius: 24px;
    display: flex;
    align-items: center;
    gap: 50px;
    box-shadow: 0 20px 40px rgba(158, 63, 252, 0.2);
}

.answer-top {
    font-family: 'Poppins';
    font-weight: 700;
    font-size: 32px;
    background: #fff;
    padding: 10px 20px;
    border-radius: 12px;
    transform: rotate(-2deg);
    display: inline-block;
    margin-bottom: 20px;
}

.answer-pay { color: #9E3FFC; }

.answer-p {
    color: #fff;
    font-family: 'Poppins';
    font-size: 18px;
    line-height: 1.8;
    opacity: 0.9;
}

/* --- 4. VALUES GRID --- */
.head-tut {
    text-align: center;
    font-family: 'Poppins';
    font-size: 42px;
    font-weight: 800;
    margin-bottom: 50px;
}

.article-tut {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 25px;
    padding: 0 90px 100px;
}

.container1-tut, .container2-tut, .container3-tut {
    padding: 40px;
    border-radius: 20px;
    border: 1px solid rgba(0,0,0,0.05);
    transition: all 0.3s ease;
}

/* Reusing your homepage colors for the boxes */
.container1-tut { background: rgba(158, 63, 252, 0.1); } /* Purple tint */
.container2-tut { background: rgba(180, 228, 102, 0.1); } /* Lime tint */
.container3-tut { background: rgba(64, 139, 250, 0.1); }  /* Blue tint */

.container1-tut:hover, .container2-tut:hover, .container3-tut:hover {
    transform: translateY(-10px);
    background: #fff;
    box-shadow: 0 15px 30px rgba(0,0,0,0.08);
    border-color: #000;
}

.haed1-tut, .haed2-tut, .haed3-tut {
    font-family: 'Poppins';
    font-weight: 700;
    font-size: 24px;
    margin-bottom: 15px;
}

/* --- 5. CALL TO ACTION (Reusing your styles) --- */
.cont-cta {
    padding: 100px 20px;
    text-align: center;
    background: radial-gradient(circle at center, #E9FDCA 0%, #B4E466 100%);
}

.cont-ct1a { display: flex; justify-content: center; align-items: center; gap: 15px; }

.ready-cta, .control-cta {
    font-family: 'Poppins';
    font-weight: 700;
    padding: 10px 20px;
    border-radius: 15px;
    color: white;
}

.ready-cta { background: #408BFA; transform: rotate(3deg); }
.control-cta { background: #9E3FFC; transform: rotate(-3deg); }

.h1-cta { font-family: 'Poppins'; font-size: 32px; font-weight: 700; }

.link-cta {
    margin-top: 40px;
    background: linear-gradient(90deg, #408BFA, #9E3FFC);
    border: none;
    padding: 15px 40px;
    border-radius: 50px;
    cursor: pointer;
}

.link-cta a {
    color: white;
    text-decoration: none;
    font-weight: 700;
    font-size: 1.2rem;
}

/* --- 6. RESPONSIVE --- */
@media (max-width: 1024px) {
    .article-tut { grid-template-columns: 1fr; padding: 20px; }
    .main-section { flex-direction: column; text-align: center; padding: 100px 20px; }
    .main-fisrt-div { margin-left: 0; }
    .answer-article { flex-direction: column; width: 90%; padding: 40px 20px; }
    .main-haed-pic { height: 300px; margin-top: 40px; }
}
</style>