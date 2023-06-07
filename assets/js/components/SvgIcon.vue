<template>
  <svg width="1em" height="1em" :class="$props.class" fill="currentColor">
    <use :xlink:href="`#${path}`" />
  </svg>
</template>

<script setup>
defineProps({
  path: {
    type: String,
    required: true,
  },
  class: {
    type: String,
    default: "bi",
  },
});
</script>
