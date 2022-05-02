<template>
  <div class="py-3">
    <ui-textfield
      v-model="poolFilter"
      fullwidth
      outlined
      auto-focus
      with-trailing-icon
      placeholder="Search ..."
    >
      <template #after>
        <ui-textfield-icon
          :class="{ visible: isFiltered, invisible: !isFiltered }"
          @click="resetPoolFilter"
        >
          close
        </ui-textfield-icon>
      </template>
    </ui-textfield>
  </div>
</template>

<script>
export default {
  props: {
    filter: {
      type: String,
      required: false,
      default: '',
    },
  },

  emits: ['search'],

  data() {
    return {
      poolFilter: this.$props.filter,
      isFiltered: this.$props.filter.length > 0,
    };
  },

  watch: {
    poolFilter(val) {
      this.$data.isFiltered = val.length > 0;
      this.$emit('search', val);
    },
  },

  methods: {
    resetPoolFilter() {
      this.$data.isFiltered = false;
      this.$data.poolFilter = '';
    },
  },
};
</script>
