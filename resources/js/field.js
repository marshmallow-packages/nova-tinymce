// import IndexNovaTinyMCEField from "./components/IndexField";
// import DetailNovaTinyMCEField from "./components/DetailField";
// import FormNovaTinyMCEField from "./components/FormField";

Nova.booting((Vue, router, store) => {
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

// Nova.booting((Vue, router) => {
//     Vue.component("index-Nova-TinyMCE", IndexNovaTinyMCEField).default;
//     Vue.component("detail-Nova-TinyMCE", DetailNovaTinyMCEField).default;
//     Vue.component("form-Nova-TinyMCE", FormNovaTinyMCEField).default;
// });
