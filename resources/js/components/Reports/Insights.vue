<template>
  <div class="mt-5">
    <div class="text-center">
      <h6 class="font-semibold m-0 text-slate-400">Total ADA Staked</h6>
      <h3 class="font-nunito font-light text-4xl mt-1 mb-1">$20.64b</h3>
    </div>
    <div class="mt-3">
      <div class="mp-trend-chart">
        <trend-chart
          :datasets="dataset"
          :min="0"
          padding="5 0 0 0"
          :interactive="false"
        />
      </div>
    </div>
  </div>
</template>

<script>
import { HttpFetch } from '../../shared/Lib';
import TrendChart from '../../shared/Components/TrendCharts/TrendChart.vue';

export default {
  components: {
    TrendChart,
  },

  data() {
    return {
      dataset: [
        {
          data: [
            {
              downloads: 143088,
              day: '2022-03-12',
            },
            {
              downloads: 143961,
              day: '2022-03-13',
            },
            {
              downloads: 609505,
              day: '2022-03-14',
            },
            {
              downloads: 615536,
              day: '2022-03-15',
            },
            {
              downloads: 607010,
              day: '2022-03-16',
            },
            {
              downloads: 577788,
              day: '2022-03-17',
            },
            {
              downloads: 501542,
              day: '2022-03-18',
            },
          ],
          smooth: true,
          showPoints: true,
          fill: true,
          className: `curve-vue`,
        },
      ],
    };
  },

  mounted() {
    this.loadRecentNetworkSupply();
  },

  methods: {
    loadRecentNetworkSupply() {
      return HttpFetch.get('/network/supply')
        .then(response => {
          const recentSupply = [];

          response.data.forEach(item => {
            recentSupply.push({
              downloads: item.active_stake,
              day: item.record_date,
            });
          });

          this.$data.dataset[0].data = recentSupply;
        })
        .catch(error => console.error(error));
    },
  },
};
</script>
