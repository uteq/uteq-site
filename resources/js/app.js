import './bootstrap';

import AOS from 'aos';
import 'aos/dist/aos.css';

import { gsap } from 'gsap';
import { ScrollTrigger } from 'gsap/ScrollTrigger';

gsap.registerPlugin(ScrollTrigger);

AOS.init({ once: true, duration: 600, easing: 'ease-out' });

import.meta.glob([
    '../images/**',
    '../fonts/**',
]);

// ES modules are deferred — DOM is ready when this runs
initHeroAnimations();
initParallax();
initCijfersCount();
initCardTilt();
initCursorGlow();

/* ── Hero entrance timeline ──────────────────────────────────────── */
function initHeroAnimations() {
    const reveals = document.querySelectorAll('.hero-reveal');
    if (!reveals.length) return;

    const tl = gsap.timeline({ delay: 0.15 });

    // 1. Watermark verschijnt eerst, langzaam
    tl.fromTo('.hero-mark-watermark',
        { opacity: 0, scale: 0.9 },
        { opacity: 0.04, scale: 1, duration: 2.5, ease: 'power1.out' },
        0
    )

    // 2. Eerste regel onthult na korte beat
    .from(reveals[0], {
        yPercent: 100, duration: 0.8, ease: 'power4.out',
    }, 0.35)

    // 3. Tweede regel met bewuste vertraging
    .from(reveals[1], {
        yPercent: 100, duration: 0.8, ease: 'power4.out',
    }, 0.6)

    // 4. Ademruimte, dan subtitle
    .from('.hero-subtitle', {
        opacity: 0, y: 30, duration: 1, ease: 'power3.out',
    }, 1.05)

    // 5. CTA schuift rustig in
    .from('.hero-cta', {
        opacity: 0, y: 25, duration: 1, ease: 'power3.out',
    }, 1.35)

    // 6. Clients als laatste, subtiel
    .from('.hero-clients', {
        opacity: 0, y: 15, duration: 1.2, ease: 'power2.out',
    }, 1.75);

    // Failsafe
    setTimeout(() => {
        if (tl.progress() < 1) tl.progress(1);
    }, 4500);
}

/* ── Parallax on scroll ──────────────────────────────────────────── */
function initParallax() {
    // Watermark parallax (moves slower than content)
    const watermark = document.querySelector('.hero-mark-watermark');
    if (watermark) {
        gsap.to(watermark, {
            yPercent: 20,
            ease: 'none',
            scrollTrigger: {
                trigger: watermark.closest('[class*="bg-secondary"]'),
                start: 'top top',
                end: 'bottom top',
                scrub: true,
            },
        });
    }

    // Project images parallax
    document.querySelectorAll('.project-parallax').forEach(img => {
        gsap.to(img, {
            yPercent: -6,
            ease: 'none',
            scrollTrigger: {
                trigger: img.closest('.project-card'),
                start: 'top bottom',
                end: 'bottom top',
                scrub: true,
            },
        });
    });
}

/* ── Cijfers counting ────────────────────────────────────────────── */
function initCijfersCount() {
    document.querySelectorAll('[data-count-to]').forEach(el => {
        const target = parseInt(el.dataset.countTo);
        const suffix = el.dataset.countSuffix || '';

        el.textContent = '0' + suffix;

        ScrollTrigger.create({
            trigger: el,
            start: 'top 85%',
            once: true,
            onEnter: () => {
                const obj = { val: 0 };
                gsap.to(obj, {
                    val: target,
                    duration: 2.2,
                    ease: 'power2.out',
                    onUpdate: () => {
                        el.textContent = Math.round(obj.val) + suffix;
                    },
                });
            },
        });
    });
}

/* ── How timeline progress ───────────────────────────────────────── */
function initTimelineProgress() {
    const line = document.querySelector('.timeline-progress-line');
    if (!line) return;

    gsap.fromTo(line,
        { scaleY: 0 },
        {
            scaleY: 1,
            ease: 'none',
            scrollTrigger: {
                trigger: line.closest('.timeline-container'),
                start: 'top 60%',
                end: 'bottom 40%',
                scrub: true,
            },
        }
    );
}

/* ── Card 3D tilt (desktop only) ─────────────────────────────────── */
function initCardTilt() {
    if (!window.matchMedia('(pointer: fine)').matches) return;

    document.querySelectorAll('.card-tilt').forEach(card => {
        card.addEventListener('mouseenter', () => {
            card.style.transition = 'box-shadow 0.6s cubic-bezier(0.16, 1, 0.3, 1)';
        });

        card.addEventListener('mousemove', e => {
            const rect = card.getBoundingClientRect();
            const x = (e.clientX - rect.left) / rect.width - 0.5;
            const y = (e.clientY - rect.top) / rect.height - 0.5;
            card.style.transform = `perspective(800px) rotateX(${-y * 5}deg) rotateY(${x * 5}deg) scale3d(1.02, 1.02, 1.02)`;
        });

        card.addEventListener('mouseleave', () => {
            card.style.transition = 'transform 0.6s cubic-bezier(0.16, 1, 0.3, 1), box-shadow 0.6s cubic-bezier(0.16, 1, 0.3, 1)';
            card.style.transform = '';
        });
    });
}

/* ── Cursor glow (desktop only) ──────────────────────────────────── */
function initCursorGlow() {
    if (!window.matchMedia('(pointer: fine)').matches) return;

    const glow = document.createElement('div');
    glow.className = 'cursor-glow';
    document.body.appendChild(glow);

    let x = -500, y = -500;

    document.addEventListener('mousemove', e => {
        x = e.clientX;
        y = e.clientY;
    });

    (function render() {
        glow.style.transform = `translate3d(${x - 250}px, ${y - 250}px, 0)`;
        requestAnimationFrame(render);
    })();
}
