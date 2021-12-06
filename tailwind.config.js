const defaultTheme = require("tailwindcss/defaultTheme");

module.exports = {
    mode: "jit",
    purge: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
    ],

    theme: {
        screen: {
            sm: "640px",
            md: "768px",
            lg: "1024px",
            xl: "1280px",
            "2xl": "1536px",
        },
        extend: {
            fontFamily: {
                sans: ["Nunito", ...defaultTheme.fontFamily.sans],
            },
            transitionProperty: { height: "height" },
        },
    },

    variants: {
        display: ["hover", "focus", "group-hover"],
        extend: {
            scale: ["active", "group-hover"],
            rotate: ["group-hover"],
            visibility: ["group-hover"],
            height: ["group-hover"],
            blur: ["hover", "group-hover", "focus"],
            filter: ["hover", "group-hover", "focus"],
            // opacity: ["disabled"],
        },
    },

    plugins: [require("@tailwindcss/forms")],
};
