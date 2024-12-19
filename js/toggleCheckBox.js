document.addEventListener("DOMContentLoaded", () => {
    // Seleccionamos todos los checkboxes
    const checkboxes = document.querySelectorAll('input[type="checkbox"]');

    checkboxes.forEach(checkbox => {
        checkbox.addEventListener("change", () => {
            // Seleccionamos el contenedor del checkbox (su div padre inmediato)
            const parentDiv = checkbox.nextElementSibling;

            // Alternamos la clase que cambia el estilo (pintado)
            if (checkbox.checked) {
                parentDiv.classList.add("!border-4", "border-primary");
            } else {
                parentDiv.classList.remove("!border-4", "border-primary");
            }
        });
    });
});