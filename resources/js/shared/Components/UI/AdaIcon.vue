<template>
  <img
    :width="size"
    :height="size"
    :src="'/images/ada-logo.svg'"
    :class="[margin]"
    alt="Cardano Logo"
  />
</template>

<script>
export default {
  props: {
    size: {
      type: [Number, String],
      required: false,
      default: 15,
    },

    margin: {
      type: String,
      required: false,
      default: 'ml-0.5',
    },
  },
};
</script>
