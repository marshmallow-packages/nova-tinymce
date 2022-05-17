/**
 * plugin.js
 *
 * Copyright, BuboBox
 * Released under MIT License.
 *
 * License: https://www.bubobox.com
 * Contributing: https://www.bubobox.com/contributing
 */

/*global tinymce:true */

tinymce.PluginManager.add("my_buttons", function (editor) {
    function mapButton(title, value) {
        return {
            type: "menuitem",
            text: title,
            onAction: function () {
                editor.insertContent(value);
            },
            fetch: function (callback) {
                callback(items);
            },
        };
    }

    function createMenuItem(items, menuTitle, menuText, type) {
        let itemObjects = [];

        Object.entries(items).forEach(([key, item]) => {
            let title = item.title;
            let value = item.value;
            let itemObject = {};
            itemObject = mapButton(title, value);
            itemObjects.push(itemObject);
        });

        editor.ui.registry.addMenuButton(menuTitle, {
            text: menuText,
            fetch: function (callback) {
                callback(itemObjects);
            },
        });
    }

    let buttons = editor.getParam("my_buttons", {});
    if (Object.keys(buttons).length !== 0) {
        createMenuItem(buttons, "my_buttons", "Add buttons");
    }
});
