<template>
    <app-layout>
        <template #content>
            <total-staked-ada />

            <ui-tab-bar v-model="activeTab" class="hero-demo-tab-bar">
                <ui-tab> Pools </ui-tab>
                <ui-tab> Favourites </ui-tab>
                <ui-tab> Rewards </ui-tab>
            </ui-tab-bar>
            <ui-panels v-model="activeTab">
                <ui-panel>
                    <pools-table></pools-table>
                </ui-panel>
                <ui-panel>...</ui-panel>
                <ui-panel>...</ui-panel>
            </ui-panels>
        </template>
    </app-layout>
</template>

<script>
import AppLayout from '../components/Layout/AppLayout.vue';
import PoolsTable from '../components/Pools/PoolsTable.vue';
import TotalStakedAda from '../components/Reports/charts/TotalStakedAda.vue';

export default {
    components: {
        AppLayout,
        PoolsTable,
        TotalStakedAda,
    },
    data() {
        return {
            activeTab: 0,
        };
    },
};
</script>
