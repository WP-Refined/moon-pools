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

<script>
export default {
  emits: ['search'],
  data() {
    return {
      poolFilter: '',
      source: [],
    };
  },
  methods: {
    onSearch: event => {
      this.$emit('search', event);
      // this.$data.poolFilter
    },
  },
};
</script>
