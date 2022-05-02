<template>
  <div class="mb-4 text-center">
    <ui-icon>volunteer_activism</ui-icon>
    <h2>Our favourite pools and supportors of this site, check them out!</h2>
  </div>
  <pools-table favourites></pools-table>
</template>

<script>
import PoolsTable from '../Pools/PoolsTable.vue';

export default {
  components: {
    PoolsTable,
  },
  data() {
    return {
      activeTab: 0,
    };
  },
};
</script>
