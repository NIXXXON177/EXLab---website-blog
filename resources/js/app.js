import "./bootstrap.js";
import "./script.js";
import "../../../../../Downloads/Telegram Desktop/Сайт Блог/blog/resources/css/app.css";

// Добавляем Font Awesome
import "@fortawesome/fontawesome-free/css/all.css";

// Инициализация анимаций
document.addEventListener('DOMContentLoaded', () => {
    // Анимации
    const animateElements = document.querySelectorAll('.animate-fade-in');
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('animate__animated', 'animate__fadeInUp');
            }
        });
    });
    animateElements.forEach(element => observer.observe(element));

    // Другие обработчики из script.js
});
