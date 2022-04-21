<template>
  <div
    class="w-min-max rounded-md border-solid py-0.5 text-center text-white"
    :class="[saturatedBgColour]"
  >
    <span>{{ saturatedPercentage }}</span>
  </div>
</template>

<script>
export default {
  props: {
    amount: {
      type: [Number, String],
      required: true,
    },
  },

  computed: {
    saturatedBgColour() {
      const amount = Number(this.$props.amount);

      switch (true) {
        case amount >= 90:
          return 'bg-red-400';
        case amount >= 70:
          return 'bg-orange-400';
        case amount >= 50:
          return 'bg-green-400';
        case amount < 49:
        default:
          return 'bg-green-400';
      }
    },

    saturatedPercentage() {
      return Math.abs(Math.floor(Number(this.$props.amount))) + '%';
    },
  },
};
</script>
