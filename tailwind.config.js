/** @type {import('tailwindcss').Config} */
module.exports = {
	content: [
		"./**/*.php", // Scan all .php files in the current and sub-directories
		// Add paths to any other files where you use classes (e.g., .html, .js)
	],
	darkMode: "class",
	theme: {
		extend: {
			colors: {
				primary: "#13ec5b",
				"background-light": "#f6f8f6",
				"background-dark": "#102216",
				"surface-dark": "#193322",
				"border-dark": "#326744",
				"text-main-dark": "#ffffff",
				"text-secondary-dark": "#92c9a4",
				"text-main-light": "#102216",
				"text-secondary-light": "#5a7864",
				"surface-light": "#e8ede9",
				"border-light": "#d1d9d3",
			},
			fontFamily: {
				display: ["Manrope", "sans-serif"],
			},
			borderRadius: {
				DEFAULT: "0.5rem",
				lg: "1rem",
				xl: "1.5rem",
				full: "9999px",
			},
		},
	},
};
