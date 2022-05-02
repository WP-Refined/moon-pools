<template>
  <div class="mx-2">
    <pool-search @search="onSearch" />
    <div class="overflow-hidden">
      <ui-table
        v-model="selectedRows"
        fullwidth
        :data="poolData"
        :thead="thead"
        :tbody="tbody"
        :show-progress="poolTableLoading"
      >
        <template #actions="{ data }">
          <ui-fab mini icon="add" @click="showPoolModal(data)" />
        </template>

        <template #ticker="{ data }">
          <div class="ticker">{{ data?.detail?.ticker }}</div>
        </template>

        <template #th-saturation>
          Saturation
          <ui-icon
            v-tooltip="
              'Pools can only stake a limited amount of ADA before returns are diminished. If the pool is close to 100%' +
              ' it is recommended to stake with another pool.'
            "
            aria-describedby="th-cell-1"
          >
            error_outline
          </ui-icon>
        </template>
        <template #saturation="{ data }">
          <saturation-bar :amount="data?.detail?.live_saturation || 0" />
        </template>

        <template #fees="{ data }">
          <margin-fees
            :fee="data?.detail?.fixed_cost || 0"
            :margin="data?.detail?.margin_cost || 0"
          />
        </template>

        <ui-pagination
          v-model="page"
          :total="total"
          show-total
          @change="onPage"
        ></ui-pagination>
      </ui-table>
    </div>

    <pool-modal
      :show-modal="poolModalOpen"
      :pool-data="poolModalData"
      @close="closePoolModal"
    />
  </div>
</template>

<script>
import { HttpFetch } from '../../shared/Lib';
import PoolSearch from './PoolSearch.vue';
import PoolModal from './PoolModal.vue';
import SaturationBar from '../../shared/Components/UI/SaturationBar.vue';
import MarginFees from '../../shared/Components/UI/MarginFees.vue';

const TABLE_HEADERS = [
  {
    value: 'Details',
  },
  {
    value: 'Ticker',
    columnId: 'ticker',
  },
  {
    value: 'Name',
  },
  {
    slot: 'th-saturation',
    columnId: 'saturation',
  },
  {
    value: 'Fees / Margin',
  },
];

const TABLE_FIELDS = [
  {
    width: 100,
    slot: 'actions',
  },
  {
    width: 200,
    fn: data => data?.detail?.ticker || '-',
  },
  {
    field: 'name',
    fn: data => data?.detail?.name,
  },
  {
    slot: 'saturation',
  },
  {
    slot: 'fees',
  },
];

export default {
  components: {
    PoolSearch,
    PoolModal,
    SaturationBar,
    MarginFees,
  },

  data() {
    return {
      poolData: [],
      thead: TABLE_HEADERS,
      tbody: TABLE_FIELDS,
      selectedRows: [],
      page: 1,
      total: 12,
      poolFilter: '',
      poolModalData: {},
      poolModalOpen: false,
      poolTableLoading: true,
    };
  },

  mounted() {
    this.loadPoolData();
  },

  methods: {
    loadPoolData(filter) {
      filter = filter || '';

      HttpFetch.get(`/pools?filter=${filter}`)
        .then(response => {
          this.$data.poolData = response?.data || [];
          this.$data.total = response?.meta?.last_page || 1;
          this.$data.poolTableLoading = false;
        })
        .catch(error => console.error('Unexpected error occurred: ', error));
    },

    showPoolModal(data) {
      this.$data.poolModalData = { ...(data?.detail || {}) };
      this.$data.poolModalOpen = true;
    },

    closePoolModal() {
      this.$data.poolModalOpen = false;
    },

    onPage(page) {
      alert('Page change to ' + page);
    },

    onSearch(input) {
      this.$data.poolTableLoading = true;
      this.loadPoolData(input);
    },
  },
};
</script>

<style lang="scss" scoped>
// Decrease size just for the pool table rows
.mdc-fab--mini {
  width: 30px;
  height: 30px;
}
</style>
