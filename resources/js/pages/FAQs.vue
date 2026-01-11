<script setup lang="ts">
import { ref } from 'vue';
import ScrollReveal from '@/components/ScrollReveal.vue';
import MyHeader from '@/components/header.vue';
import MyFooter from '@/components/footer.vue';

// FAQ Data - Easy to update
const faqs = ref([
    {
        question: "Is my bank data safe with Smart Tracker?",
        answer: "Absolutely. We use bank-grade 256-bit encryption. We only 'read' transaction data to help you categorize it—we never have access to move your money or change your account settings.",
        isOpen: true,
        color: "#9E3FFC" // Purple
    },
    {
        question: "Does it cost anything to use?",
        answer: "We offer a powerful free tier that includes real-time tracking and basic budgeting. Our Premium plan adds advanced forecasting and custom categories for power users.",
        isOpen: false,
        color: "#B4E466" // Lime
    },
    {
        question: "Can I sync multiple bank accounts?",
        answer: "Yes! You can connect all your checking, savings, and credit card accounts to get a bird's-eye view of your entire net worth in one dashboard.",
        isOpen: false,
        color: "#408BFA" // Blue
    },
    {
        question: "What if I use cash for my purchases?",
        answer: "No problem! You can manually add cash transactions in two taps using our 'Quick Log' feature so your budget stays accurate even when you aren't using a card.",
        isOpen: false,
        color: "#9E3FFC"
    }
]);

const toggleFaq = (index: number) => {
    faqs.value[index].isOpen = !faqs.value[index].isOpen;
};
</script>

<template>
    <MyHeader />

    <main class="faq-page">
        <section class="faq-hero">
            <h1 class="main-head">Got <span class="span-class">Questions?</span></h1>
            <p class="main-p">Everything you need to know about taking control of your finances.</p>
        </section>

        <section class="faq-container">
            <ScrollReveal v-for="(faq, index) in faqs" :key="index">
                <div 
                    class="faq-card" 
                    :class="{ 'active': faq.isOpen }"
                    @click="toggleFaq(index)"
                >
                    <div class="faq-question-row">
                        <div class="faq-indicator" :style="{ backgroundColor: faq.color }"></div>
                        <h3 class="faq-question">{{ faq.question }}</h3>
                        <i :class="faq.isOpen ? 'fa-solid fa-minus' : 'fa-solid fa-plus'" class="faq-icon"></i>
                    </div>
                    
                    <transition name="expand">
                        <div v-if="faq.isOpen" class="faq-answer-container">
                            <p class="faq-answer">{{ faq.answer }}</p>
                        </div>
                    </transition>
                </div>
            </ScrollReveal>
        </section>

        <div class="support-box">
            <h2 class="answer-top">Still need <span class="answer-pay">help?</span></h2>
            <p class="p-cta" style="padding: 0; margin-top: 15px;">Can't find what you're looking for? Our team is ready to help.</p>
            <button class="main-button-link" style="margin: 30px auto;">Contact Support</button>
        </div>
    </main>

    <MyFooter />
</template>

<style scoped>
.faq-page {
    padding-top: 100px;
    background-image: 
        radial-gradient(at 0% 0%, rgba(158, 63, 252, 0.1) 0px, transparent 50%),
        radial-gradient(at 100% 100%, rgba(180, 228, 102, 0.1) 0px, transparent 50%);
    min-height: 100vh;
}

.faq-hero {
    text-align: center;
    margin-bottom: 60px;
    padding: 0 20px;
}

.faq-container {
    max-width: 800px;
    margin: 0 auto;
    padding: 0 20px 100px;
    display: flex;
    flex-direction: column;
    gap: 20px;
}

/* FAQ Card Styling */
.faq-card {
    background: white;
    border: 2px solid #000;
    border-radius: 20px;
    padding: 25px;
    cursor: pointer;
    transition: transform 0.2s ease, box-shadow 0.2s ease;
    box-shadow: 6px 6px 0px #000; /* Neobrutalist shadow to match your vibe */
}

.faq-card:hover {
    transform: translate(-2px, -2px);
    box-shadow: 8px 8px 0px #000;
}

.faq-card.active {
    background-color: #fcfcfc;
}

.faq-question-row {
    display: flex;
    align-items: center;
    gap: 15px;
}

.faq-indicator {
    width: 12px;
    height: 12px;
    border-radius: 50%;
    flex-shrink: 0;
}

.faq-question {
    font-family: 'Poppins';
    font-weight: 600;
    font-size: 1.1rem;
    flex-grow: 1;
    color: #000;
}

.faq-icon {
    font-size: 1.2rem;
    color: #000;
}

.faq-answer-container {
    padding-top: 20px;
    padding-left: 27px; /* Align with text, skipping the dot */
}

.faq-answer {
    font-family: 'Poppins';
    font-size: 1rem;
    color: #444;
    line-height: 1.6;
}

/* Support Section */
.support-box {
    text-align: center;
    padding: 80px 20px;
    background: white;
    border-top: 1.5px solid #000;
}

/* Animations for expanding */
.expand-enter-active, .expand-leave-active {
    transition: all 0.3s ease-out;
    max-height: 200px;
    overflow: hidden;
}
.expand-enter-from, .expand-leave-to {
    max-height: 0;
    opacity: 0;
    padding-top: 0;
}

/* Responsive */
@media (max-width: 600px) {
    .faq-container {
        padding-bottom: 50px;
    }
    .faq-question {
        font-size: 1rem;
    }
}
</style>