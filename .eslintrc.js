module.exports = {
  root: true,
  env: {
    browser: true,
    node: true
  },
  extends: [
    'eslint:recommended',
    'plugin:@typescript-eslint/recommended'
  ],
  rules: {
    indent: ['error', 2],
    quotes: ['error', 'single'],
    semi: ['error', 'never']
  }
}
