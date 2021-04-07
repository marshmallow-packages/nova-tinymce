let mix = require("laravel-mix");

mix.setPublicPath("dist").js("resources/js/field.js", "js").vue();
mix.js("resources/js/tinymce.js", "js").sass(
    "resources/sass/field.scss",
    "css"
);

mix.copyDirectory("resources/skins", "dist/tinymce/skins");
mix.copyDirectory("node_modules/tinymce/skins", "dist/tinymce/skins");