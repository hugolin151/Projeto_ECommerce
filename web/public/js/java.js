
// Abre dropdowns principais
document.querySelectorAll(".menu-item").forEach(menu => {

    const btn = menu.querySelector(".menu-btn");
    const box = menu.querySelector(".dropdown");

    btn.addEventListener("click", () => {

        // Fecha outros menus
        document.querySelectorAll(".dropdown").forEach(d => {
            if (d !== box) d.style.display = "none";
        });

        // Abre/fecha o atual
        box.style.display = (box.style.display === "flex") ? "none" : "flex";
    });
});

// Submenu de processadores
const toggle = document.querySelector(".item-toggle");
const submenu = document.querySelector(".sub-menu");
const seta = document.querySelector(".seta");

toggle.addEventListener("click", () => {
    const aberto = submenu.style.display === "flex";

    submenu.style.display = aberto ? "none" : "flex";
    seta.classList.toggle("girar", !aberto);
});

// Fecha menus ao clicar fora
document.addEventListener("click", (e) => {
    if (!e.target.closest(".menu-item")) {
        document.querySelectorAll(".dropdown").forEach(d => d.style.display = "none");
        submenu.style.display = "none";
        seta.classList.remove("girar");
    }
});

