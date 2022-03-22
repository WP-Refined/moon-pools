<template>
    <div class="mp-trend-chart">
        <trend-chart
            :datasets="dataset"
            :min="0"
            padding="5 0 0 0"
            :interactive="false"
        />
    </div>
</template>

<script>
import TrendChart from '../../../shared/components/TrendCharts/TrendChart.vue';

export default {
    components: {
        TrendChart,
    },

    data() {
        return {
            currentInfo: {
                label: '2022-03-19',
                value: '600 000',
            },
            data: null,
        };
    },

    computed: {
        dataset() {
            return [
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
            ];
        },
    },
};
</script>
