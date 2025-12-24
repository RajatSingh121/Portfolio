document.addEventListener('DOMContentLoaded', () => {

    // Sticky Header
    const header = document.querySelector('.site-header');
    window.addEventListener('scroll', () => {
        if (window.scrollY > 50) {
            header.classList.add('scrolled');
        } else {
            header.classList.remove('scrolled');
        }
    });

    // Smooth Scrolling for Anchors
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const targetId = this.getAttribute('href');
            if (targetId === '#') return;

            const targetElement = document.querySelector(targetId);
            if (targetElement) {
                targetElement.scrollIntoView({
                    behavior: 'smooth'
                });

                // Close mobile menu if open (simple implementation)
                // mobileMenu.classList.remove('active');
            }
        });
    });

    // Intersection Observer for Animations
    const observerOptions = {
        root: null,
        rootMargin: '0px',
        threshold: 0.1
    };

    const observer = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('visible');
                observer.unobserve(entry.target); // Only animate once
            }
        });
    }, observerOptions);

    const animatedElements = document.querySelectorAll('.fade-in, .fade-in-up');
    animatedElements.forEach(el => observer.observe(el));

    // --- Theme Switcher ---
    const themeToggle = document.getElementById('theme-toggle');
    const htmlEl = document.documentElement;

    if (themeToggle) {
        // Check local storage or preference
        const currentTheme = localStorage.getItem('theme') || 'dark';
        htmlEl.setAttribute('data-theme', currentTheme);

        themeToggle.addEventListener('click', () => {
            const theme = htmlEl.getAttribute('data-theme');
            const newTheme = theme === 'dark' ? 'light' : 'dark';

            htmlEl.setAttribute('data-theme', newTheme);
            localStorage.setItem('theme', newTheme);
        });
    }

    // --- Language Switcher ---
    window.triggerTranslate = function (langCode) {
        // Set the google translate cookie
        const select = document.querySelector('.goog-te-combo');
        if (select) {
            select.value = langCode;
            select.dispatchEvent(new Event('change'));
        } else {
            // Fallback for custom implementation if google bar is hidden
            // Direct cookie manipulation often works best for custom UIs
            document.cookie = "googtrans=/en/" + langCode;
            location.reload();
        }
    }
});
