// Объявляем переменные и функции в начале файла
let observer;
let animateElements;

document.addEventListener("DOMContentLoaded", function () {
    // Инициализация элементов анимации
    animateElements = document.querySelectorAll(".animate-on-scroll");

    // Создание observer только один раз
    observer = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
            if (entry.isIntersecting) {
                entry.target.classList.add(
                    "animate__animated",
                    "animate__fadeInUp"
                );
            }
        });
    });

    // Проверка наличия элементов перед наблюдением
    if (animateElements.length > 0) {
        animateElements.forEach((element) => {
            observer.observe(element);
        });
    }

    // Инициализация плавной прокрутки
    document.querySelectorAll('a[href^="#"]').forEach((anchor) => {
        anchor.addEventListener("click", function (e) {
            e.preventDefault();
            const href = this.getAttribute("href");

            // Проверяем, что href существует и не является пустым
            if (href && href !== "#") {
                const target = document.querySelector(href);
                if (target) {
                    target.scrollIntoView({
                        behavior: "smooth",
                    });
                }
            }
        });
    });

    // Инициализация анимации кнопок
    const buttons = document.querySelectorAll("button");
    buttons.forEach((button) => {
        button.addEventListener("mouseover", function () {
            this.classList.add("animate__animated", "animate__pulse");
        });

        button.addEventListener("animationend", function () {
            this.classList.remove("animate__animated", "animate__pulse");
        });
    });

    // Инициализация выпадающего меню
    const dropdownButtons = document.querySelectorAll(".dropdown button");
    dropdownButtons.forEach((button) => {
        button.addEventListener("click", function () {
            const menu = this.nextElementSibling;
            if (menu) {
                menu.classList.toggle("hidden");
            }
        });
    });
});
