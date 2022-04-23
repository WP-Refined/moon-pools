<template>
  <div>
    <span>{{ fixedFees }} / {{ marginPercentage }}</span>
  </div>
</template>

<script>
export default {
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
      // return Math.abs(Math.trunc(Number(this.$props.fee).toFixed(2)));
      return 340;
    },

    marginPercentage() {
      return Math.abs(Number(this.$props.margin).toFixed(2)) + '%';
    },
  },
};
</script>
