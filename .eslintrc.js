/* eslint-disable */
module.exports = {
  'root': true,
  'extends': [
    'airbnb',
    'plugin:sonarjs/recommended',
    'plugin:unicorn/recommended',
  ],
  'globals': {
    'wp': true,
    'acf': true,
    'fuerzastudio': true,
  },
  'env': {
    'node': true,
    'es6': true,
    'amd': true,
    'browser': true,
    'jquery': true,
  },
  'parserOptions': {
    'ecmaFeatures': {
      'globalReturn': true,
      'generators': true,
    },
    'ecmaVersion': 2018,
    'sourceType': 'module',
  },
  'plugins': [
    'import',
    'sonarjs',
    'unicorn',
  ],
  'settings': {
    'import/core-modules': [],
    'import/ignore': [
      'node_modules',
      '\\.(coffee|scss|css|less|hbs|svg|json)$',
    ],
  },
  'rules':{
    'quotes': ['error', 'single'],
    'comma-dangle': [
      'error',
      {
        'arrays': 'always-multiline',
        'objects': 'always-multiline',
        'imports': 'always-multiline',
        'exports': 'always-multiline',
        'functions': 'ignore',
      },
    ],
    'unicorn/filename-case': [
      'error',
      {
        'case': 'camelCase',
      },
    ],
    'unicorn/prevent-abbreviations': 'off',
    'unicorn/no-abusive-eslint-disable': 'off',
    'linebreak-style': 0,
    'id-length': [ 2, {
      min: 2,
      max: Number.infinity,
      properties: 'always',
      exceptions: [ '_', 'i', 'j', 'x', 'y', 'z', '$' ]
    }],
    'sort-imports': [ 2, {
      ignoreCase: true,
      ignoreMemberSort: false,
      memberSyntaxSortOrder: [ 'none', 'single', 'multiple', 'all' ]
    }],
    'space-before-function-paren': ['error', {
      'anonymous': 'always',
      'named': 'never',
      'asyncArrow': 'always',
    }],
    'dot-location': ['error', 'property'],
    // Prevent warnings for webpack resolve aliases.
    'import/no-unresolved': 'off',
    // Prevent warnings for webpack extension resolution.
    'import/extensions': 'off',
    // Prevent warnings for import statements with aliases.
    'import/first': 'off',
  }
};
