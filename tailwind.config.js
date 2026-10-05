/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./app/Livewire/**/*.php",
    ],
    theme: {
        extend: {
            colors: {
                'primary': '#F6B90E',
                'secondary': '#232323',
                'tertiary': '#FBF1CF',
                'neutral-custom': '#FBFAF7'
            },
            fontFamily: {
                'headline': ['Poppins', 'sans-serif'],
                'body': ['"Nunito Sans"', 'sans-serif'],
                'label': ['Poppins', 'sans-serif'],
            }
        },
    },
    plugins: [],
}
