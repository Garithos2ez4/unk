.slider-container {
    width: 100%;
    overflow: hidden;
    position: relative;
    white-space: nowrap; /* Ensure text stays in one line */
}
.slider-content {
    display: inline-block;
    white-space: nowrap;
    animation: slide linear infinite;
}
.slider-item {
    display: inline-block;
    padding: 0 20px;
    font-size: 1.5rem;
    line-height: 2rem;
}
@keyframes slide {
    0% { transform: translateX(0); }
    100% { transform: translateX(-550%); }
}