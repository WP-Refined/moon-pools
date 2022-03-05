<template>
    <div class="page--top-app-bar">
        <ui-top-app-bar
            content-selector="#content-main"
            :type="type"
            :title="title"
            @nav="openDrawer = true"
        >
            <template #toolbar="{ toolbarItemClass }">
                <ui-icon-button
                    :class="toolbarItemClass"
                    icon="invert_colors"
                ></ui-icon-button>
                <ui-icon-button
                    :class="toolbarItemClass"
                    icon="filter_drama"
                ></ui-icon-button>
            </template>
        </ui-top-app-bar>

        <ui-drawer v-model="openDrawer" type="modal">
            <ui-drawer-header>
                <ui-drawer-title>Menu</ui-drawer-title>
            </ui-drawer-header>
            <ui-drawer-content>
                <ui-list>
                    <ui-item active>
                        <ui-item-first-content>
                            <ui-icon>dashboard</ui-icon>
                        </ui-item-first-content>
                        <ui-item-text-content>Dashboard</ui-item-text-content>
                    </ui-item>
                    <ui-item>
                        <ui-item-first-content>
                            <ui-icon>featured_play_list</ui-icon>
                        </ui-item-first-content>
                        <ui-item-text-content>Pools</ui-item-text-content>
                    </ui-item>
                    <ui-item>
                        <ui-item-first-content>
                            <ui-icon>collections_bookmark</ui-icon>
                        </ui-item-first-content>
                        <ui-item-text-content>Favourites</ui-item-text-content>
                    </ui-item>
                    <ui-item>
                        <ui-item-first-content>
                            <ui-icon>trending_up</ui-icon>
                        </ui-item-first-content>
                        <ui-item-text-content>Reports</ui-item-text-content>
                    </ui-item>
                    <ui-item>
                        <ui-item-first-content>
                            <ui-icon>arrow_back</ui-icon>
                        </ui-item-first-content>
                        <ui-item-text-content>Back</ui-item-text-content>
                    </ui-item>
                    <ui-list-divider></ui-list-divider>
                </ui-list>
            </ui-drawer-content>
        </ui-drawer>

        <div id="content-main">
            <p v-for="i in 5" :key="i">Content {{ i }}</p>
            <ui-tab-bar v-model="active" class="hero-demo-tab-bar">
                <ui-tab> Pools </ui-tab>
                <ui-tab> Favourites </ui-tab>
                <ui-tab> Rewards </ui-tab>
            </ui-tab-bar>
            <ui-panels>
                <ui-panel>
                    <pools-table></pools-table>
                </ui-panel>
                <ui-panel>...</ui-panel>
                <ui-panel>...</ui-panel>
            </ui-panels>
        </div>
    </div>
</template>

<script lang="ts">
import { defineComponent } from 'vue';
import PoolsTable from './../Pools/PoolsTable.vue';

export default defineComponent({
    components: {
        PoolsTable,
    },
    data() {
        return {
            active: 0,
            type: 0,
            title: 'Cardano Insights',
            openDrawer: false,
            list: ['Pools', 'Favourites', 'Rewards'],
        };
    },
});
</script>
