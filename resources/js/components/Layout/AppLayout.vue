<template>
  <div class="page--top-app-bar">
    <ui-top-app-bar
      content-selector="#content-main"
      :type="0"
      :title="appBarTitle"
      @nav="openSidebar = true"
    >
      <template #toolbar="{ toolbarItemClass }">
        <ui-icon-button
          :class="toolbarItemClass"
          icon="filter_drama"
        ></ui-icon-button>
      </template>
    </ui-top-app-bar>

    <ui-drawer v-model="openSidebar" type="modal">
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
          <ui-item @click="openSidebar = false">
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
      <slot name="content" />
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      appBarTitle: 'Moon Pools',
      openSidebar: false,
    };
  },
};
</script>
