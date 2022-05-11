<template>
  <div>
    <span class="flex items-center">
      {{ fixedFees }}<ada-icon margin="ml-0.5 mr-1" /> / {{ marginPercentage }}
    </span>
  </div>
</template>

<script>
import AdaIcon from './AdaIcon.vue';

export default {
  components: {
    AdaIcon,
  },

  props: {
    fee: {
      type: [Number, String],
      required: true,
    },
    margin: {
      type: [Number, String],
      required: true,
    },
  },

  computed: {
    fixedFees() {
      return Math.abs(Math.trunc(Number(this.$props.fee)));
    },

    marginPercentage() {
      return Math.abs(Number(this.$props.margin).toFixed(2)) + '%';
    },
  },
};
</script>
