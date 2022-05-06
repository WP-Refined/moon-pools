<template>
  <div class="mt-4 mb-1 mx-2 text-center">
    <h3 class="my-0">Our favourite pools, and supporters. <br>Check them out! <ui-icon :size="12" class="text-red-400 align-middle">favorite</ui-icon></h3>
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
