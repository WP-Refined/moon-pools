<template>
  <div class="py-3">
    <ui-textfield
      :model-value="poolFilter"
      fullwidth
      outlined
      auto-focus
      placeholder="Search ..."
      @update:model-value="$emit('search', $event)"
    ></ui-textfield>
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
    };
  },
};
</script>
