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
                    icon="file_download"
                ></ui-icon-button>
                <ui-icon-button :class="toolbarItemClass" icon="print"></ui-icon-button>
                <ui-icon-button
                    :class="toolbarItemClass"
                    icon="bookmark"
                ></ui-icon-button>
            </template>
        </ui-top-app-bar>

        <ui-drawer v-model="openDrawer" type="modal">
            <ui-drawer-header>
                <ui-drawer-title>Header here</ui-drawer-title>
            </ui-drawer-header>
            <ui-drawer-content>
                <ui-list>
                    <ui-item active>
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
            <slot />
        </div>
    </div>
</template>

<script>
import { UiTopAppBar } from 'balm-ui/components/top-app-bar';
import { UiDrawer } from 'balm-ui/components/drawer';
import { UiList } from 'balm-ui/components/list';
import { UiIcon } from 'balm-ui/components/icon';
export default {
    components: {
        // UiTopAppBar,
        UiIcon,
        UiTopAppBar,
        UiDrawer,
        UiList,
    },

    data() {
        return {
            openDrawer: false,
        };
    },
}
</script>
