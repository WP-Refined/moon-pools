<template>
  <app-layout>
    <template #content>
      <insights />

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
import Insights from '../components/Reports/Insights.vue';

export default {
  components: {
    AppLayout,
    PoolsTable,
    Insights,
  },
  data() {
    return {
      activeTab: 0,
    };
  },
};
</script>
