<script setup lang="ts">
    // This is like 'require'
    import MyHeader from '@/components/header.vue';
    import MyFooter from '@/components/footer.vue';
    </script>
    
    <template>
        <MyHeader />
    
        <main>
            <h1>This is my about us</h1>
            <p>I am calling the header and footer manually.</p>
        </main>
    
        <MyFooter />
    </template>