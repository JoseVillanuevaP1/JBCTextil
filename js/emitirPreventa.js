const btnsModalRecursos = document.querySelectorAll('.btnModalRecursos');
const modalRecursos = document.querySelector('.modalRecursos');
const btnCloseModal = document.querySelector('.btnCloseModal');
const addRowBtn = document.getElementById('addRow');
const recursosTable = document.getElementById('recursosTable').querySelector('tbody');
const totalPriceElement = document.getElementById('totalPrice');

let total = 0.00;

// Mostrar el modal
btnsModalRecursos.forEach(btn => {
    btn.addEventListener('click', (e) => {
        e.preventDefault()
        modalRecursos.classList.remove('hidden');
    });
});

// Ocultar el modal
btnCloseModal.addEventListener('click', (e) => {
    e.preventDefault()
    modalRecursos.classList.add('hidden');
});

// Agregar nueva fila
addRowBtn.addEventListener('click', (e) => {
    e.preventDefault()
    const newRow = document.createElement('tr');
    const rowCount = recursosTable.rows.length + 1;

    newRow.innerHTML = `
    <td class="border border-gray-300 px-4 py-2 text-center">${rowCount}</td>
    <td class="border border-gray-300 px-4 py-2 text-center">
      <select class="border rounded w-full">
        <option></option>
        <option>Servicio</option>
        <option>Material</option>
      </select>
    </td>
    <td class="border border-gray-300 px-4 py-2 text-center">
      <select class="border rounded w-full">
        <option></option>
        <option>Planchado</option>
        <option>Tela Pique</option>
        <option>Tela Sintética</option>
      </select>
    </td>
    <td class="border border-gray-300 px-4 py-2 text-center">
      <select class="border rounded w-full">
        <option></option>
        <option>TexPeru S.A.C</option>
        <option>Nazca S.A.C</option>
        <option>TejeExpress</option>
        <option>Bravo's S.A.C</option>
      </select>
    </td>
    <td class="border border-gray-300 px-4 py-2 text-center">
      <input type="number" class="border rounded w-full text-center" value="0.00">
    </td>
    <td class="border border-gray-300 px-4 py-2 text-center">
      <button class="text-red-500 deleteRow">🗑️</button>
    </td>
  `;

    recursosTable.appendChild(newRow);
    updateDeleteRowListeners();
});

// Eliminar fila
function updateDeleteRowListeners() {
    const deleteButtons = document.querySelectorAll('.deleteRow');
    deleteButtons.forEach(button => {
        button.addEventListener('click', (e) => {
            const row = e.target.closest('tr');
            const priceInput = row.querySelector('input[type="number"]');
            total -= parseFloat(priceInput.value) || 0;
            row.remove();
            updateTotalPrice();
        });
    });
}

// Actualizar el precio total
function updateTotalPrice() {
    totalPriceElement.textContent = `S/ ${total.toFixed(2)}`;
}

// Inicializar listeners
updateDeleteRowListeners();