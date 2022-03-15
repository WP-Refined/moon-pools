<template>
    <div class="py-3">
        <ui-autocomplete
            v-model="poolFilter"
            fullwidth
            outlined
            placeholder="Search ..."
            delay="500"
            :source="source"
            auto-focus
            @search="onSearch"
        ></ui-autocomplete>
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
