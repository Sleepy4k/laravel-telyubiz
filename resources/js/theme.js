// Toggle theme function (exposed globally - must be available immediately)
window.toggleTheme = function() {
    const html = document.documentElement;
    const isDark = html.classList.toggle("dark");

    // Save preference to localStorage
    localStorage.setItem("theme", isDark ? "dark" : "light");

    // Dispatch event for other components to listen
    window.dispatchEvent(new CustomEvent("theme-changed", {
        detail: { isDark }
    }));

    console.log('Theme toggled to:', isDark ? 'dark' : 'light');
}

// Initialize theme on page load
document.addEventListener("DOMContentLoaded", function () {
    const savedTheme = localStorage.getItem("theme");
    const prefersDark = window.matchMedia("(prefers-color-scheme: dark)").matches;

    if (savedTheme === "dark" || (!savedTheme && prefersDark)) {
        document.documentElement.classList.add("dark");
    }
});

// Apply theme immediately (before DOMContentLoaded) to prevent flash
(function() {
    const savedTheme = localStorage.getItem("theme");
    const prefersDark = window.matchMedia("(prefers-color-scheme: dark)").matches;

    if (savedTheme === "dark" || (!savedTheme && prefersDark)) {
        document.documentElement.classList.add("dark");
    }
})();

