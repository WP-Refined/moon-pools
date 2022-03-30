<template>
  <div class="text-center mt--2 mb-2">
    <span class="text-sm font-semibold text-highlight">
      Epoch {{ currentEpoch }}
    </span>
  </div>
</template>

<script>
export default {
  data() {
    return {
      currentEpoch: null,
    };
  },

  mounted() {
    this.determineCurrentEpoch();
  },

  methods: {
    determineCurrentEpoch() {
      this.$data.currentEpoch = '327';
    },
  },
};
</script>
