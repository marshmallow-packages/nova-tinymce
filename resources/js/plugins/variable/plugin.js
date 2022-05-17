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

tinymce.PluginManager.add("my_variables", function (editor) {
    /**
     * Object that is used to replace the variable string to be used
     * in the HTML view
     * @type {object}
     */
    var mapper = editor.getParam("variable_mapper", {});

    /**
     * define a list of variables that are allowed
     * if the variable is not in the list it will not be automatically converterd
     * by default no validation is done
     * @todo  make it possible to pass in a function to be used a callback for validation
     * @type {array}
     */
    var valid = editor.getParam("variable_valid", null);

    /**
     * Get custom variable class name
     * @type {string}
     */
    var className = editor.getParam("variable_class", "variable");

    /**
     * Prefix and suffix to use to mark a variable
     * @type {string}
     */
    var prefix = editor.getParam("variable_prefix", "{{ ");
    var suffix = editor.getParam("variable_suffix", " }}");

    /**
     * Allow invalid variables and use classname-bad
     * @type {boolean}
     */
    var allowInvalid = editor.getParam("variable_allow_invalid", false);

    /**
     * Get custom bad variable name
     */
    var replacebadVar = editor.getParam("replace_bad_variable", null);

    /**
     * RegExp is not stateless with '\g' so we return a new variable each call
     * @return {RegExp}
     */
    function getStringVariableRegex() {
        RegExp.escape = function (s) {
            return s.replace(/[-\/\\^$*+?.()|[\]{}]/g, "\\$&");
        };
        return new RegExp(
            RegExp.escape(prefix) +
                "([a-zA-Z0-9._ \\u00C0-\\u017F]*)?" +
                RegExp.escape(suffix),
            "g"
        );
    }

    /**
     * check if a certain variable is valid
     * @param {string} name
     * @return {bool}
     */
    function isValid(name) {
        if (!valid || valid.length === 0) return true;

        var validString = "|" + valid.join("|") + "|";

        return validString.indexOf("|" + name + "|") > -1 ? true : false;
    }

    function getMappedValue(cleanValue) {
        if (typeof mapper === "function") return mapper(cleanValue);

        return mapper.hasOwnProperty(cleanValue)
            ? mapper[cleanValue]
            : cleanValue;
    }

    /**
     * Strip variable to keep the plain variable string
     * @example "{test}" => "test"
     * @param {string} value
     * @return {string}
     */
    function cleanVariable(value) {
        return value.replace(/[^a-zA-Z0-9._\s\u00C0-\u017F]/g, "");
    }

    /**
     * convert a text variable "x" to a span with the needed
     * attributes to style it with CSS
     * @param  {string} value
     * @return {string}
     */
    function createHTMLVariable(value) {
        var cleanValue = cleanVariable(value);
        var invalid = false;

        // check if variable is valid
        if (!isValid(cleanValue)) {
            if (allowInvalid) {
                invalid = true;
            } else {
                return value;
            }
        }

        var cleanMappedValue = getMappedValue(cleanValue);

        editor.fire("variableToHTML", {
            value: value,
            cleanValue: cleanValue,
        });

        var variable = prefix + cleanValue + suffix;

        if (replacebadVar && invalid) {
            cleanMappedValue = replacebadVar;
        }

        return (
            '<span class="' +
            className +
            (invalid ? "-bad" : "") +
            '" data-original-variable="' +
            variable +
            '" contenteditable="false">' +
            cleanMappedValue +
            "</span>"
        );
    }

    /**
     * convert variable strings into html elements
     * @return {void}
     */
    function stringToHTML() {
        var nodeList = [],
            nodeValue,
            node,
            div;

        // find nodes that contain a string variable
        tinymce.walk(
            editor.getBody(),
            function (n) {
                if (
                    n.nodeType == 3 &&
                    n.nodeValue &&
                    getStringVariableRegex().test(n.nodeValue)
                ) {
                    nodeList.push(n);
                }
            },
            "childNodes"
        );

        // loop over all nodes that contain a string variable
        for (var i = 0; i < nodeList.length; i++) {
            nodeValue = nodeList[i].nodeValue.replace(
                getStringVariableRegex(),
                createHTMLVariable
            );
            div = editor.dom.create("div", null, nodeValue);
            while ((node = div.lastChild)) {
                editor.dom.insertAfter(node, nodeList[i]);
            }

            editor.dom.remove(nodeList[i]);
        }
    }

    /**
     * convert HTML variables back into their original string format
     * for example when a user opens source view
     * @return {void}
     */
    function htmlToString() {
        var nodeList = [],
            nodeValue,
            node,
            div;

        // find nodes that contain a HTML variable
        tinymce.walk(
            editor.getBody(),
            function (n) {
                if (n.nodeType == 1) {
                    var original = n.getAttribute("data-original-variable");
                    if (original !== null) {
                        nodeList.push(n);
                    }
                }
            },
            "childNodes"
        );

        // loop over all nodes that contain a HTML variable
        for (var i = 0; i < nodeList.length; i++) {
            nodeValue = nodeList[i].getAttribute("data-original-variable");
            div = editor.dom.create("div", null, nodeValue);
            while ((node = div.lastChild)) {
                editor.dom.insertAfter(node, nodeList[i]);
            }

            // remove HTML variable node
            // because we now have an text representation of the variable
            editor.dom.remove(nodeList[i]);
        }
    }

    /**
     * handle formatting the content of the editor based on
     * the current format. For example if a user switches to source view and back
     * @param  {object} e
     * @return {void}
     */
    function handleContentRerender(e) {
        return e.format === "raw" ? stringToHTML() : htmlToString();
    }

    /**
     * insert a variable into the editor at the current cursor location
     * @param {string} value
     * @return {void}
     */
    function addVariable(value) {
        var htmlVariable = createHTMLVariable(value);
        editor.selection.setContent(htmlVariable);
        editor.selection.collapse();
        editor.focus();
    }

    function isVariable(element) {
        if (
            typeof element.getAttribute === "function" &&
            element.hasAttribute("data-original-variable")
        )
            return true;

        return false;
    }

    /**
     * Trigger special event when user clicks on a variable
     * @return {void}
     */
    function handleClick(e) {
        var target = e.target;

        if (!isVariable(target)) return null;

        // put the cursor right after the variable
        if (e.target.nextSibling) {
            editor.selection.setCursorLocation(e.target.nextSibling);
        } else {
            editor.selection.select(e.target);
            editor.selection.collapse();
        }

        // and trigger event if we want to do something special
        var value = target.getAttribute("data-original-variable");
        editor.fire("variableClick", {
            value: cleanVariable(value),
            target: target,
        });
    }

    function preventDrag(e) {
        var target = e.target;

        if (!isVariable(target)) return null;

        e.preventDefault();
        e.stopImmediatePropagation();
    }

    var currentDirection;

    function keyDown(e) {
        if (e.keyCode == 37) {
            currentDirection = "left";
        } else if (e.keyCode == 39) {
            currentDirection = "right";
        } else if (e.keyCode == 38) {
            currentDirection = "up";
        } else if (e.keyCode == 40) {
            currentDirection = "down";
        } else if (e.keyCode == 8) {
            var r = editor.selection.getRng();
            if (
                r.collapsed &&
                r.startOffset >= 1 &&
                r.startContainer.textContent.charCodeAt(r.startOffset) == 65279
            ) {
                // work around TinyMCE failing to delete a character when it's got some zero-width non-blocking char
                r.startContainer.textContent =
                    r.startContainer.textContent.slice(0, r.startOffset - 1) +
                    r.startContainer.textContent.slice(r.startOffset + 1);

                e.preventDefault();
                e.stopImmediatePropagation();
            }
        }
    }

    function nodeChange(e) {
        var target = e.element;

        if (!isVariable(target)) return null;

        e.preventDefault();
        e.stopImmediatePropagation();

        switch (currentDirection) {
            case "left":
            case "up":
                editor.selection.select(target);
                editor.selection.collapse(true);
                break;

            case "down":
            case "right":
                editor.selection.select(target);
                editor.selection.collapse();
                break;
        }
    }

    editor.on("beforegetcontent", handleContentRerender);
    editor.on("init", stringToHTML);
    editor.on("getcontent", stringToHTML);
    editor.on("click", handleClick);
    editor.on("mousedown", preventDrag);
    editor.on("keydown", keyDown);
    editor.on("NodeChange", nodeChange);

    this.addVariable = addVariable;

    function mapVars(title, value) {
        return {
            type: "menuitem",
            text: title,
            onAction: function () {
                addVariable(value);
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
            itemObject = mapVars(title, value);

            itemObjects.push(itemObject);
        });

        editor.ui.registry.addMenuButton(menuTitle, {
            tooltip: menuText,
            icon: "code-sample",
            fetch: function (callback) {
                callback(itemObjects);
            },
        });
    }

    let vars = editor.getParam("my_variables", {});
    if (Object.keys(vars).length !== 0) {
        createMenuItem(vars, "my_variables", "Add variable");
    }
});
