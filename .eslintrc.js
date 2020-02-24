module.exports = {
    "extends": [
        // add more generic rulesets here, such as:
        // 'eslint:recommended',
        "plugin:vue/recommended"
    ],
    "rules": {
        // override/add rules settings here, such as:
        // 'vue/no-unused-vars': 'error'
        "vue/max-attributes-per-line": ["error", {
            "singleline": 3,
            "multiline": {
              "max": 1,
              "allowFirstLine": false
            }
        }],
        "vue/html-indent": ["error", "tab", {
            "attribute": 1,
            "baseIndent": 1,
            "closeBracket": 0,
            "alignAttributesVertically": true,
            "ignores": []
        }],
        "vue/no-v-html": "off"
    }
}
