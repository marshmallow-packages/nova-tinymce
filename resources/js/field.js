Nova.booting((Vue, router) => {
    Vue.component(
        "index-Nova-TinyMCE",
        require("./components/IndexField.vue").default
    );
    Vue.component(
        "detail-Nova-TinyMCE",
        require("./components/DetailField.vue").default
    );
    Vue.component(
        "form-Nova-TinyMCE",
        require("./components/FormField.vue").default
    );
});
