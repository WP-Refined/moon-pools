<template>
    <div class="mx-2">
        <div class="my-5">
            <ui-select
                icon="trending_up"
                :options="availableInsights"
                :fullwidth="true"
                outlined
            >
            </ui-select>
        </div>
        <div class="graph--container">
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
