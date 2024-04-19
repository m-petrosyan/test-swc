module.exports = {
    content: [
        "./index.html",
        "./src/**/*.{vue,js,ts,jsx,tsx}",
        "./node_modules/flowbite/**/*.js",
        './resources/js/**/*.vue',
    ],
    theme: {},
    plugins: [
        require('flowbite/plugin')
    ],
}
