<template>
  <div class="mx-2">
    <pool-search></pool-search>
    <div class="overflow-hidden">
      <ui-table
        v-model="selectedRows"
        fullwidth
        :data="data"
        :thead="thead"
        :tbody="tbody"
      >
        <template #th-roa>
          ROA
          <ui-icon
            v-tooltip="'Return of ADA based on staking result from last 30 days'"
            aria-describedby="th-cell-1"
          >
            error_outline
          </ui-icon>
        </template>
        <template #ticker="{ data }">
          <div class="ticker">{{ data.ticker }}</div>
        </template>
        <template #actions="{ data }">
          <ui-fab mini icon="add" @click="showPoolModal(data)"/>
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
      :data="poolModalData"
      @close="closePoolModal"
    />
  </div>
</template>

<script>
import PoolSearch from './PoolSearch.vue';
import PoolModal from './PoolModal.vue';

const TABLE_HEADERS = [
  {
    value: 'Details',
  },
  {
    value: 'Ticker',
    sort: 'asc',
    columnId: 'ticker',
  },
  {
    slot: 'th-roa',
    columnId: 'roa',
  },
  {
    value: 'Saturation',
  },
  {
    value: 'Fees / Margin',
  },
  {
    value: 'Luck',
  },
];

const TABLE_FIELDS = [
  {
    width: 100,
    slot: 'actions',
  },
  {
    width: 200,
    slot: 'ticker',
  },
  {
    field: 'roa',
    fn: data => {
      return data.roa + '%';
    },
  },
  {
    field: 'saturation',
    fn: data => {
      return data.saturation + 'm / 64m';
    },
  },
  {
    field: 'fees',
  },
  {
    field: 'luck',
  },
];

export default {
  components: {
    PoolSearch,
    PoolModal,
  },
  data() {
    return {
      data: [
        {
          id: 1,
          ticker: 'Frozen yogurt',
          roa: 159,
          saturation: 6,
          fees: 24,
          luck: 4,
        },
        {
          id: 2,
          ticker: 'Ice cream sandwich',
          roa: 237,
          saturation: 9,
          fees: 37,
          luck: 4.3,
        },
        {
          id: 3,
          ticker: 'Eclair',
          roa: 262,
          saturation: 16,
          fees: 24,
          luck: 6,
        },
        {
          id: 4,
          ticker: 'Cupcake',
          roa: 305,
          saturation: 3.7,
          fees: 67,
          luck: 3.9,
        },
        {
          id: 5,
          ticker: 'Gingerbread',
          roa: 356,
          saturation: 16,
          fees: 49,
          luck: 0,
        },
        {
          id: 6,
          ticker: 'Jelly bean',
          roa: 375,
          saturation: 0,
          fees: 94,
          luck: 0,
        },
        {
          id: 7,
          ticker: 'Lollipop',
          roa: 392,
          saturation: 0.2,
          fees: 98,
          luck: 6.5,
        },
        {
          id: 8,
          ticker: 'Honeycomb',
          roa: 408,
          saturation: 3.2,
          fees: 87,
          luck: 4.9,
        },
      ],
      thead: TABLE_HEADERS,
      tbody: TABLE_FIELDS,
      selectedRows: [],
      page: 1,
      total: 12,
      poolFilter: '',
      poolModalData: {},
      poolModalOpen: false,
    };
  },

  methods: {
    showPoolModal(data) {
      this.$data.poolModalData = {...data};
      this.$data.poolModalOpen = true;
    },
    closePoolModal() {
      this.$data.poolModalOpen = false;
      this.$data.poolModalData = {};
    },
    onPage(page) {
      alert('Page change to ' + page);
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