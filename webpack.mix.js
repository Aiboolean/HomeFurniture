const mix = require("laravel-mix");

mix.sass("resources/scss/style.scss", "public/css").setPublicPath("public");
