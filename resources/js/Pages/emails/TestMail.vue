<script setup>
    defineProps({
        details:{
            type: Object,
            required: true,
        }
    })
</script>

<template>
    <div>
        <p>{{ details }}</p>
    </div>
</template>


