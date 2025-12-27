<script setup lang="ts">
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
        </main>
    
        <MyFooter />
    </template>
    
    <style scoped>
    /* --- DESKTOP (Your Original Specs) --- */
    main {
        padding-top: 80px; 
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
        background-size: cover;
    }
    
    .zip {
        margin-right: 30px;
        display: flex;
    align-items: flex-end; /* This pushes the image to the bottom of the flex container */
    position: relative;
    }
    
    .main-fisrt-div {
        margin-left: 90px; /* Your original margin */
        display: flex;
        flex-direction: column;
    }
    
    .main-head {
        font-size: 54px; /* Your original size */
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
        padding: 12px 30px; /* Your original size */
        /* height: 47px; */
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

        margin-bottom: 0;
        object-fit: contain; /* Prevents the image from stretching weirdly */
        display: block; 
    height: 420px;
    width: auto; 
    max-width: 1440px; 
    
    filter: drop-shadow(0 0 50px rgba(180, 228, 102, 0.3)); 
    }
    
    .span-class {
        color: #B4E466;
    }
    
    /* --- MOBILE RESPONSIVENESS (Only triggers on small screens) --- */
    @media (max-width: 1100px) {
        .main-section {
            flex-direction: column;
            height: auto;
            padding: 50px 20px;
            text-align: center;
        }
    
        .main-haed-pic {
            width: 100%;    /* Overrides 1440px so it fits on phone */
            height: auto;   /* Overrides 420px so it keeps its shape */
            max-width: 350px; 
            filter: drop-shadow(0 0 50px rgba(180, 228, 102, 0.3));
        }
    
        .main-fisrt-div {
            margin-left: 0;
            align-items: center;
        }
    
        .main-head {
            font-size: 32px;
            line-height: 42px;
        }
    
        .zip {
            margin-right: 0;
            display: flex;
    align-items: flex-end; /* This pushes the image to the bottom of the flex container */
    position: relative;
        }
    }
    </style>