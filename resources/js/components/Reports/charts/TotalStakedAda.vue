<template>
    <div class="mp-chart">
        <trend-chart
            :datasets="dataset"
            :min="0"
            padding="5 0 0 0"
            :interactive="true"
            @mouse-move="onMouseMove"
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

    methods: {
        numberWithSpaces(n) {
            return n.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ' ');
        },
        onMouseMove(params) {
            if (!params) {
                return;
            }
            this.currentInfo = {
                label: params.data[0]?.day,
                value: this.numberWithSpaces(params.data[0]?.downloads || 0),
            };
        },
    },
};
</script>

<style lang="scss">
.mp-chart {
    width: 100%;
    position: relative;

    .vtc {
        width: 100%;
        height: 150px;
    }
    .stroke {
        stroke-width: 2;
    }
    .fill {
        opacity: 0.2;
    }
    .active-line {
        stroke: rgba(0, 0, 0, 0.2);
    }
    .point {
        display: none;
    }
    .point.is-active {
        display: block;
    }

    &::after {
        content: '';
        display: block;
        width: 100%;
        height: 30px;
        background: linear-gradient(180deg, transparent, 50%, white);
        position: absolute;
        bottom: 0px;
    }
}
.curve-vue {
    .stroke {
        stroke: #39af77;
    }
    .fill {
        fill: #39af77;
    }
    .point {
        fill: #39af77;
        stroke: #39af77;
    }
}
</style>
