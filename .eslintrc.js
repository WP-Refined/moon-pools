module.exports = {
  env: {
    node: true,
  },
  parser: 'vue-eslint-parser',
  extends: ['eslint:recommended', 'plugin:vue/vue3-recommended', 'prettier'],
  rules: {
    'vue/no-unused-vars': 'error',
    'no-console': ['error', { allow: ['warn', 'error'] }],
    'vue/multi-word-component-names': 0,
  },
  ignorePatterns: ['node_modules', 'public/js/*'],
};
