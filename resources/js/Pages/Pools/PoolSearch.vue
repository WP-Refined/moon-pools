<template>
    <div class="grid grid-cols-6 gap-4 py-3">
        <div class="col-span-5">
            <ui-autocomplete
                v-model="poolFilter"
                outlined
                placeholder="Search ..."
                delay="500"
                :source="source"
                auto-focus
                @search="onSearch"
            ></ui-autocomplete>
        </div>
        <div class="col-span-1">
            <ui-button raised>Advanced</ui-button>
        </div>
    </div>
</template>

<script lang="ts">
import { defineComponent } from 'vue';

export default defineComponent({
    emits: ['search'],
    data() {
        return {
            poolFilter: '',
            source: [],
        };
    },
    methods: {
        onSearch: (event: Event) => {
            // this.$emit('search', event);
            // this.$data.poolFilter;
        },
    },
});
</script>
