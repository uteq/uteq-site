import './bootstrap';

import AOS from 'aos';
import 'aos/dist/aos.css';

AOS.init();

import.meta.glob([
    '../images/**',
    '../fonts/**',
]);

/* =================================
   COUNT-UP ANIMATION FOR STATISTICS
   ================================= */
function animateCountUp(element) {
    const target = element.dataset.count;
    const prefix = element.dataset.prefix || '';
    const suffix = element.dataset.suffix || '';
    const duration = 2000;
    const startTime = performance.now();

    // Parse target value (handle numbers with decimals)
    const targetNumber = parseFloat(target.replace(/[^0-9.]/g, ''));
    const hasDecimal = target.includes('.') || target.includes(',');

    function updateCount(currentTime) {
        const elapsed = currentTime - startTime;
        const progress = Math.min(elapsed / duration, 1);

        // Easing function for smooth animation
        const easeOutQuart = 1 - Math.pow(1 - progress, 4);
        const currentValue = targetNumber * easeOutQuart;

        // Format the number
        let displayValue;
        if (hasDecimal) {
            displayValue = currentValue.toFixed(1);
        } else {
            displayValue = Math.floor(currentValue).toLocaleString('nl-NL');
        }

        element.textContent = prefix + displayValue + suffix;

        if (progress < 1) {
            requestAnimationFrame(updateCount);
        } else {
            // Ensure final value is exact
            element.textContent = prefix + target + suffix;
        }
    }

    requestAnimationFrame(updateCount);
}

// Intersection Observer for count-up elements
const countObserver = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting && !entry.target.dataset.counted) {
            entry.target.dataset.counted = 'true';
            animateCountUp(entry.target);
        }
    });
}, {
    threshold: 0.5,
    rootMargin: '0px 0px -50px 0px'
});

// Initialize count-up observers when DOM is ready
document.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('[data-count]').forEach(el => {
        countObserver.observe(el);
    });
});

/* =================================
   PARALLAX HERO EFFECT
   ================================= */
function initParallax() {
    const heroContent = document.querySelector('.hero-content');
    if (!heroContent) return;

    let ticking = false;

    function updateParallax() {
        const scrollY = window.scrollY;
        const heroHeight = heroContent.closest('.hero-gradient')?.offsetHeight || 600;

        // Only apply parallax when hero is visible
        if (scrollY < heroHeight) {
            const offset = scrollY * 0.3;
            heroContent.style.transform = `translateY(${offset}px)`;
            heroContent.style.opacity = 1 - (scrollY / heroHeight) * 0.5;
        }
        ticking = false;
    }

    window.addEventListener('scroll', () => {
        if (!ticking) {
            requestAnimationFrame(updateParallax);
            ticking = true;
        }
    }, { passive: true });
}

document.addEventListener('DOMContentLoaded', initParallax);
