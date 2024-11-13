// Smooth scrolling for navigation links
document.querySelectorAll('.nav-links a').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();
        const targetId = this.getAttribute('href').substring(1);
        const targetSection = document.getElementById(targetId);

        if (targetSection) {
            targetSection.scrollIntoView({
                behavior: 'smooth'
            });
        }
    });
});

let slideIndex = 0;
function showSlides() {
    let slides = document.querySelectorAll(".banner-slider .slide");
    slides.forEach((slide, index) => {
        slide.style.display = (index === slideIndex) ? "block" : "none";
    });
    slideIndex = (slideIndex + 1) % slides.length;
}

setInterval(showSlides, 3000);  // 3초마다 슬라이드 전환
showSlides();

// 페이징 기능 (예: THE LATEST UPDATE)
document.querySelectorAll('.pagination').forEach(pagination => {
    pagination.addEventListener('click', (e) => {
        if (e.target.tagName === 'SPAN') {
            let pageIndex = e.target.innerText;
            // 페이지 로직 추가 가능
        }
    });
});