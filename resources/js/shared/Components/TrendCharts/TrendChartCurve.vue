<script>
import { h } from 'vue';
import genPoints from './Composables/genPoints';
import genPath from './Composables/genPath';

export default {
  name: 'TrendChartCurve',
  props: {
    boundary: {
      type: Object,
      required: true,
    },
    minValue: {
      type: Number,
      required: true,
    },
    maxValue: {
      type: Number,
      required: true,
    },
    maxAmount: {
      type: Number,
      required: true,
    },
    activeLineParams: {
      type: Object,
      default: () => {},
    },
    data: {
      type: Array,
      required: true,
    },
    className: {
      type: String,
      default: '',
    },
    smooth: {
      type: Boolean,
      default: false,
    },
    stroke: {
      type: Boolean,
      default: true,
    },
    fill: {
      type: Boolean,
      default: false,
    },
    showPoints: {
      type: Boolean,
      default: false,
    },
  },
  computed: {
    points() {
      return genPoints(
        this.data,
        this.boundary,
        this.maxValue,
        this.minValue,
        this.maxAmount,
      );
    },
    paths() {
      return genPath(this.points, this.smooth, this.boundary);
    },
  },
  render() {
    const children = [];
    // Fill path
    if (this.fill && this.paths && this.paths.fillPath) {
      children.push(
        h('path', {
          class: 'fill',
          d: this.paths.fillPath,
          fill: 'rgba(0,0,0,0.15)',
        }),
      );
    }
    // Stroke path
    if (this.stroke && this.paths && this.paths.linePath) {
      children.push(
        h('path', {
          class: 'stroke',
          d: this.paths.linePath,
          fill: 'none',
          stroke: 'black',
        }),
      );
    }
    // Points
    if (this.showPoints && this.points) {
      children.push(
        h(
          'g',
          {
            class: 'points',
          },
          this.points.map((point, i) =>
            h('circle', {
              class: {
                point: true,
                'is-active':
                  this.activeLineParams && this.activeLineParams.index === i,
              },
              cx: point.x,
              cy: point.y,
              r: 2,
              stroke: '#000000',
              'stroke-width': 1,
            }),
          ),
        ),
      );
    }

    // Render component
    return h(
      'g',
      {
        class: this.className,
      },
      children,
    );
  },
};
</script>
