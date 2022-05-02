<template>
  <div
    class="w-min-max rounded-md border-solid text-center text-white"
    :class="[saturatedBgColour, { 'py-0.5': size !== 'sm' }]"
  >
    <span class="font-bold">{{ saturatedPercentage }}</span>
  </div>
</template>

<script>
export default {
  props: {
    amount: {
      type: [Number, String],
      required: true,
    },
    size: {
      type: [Number, String],
      required: false,
      default: 'md',
      validator: val => {
        return ['sm', 'md'].includes(val);
      },
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
          return 'bg-moon-green';
        case amount < 49:
        default:
          return 'bg-moon-green';
      }
    },

    saturatedPercentage() {
      return Math.abs(Math.floor(Number(this.$props.amount))) + '%';
    },
  },
};
</script>
