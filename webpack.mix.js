let mix = require("laravel-mix");

mix.setPublicPath("dist")
    .vue()
    .js("resources/js/field.js", "js");

mix.sass("resources/sass/field.scss", "css");

mix.copyDirectory("resources/skins", "dist/tinymce/skins");
mix.copyDirectory("node_modules/tinymce/skins", "dist/tinymce/skins");
