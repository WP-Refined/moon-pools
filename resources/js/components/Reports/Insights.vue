<template>
  <div class="mt-5">
    <div class="text-center">
      <h6 class="font-semibold m-0 text-slate-400">Total ADA Staked</h6>
      <h3 class="font-light text-4xl mt-1 mb-1" style="font-family: 'Nunito'">
        $20.64b
      </h3>
    </div>
    <div class="mt-3">
      <total-staked-ada />
    </div>
  </div>
</template>

<script>
import TotalStakedAda from './charts/TotalStakedAda.vue';

export default {
  components: {
    TotalStakedAda,
  },

  data() {
    return {
      availableInsights: [
        {
          value: 1,
          label: 'Total Circulating ADA',
        },
        {
          value: 2,
          label: 'Total Staked ADA',
        },
      ],
    };
  },
};
</script>
