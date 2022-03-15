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

<script lang="ts">
import { defineComponent } from 'vue';
import type { Insight } from './types/Insight';

interface State {
    availableInsights: Insight[];
}

export default defineComponent({
    data(): State {
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
            ] as Insight[],
        };
    },
});
</script>
