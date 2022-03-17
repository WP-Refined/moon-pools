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
        <div class="graph">// graph</div>
    </div>
</template>

<script>
export default {
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
