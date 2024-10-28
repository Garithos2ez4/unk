// Optional: Adjust animation duration based on content width
document.addEventListener('DOMContentLoaded', () => {
    const container = document.querySelector('.slider-container');
    const content = document.querySelector('.slider-content');
    const contentWidth = content.scrollWidth;
    const containerWidth = container.clientWidth;
    const duration = (contentWidth / containerWidth) * 15; // Adjust time as needed
    
    content.style.animationDuration = `${duration}s`;
});