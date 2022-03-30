<template>
  <div>
    <ui-dialog
      v-model="modalOpen"
      fullscreen
      @confirm="onConfirm"
      @close="onClose"
      @cancel="onClose"
    >
      <ui-dialog-title>POOL NAME HERE</ui-dialog-title>
      <ui-dialog-content>
        <p>Display all important pool details here.</p>
      </ui-dialog-content>
      <ui-dialog-actions></ui-dialog-actions>
    </ui-dialog>
  </div>
</template>

<script>
export default {
  props: {
    showModal: {
      type: Boolean,
      required: true,
    },
    data: {
      type: Object,
      required: true,
      default: () => {
      },
    },
  },

  emits: ['close'],

  data() {
    return {
      modalOpen: this.$props.showModal,
      poolData: this.$props.data,
    };
  },

  watch: {
    showModal(val) {
      this.modalOpen = val;
    },
  },

  methods: {
    onConfirm() {
      // TODO: Needs to redirect to the Pool detail page
      this.$emit('close');
    },
    onClose() {
      this.$emit('close');
    },
  },
};
</script>
