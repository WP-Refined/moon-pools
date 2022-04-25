<template>
  <div>
    <ui-dialog
      v-model="modalOpen"
      fullscreen
      class="pool-detail-modal"
      @confirm="onConfirm"
      @close="onClose"
      @cancel="onClose"
    >
      <ui-dialog-title>
        <div class="flex items-center mt-5">
          <img
            class="mr-1 w-8 rounded-full"
            src="https://cdn.adapools.org/pool_logo/7f6c103302f96390d478a170fe80938b76fccd8a23490e3b6ddebcf7.png"
            alt=""
          />
          <div>
            <span class="font-semibold">({{ poolTicker }}) </span>{{ poolName }}
          </div>
        </div>
      </ui-dialog-title>
      <ui-dialog-content>
        <div class="pb-4">
          <div>
            <strong class="block"> Description </strong>
            <span>
              {{ poolDescription }}
            </span>
          </div>
        </div>
        <div class="grid grid-cols-2 gap-4">
          <div>
            <strong class="block">Website</strong>
            <span>
              <a
                v-if="poolWebsite"
                :href="poolWebsite"
                rel="nofollow noreferrer"
                target="_blank"
                class="truncate"
              >
                {{ poolWebsite }}
              </a>
            </span>
          </div>
          <div>
            <strong class="block"> Saturation </strong>
            <span>
              <saturation-bar :amount="pool?.live_saturation || 0" />
            </span>
          </div>
          <div>
            <strong class="block"> Active Stake </strong>
            <span>
              {{ activeStake }}
            </span>
          </div>
          <div>
            <strong class="block"> Live Stake </strong>
            <span>
              {{ liveStake }}
            </span>
          </div>
          <div>
            <strong class="block"> Pledge </strong>
            <span>
              {{ poolPledge }}
            </span>
          </div>
          <div>
            <strong class="block"> Fixed Cost / Margin </strong>
            <span>
              <margin-fees
                :fee="pool?.fixed_cost || 0"
                :margin="pool?.margin_cost || 0"
              />
            </span>
          </div>
        </div>
        <div class="pt-4">
          <div>
            <strong class="block"> Pool ID </strong>
            <span class="break-all">
              {{ pool?.id }}
            </span>
          </div>
        </div>
      </ui-dialog-content>
      <ui-dialog-actions></ui-dialog-actions>
    </ui-dialog>
  </div>
</template>

<script>
import SaturationBar from '../../shared/Components/UI/SaturationBar.vue';
import MarginFees from '../../shared/Components/UI/MarginFees.vue';

export default {
  components: {
    SaturationBar,
    MarginFees,
  },

  props: {
    showModal: {
      type: Boolean,
      required: true,
    },
    poolData: {
      type: Object,
      required: true,
      default: () => {},
    },
  },

  emits: ['close'],

  data() {
    return {
      modalOpen: this.$props.showModal,
      pool: this.$props.poolData,
    };
  },

  computed: {
    poolName() {
      return this.$data.pool?.name;
    },

    poolWebsite() {
      const website = this.$data.pool?.website;
      if (website === undefined || website === null) {
        return false;
      }

      const protocol = website.substr(0, 8);
      if (protocol !== 'https://' || protocol !== 'http://') {
        return `http://${website}`;
      }

      return website;
    },

    poolTicker() {
      return String(this.$data.pool?.ticker).trim().toUpperCase();
    },

    poolDescription() {
      return this.$data.pool?.description || '-';
    },

    activeStake() {
      return this.formatNumber(this.$data.pool?.declared_pledge);
    },

    liveStake() {
      return this.formatNumber(this.$data.pool?.declared_pledge);
    },

    poolPledge() {
      return this.formatNumber(this.$data.pool?.declared_pledge);
    },
  },

  watch: {
    showModal(val) {
      this.$data.modalOpen = val;
    },

    poolData(val) {
      this.$data.pool = val;
    },
  },

  methods: {
    formatNumber(value) {
      let formatter = Intl.NumberFormat('en', { notation: 'compact' });

      return formatter.format(Number(value) || 0);
    },

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
