let mix = require("laravel-mix");
let path = require("path");

mix.setPublicPath("dist")
    .js("resources/js/field.js", "js")
    .js("resources/js/tinymce.js", "js")
    .vue({ version: 3 })
    .alias({
        "laravel-nova": path.join(
            __dirname,
            "vendor/laravel/nova/resources/js/mixins/packages.js"
        ),
    })
    .webpackConfig({
        externals: {
            vue: "Vue",
        },
        output: {
            uniqueName: "marshmallow/nova-tinymce",
        },
    })
    .sass("resources/sass/field.scss", "css");

mix.copyDirectory("resources/skins", "dist/tinymce/skins");
mix.copyDirectory("node_modules/tinymce/skins", "dist/tinymce/skins");
