<template>
    <div class="py-3">
        <ui-autocomplete
            v-model="poolFilter"
            outlined
            placeholder="Search ..."
            delay="500"
            :source="[]"
            auto-focus
        ></ui-autocomplete>
        <ui-button raised>Advanced</ui-button>
    </div>
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
                v-tooltip="
                    'Return of ADA based on staking result from last 30 days'
                "
                aria-describedby="th-cell-1"
            >
                error_outline
            </ui-icon>
        </template>
        <template #ticker="{ data }">
            <div class="ticker">{{ data.ticker }}</div>
        </template>
        <template #actions="{ data }">
            <ui-icon @click="show(data)">description</ui-icon>
        </template>

        <ui-pagination
            v-model="page"
            :total="total"
            show-total
            @change="onPage"
        ></ui-pagination>
    </ui-table>
</template>

<script lang="ts">
import { defineComponent } from 'vue';
import { Pool } from './types/Pool';

export default defineComponent({
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
            ] as Pool[],
            thead: [
                'Details',
                {
                    value: 'Ticker',
                    sort: 'asc',
                    columnId: 'ticker',
                },
                {
                    slot: 'th-roa',
                    columnId: 'roa',
                },
                'Saturation',
                'Fees / Margin',
                'Luck',
            ],
            tbody: [
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
                    fn: (data: Pool) => {
                        return data.roa + '%';
                    },
                },
                {
                    field: 'saturation',
                    fn: (data: Pool) => {
                        return data.saturation + 'm / 64m';
                    },
                },
                {
                    field: 'fees',
                },
                {
                    field: 'luck',
                },
            ],
            selectedRows: [],
            page: 1,
            total: 12,
            poolFilter: '',
        };
    },

    methods: {
        show(data: any) {
            alert(JSON.stringify(data));
        },
        onPage(page: Event) {
            alert('Page change to ' + page);
        },
    },
});
</script>
