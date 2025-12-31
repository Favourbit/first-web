<script setup>
    import { ref, computed } from 'vue'; 
    import { Link, usePage } from '@inertiajs/vue3';
</script>

<template>
    <footer>
        <section class="footer-section">
            <div class="footer-cont1">
                <h1 class="footer-head1">Smart Tracker</h1>
                <p class="footer-p">Turning your transaction history into a <br>roadmap for wealth. Track your MoMo,<br> bank, and cash spending in one beautiful dashboard.</p>
                <h4 class="footer-headfour">
                    <i class="fa-solid fa-shield-halved" style="color: #B4E466; margin-right: 5px;"></i> 
                    Read-Only Consent
                </h4>
            </div>

            <div class="footer-cont2">
                <h2 class="footer-head2">Features</h2>
                <ul class="footer-list">
                    <li class="footer-head2-li">AI Expense Categorization</li>
                    <li class="footer-head2-li">MoMo Sync History</li>
                    <li class="footer-head2-li">Monthly Spending Reports</li>
                    <li class="footer-head2-li">Savings Goal Calculator</li>
                    <li class="footer-head2-li">Debt Payoff Planner</li>
                    <li class="footer-head2-li">Budget vs. Actual Analytics</li>
                </ul>
            </div>

            <div class="footer-cont3">
                <h2 class="footer-head3">Quick Menu</h2>
                <ul class="footer-list">
                    <li class="footer-head3-li"><Link href="/">Login</Link></li>
                    <li class="footer-head3-li"><Link href="/">Signup</Link></li>
                    <li class="footer-head3-li"><Link href="/">Home</Link></li>
                    <li class="footer-head3-li"><Link href="/">About Us</Link></li>
                    <li class="footer-head3-li"><Link href="/">FAQs</Link></li>
                </ul>
            </div>

            <div class="footer-cont4">
                <h2 class="footer-head4">Contact Us</h2>
                <ul class="footer-list">
                    <li class="footer-head2-li">smarttracker@gmail.com</li>
                    <li class="footer-head2-li">+237 6xx xxx xxx</li>
                </ul>
                <div class="footer-socials">
                    <i class="fa-brands fa-whatsapp fa-xl" style="cursor: pointer; color: #25D366;"></i>
                    <i class="fa-brands fa-facebook fa-xl" style="cursor: pointer; color: #1877F2; margin-left: 15px;"></i>
                    <i class="fa-brands fa-x-twitter fa-xl" style="cursor: pointer; color: #000000; margin-left: 15px;"></i>
                </div>
            </div>
        </section>
        
        <hr class="footer-hr">
        
        <div class="footer-cont5">
            <p class="copyright-text">Copyright 2025 Smart Tracker. All rights reserved.</p>
        </div>
    </footer>
</template>

<style scoped>
    footer {
        background-color: #f9f9f9;
        border-top: 1px solid #eaeaea;
    }
    
    .footer-list {
        list-style: none; /* Removes bullets */
        padding: 0;
    }

    .footer-p {
        line-height: 1.6;
        color: rgba(0, 0, 0, 0.7);
        margin-bottom: 15px;
    }

    .footer-cont5 {
        text-align: center;
        padding: 20px;
    }

    .copyright-text {
        font-family: 'Poppins';
        font-size: 14px;
        color: rgba(0, 0, 0, 0.5);
    }

    .footer-headfour {
        font-size: 14px;
        font-family: 'Poppins';
        font-weight: 600;
        color: rgba(0, 0, 0, 0.8);
        display: flex;
        align-items: center;
    }

    .footer-section {
        padding: 80px 40px 40px 40px;
        display: flex;
        flex-direction: row;
        align-items: baseline;
        gap: 60px;
        justify-content: center;
    }

    .footer-head2, .footer-head3, .footer-head4 {
        font-family: 'Poppins';
        font-size: 20px;
        font-weight: 600;
        margin-bottom: 20px;
    }

    .footer-head1 {
        font-size: 32px;
        font-family: 'Poppins';
        font-weight: 700;
        margin-bottom: 15px;
    }

    .footer-head2-li, .footer-head3-li {
        font-family: 'Poppins';
        font-size: 15px;
        color: rgba(0, 0, 0, 0.6);
        font-weight: 400;
        margin-bottom: 10px;
    }

    .footer-head3-li a {
        text-decoration: none;
        color: inherit;
        transition: color 0.3s;
    }

    .footer-head3-li a:hover {
        color: #B4E466;
    }

    .footer-socials {
        margin-top: 20px;
    }

    .footer-hr {
        width: 90%;
        margin: 0 auto;
        border: 0;
        border-top: 1px solid #eaeaea;
    }

    @media (max-width: 850px) {
        .footer-section {
            flex-direction: column;
            gap: 40px;
            padding-left: 30px;
        }
    }
</style>