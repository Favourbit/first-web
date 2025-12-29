<script setup>
    import { ref, onMounted } from 'vue';
    
    const isVisible = ref(false);
    const target = ref(null);
    
    onMounted(() => {
      const observer = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
          if (entry.isIntersecting) {
            isVisible.value = true;
          }
        });
      }, { threshold: 0.1 }); // Triggers when 10% of the element is visible
    
      if (target.value) observer.observe(target.value);
    });
    </script>
    
    <template>
      <div
        ref="target"
        :class="[
          'transition-all duration-1000 ease-out',
          isVisible ? 'translate-y-0 opacity-100' : 'translate-y-20 opacity-0'
        ]"
      >
        <slot />
      </div>
    </template>