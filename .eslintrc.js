module.exports = {
    env: {
        node: true,
    },
    parser: 'vue-eslint-parser',
    parserOptions: {
        parser: '@typescript-eslint/parser',
    },
    plugins: ['@typescript-eslint'],
    extends: [
        'eslint:recommended',
        'plugin:vue/vue3-recommended',
        'plugin:@typescript-eslint/recommended',
        'prettier',
    ],
    rules: {
        'vue/no-unused-vars': 'error',
        'no-console': 'error',
        '@typescript-eslint/no-explicit-any': 0,
    },
    ignorePatterns: ['node_modules', 'public/js/*'],
};
