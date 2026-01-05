<script setup lang="ts">

    import { ref, computed } from 'vue'; 
    import { Link} from '@inertiajs/vue3';


</script>

<template>
    <footer>

    <div class="footer-cont5">
        <p class="terms">Terms of Service & Privacy Policy</p>
       <p class="copyright"> &copy; Copyright 2025 Smart Tracker</p>
       <p class="support">Contact Support</p>

    </div>
    </footer>
</template>

<style scoped>
      footer{
        width: 100%;
        height: fit-content;
        padding: 20px;
        background-color: #f9f9f9;
      }
      .footer-cont5{
        display: flex;
        justify-content: space-between;
        align-items: center;
        color: black;
        font-family: 'Poppins';
        font-size: 16px;
        gap: 10px;
      }
</style>