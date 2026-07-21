function slideTestimonial(direction) {
    const slider = document.getElementById('testimonialSlider');
    if (!slider) return;
    const card = slider.querySelector('div');
    if (!card) return;
    const cardWidth = card.offsetWidth + 28; // card width + gap
    slider.scrollBy({ left: direction * cardWidth, behavior: 'smooth' });
}

// Touch swipe support
document.addEventListener('DOMContentLoaded', () => {
    const slider = document.getElementById('testimonialSlider');
    if (!slider) return;

    let startX = 0;
    let scrollLeft = 0;
    let isDragging = false;

    slider.addEventListener('touchstart', (e) => {
        isDragging = true;
        startX = e.touches[0].pageX - slider.offsetLeft;
        scrollLeft = slider.scrollLeft;
    }, { passive: true });

    slider.addEventListener('touchmove', (e) => {
        if (!isDragging) return;
        const x = e.touches[0].pageX - slider.offsetLeft;
        const walk = (startX - x) * 1.5;
        slider.scrollLeft = scrollLeft + walk;
    }, { passive: true });

    slider.addEventListener('touchend', () => {
        isDragging = false;
    });
});
