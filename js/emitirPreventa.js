const btnsModalRecursos = document.querySelectorAll('.btnModalRecursos');
const modalRecursos = document.querySelector('.modalRecursos');
const btnCloseModal = document.querySelector('.btnCloseModal');
const addRowBtn = document.getElementById('addRow');
const recursosTable = document.getElementById('recursosTable').querySelector('tbody');
const totalPriceElement = document.getElementById('totalPrice');
const btnConfirmar = document.querySelector('.bg-green-500');
// Asegúrate de que recursos esté definido fuera del evento
let recursos = {}; // Usamos un objeto para almacenar los recursos por ID

// Evento cuando se da click en el botón "Confirmar"
btnConfirmar.addEventListener('click', (e) => {
  e.preventDefault();

  const rows = recursosTable.querySelectorAll('tr');
  rows.forEach(row => {
    const cells = row.querySelectorAll('td');

    // Obtener el id_detalle_pedido (guardado en el primer input oculto de cada fila)
    const idDetallePedido = cells[0].querySelector('input').value;

    // Obtener el tipo de recurso (valor del primer select)
    const tipoRecurso = cells[2].querySelector('select').value;

    // Obtener el recurso (valor del segundo select)
    const recurso = cells[3].querySelector('select').value;

    // Obtener el distribuidor (valor del tercer select)
    const distribuidor = cells[4].querySelector('select').value;

    // Obtener el precio (valor del input)
    const precioCosto = parseFloat(cells[5].querySelector('input').value) || 0;

    // Crear el objeto recursoData
    const recursoData = {
      id_detalle_pedido: idDetallePedido,
      id_recurso: tipoRecurso,
      id_distribuidor: distribuidor,
      precio_costo: precioCosto
    };

    // Verificar si ya existe el idDetallePedido en recursos
    if (recursos[idDetallePedido]) {
      // Buscar el índice del recurso dentro del array de ese idDetallePedido
      const index = recursos[idDetallePedido].findIndex(item => item.id_recurso === tipoRecurso);

      if (index !== -1) {
        // Si lo encuentra, actualiza el recurso
        recursos[idDetallePedido][index] = recursoData;
      } else {
        // Si no lo encuentra, lo agrega (esto podría suceder si hay varios recursos por id_detalle_pedido)
        recursos[idDetallePedido].push(recursoData);
      }
    } else {
      // Si el id_detalle_pedido no existe, inicializamos el array y agregamos el recurso
      recursos[idDetallePedido] = [recursoData];
    }
  });

  const recursosJSON = JSON.stringify(recursos);

  // Asignar el JSON al campo oculto del formulario
  document.getElementById('recursosData').value = recursosJSON;
  // Mostrar el arreglo de recursos en la consola
  console.log(recursos);
  total = 0.00;
  updateTotalPrice();
});

// Mostrar el modal
btnsModalRecursos.forEach(btn => {
  btn.addEventListener('click', (e) => {
    // Recuperar el dato del botón (por ejemplo, de un atributo 'data-id')
    id = btn.dataset.id;

    // Verificar si el id existe en el objeto recursos
    if (recursos[id]) {
      // Si existe, obtener los datos correspondientes
      const recursosArray = recursos[id];

      // Vaciar la tabla antes de agregar las nuevas filas
      recursosTable.innerHTML = '';

      // Recorrer los recursosArray y agregar cada recurso a la tabla
      recursosArray.forEach((recursoData, index) => {
        const newRow = document.createElement('tr');

        newRow.innerHTML = `
          <td class="border border-gray-300 px-4 py-2 text-center">${index + 1}</td>
          <td class="border border-gray-300 px-4 py-2 text-center">
            <select class="border rounded w-full" value="${recursoData.id_recurso}">
              <option>Servicio</option>
              <option>Material</option>
            </select>
          </td>
          <td class="border border-gray-300 px-4 py-2 text-center">
            <select class="border rounded w-full" value="${recursoData.id_distribuidor}">
              <option>TexPeru S.A.C</option>
              <option>Nazca S.A.C</option>
              <option>TejeExpress</option>
              <option>Bravo's S.A.C</option>
            </select>
          </td>
          <td class="border border-gray-300 px-4 py-2 text-center">
            <input type="number" class="border rounded w-full text-center" value="${recursoData.precio_costo}">
          </td>
          <td class="border border-gray-300 px-4 py-2 text-center">
            <button class="text-red-500 deleteRow">🗑️</button>
          </td>
        `;

        // Agregar la nueva fila a la tabla
        recursosTable.appendChild(newRow);
      });

      // Mostrar el modal
      modalRecursos.classList.remove('hidden');
    } else {
      // Limpiar la tabla si no hay recursos para el id
      recursosTable.innerHTML = '';
      // Mostrar el modal
      modalRecursos.classList.remove('hidden');
    }

    e.preventDefault();
  });
});
let total = 0.00;

let id = 0;
// Mostrar el modal
btnsModalRecursos.forEach(btn => {
  btn.addEventListener('click', (e) => {
    // Recuperar el dato del botón (por ejemplo, de un atributo 'data-id')
    id = btn.dataset.id;
    console.log(recursos)
    // Verificar si el id existe en el objeto recursos
    if (recursos[id]) {
      // Si existe, obtener los datos correspondientes
      const recursosArray = recursos[id];

      // Vaciar la tabla antes de agregar las nuevas filas
      recursosTable.innerHTML = '';

      // Recorrer los recursosArray y agregar cada recurso a la tabla
      recursosArray.forEach((recursoData, index) => {
        const newRow = document.createElement('tr');

        newRow.innerHTML = `
          <td class="border border-gray-300 px-4 py-2 text-center">
            <input type="number" class="border rounded w-full text-center" value="${recursoData.id_detalle_pedido}" readonly>
          </td>
          <td class="border border-gray-300 px-4 py-2 text-center">${index + 1}</td>
          <td class="border border-gray-300 px-4 py-2 text-center">
            <select class="border rounded w-full" value="${recursoData.id_recurso}">
              <option>Servicio</option>
              <option>Material</option>
            </select>
          </td>
          <td class="border border-gray-300 px-4 py-2 text-center">
            <select class="border rounded w-full" value="${recursoData.id_distribuidor}">
              <option>TexPeru S.A.C</option>
              <option>Nazca S.A.C</option>
              <option>TejeExpress</option>
              <option>Bravo's S.A.C</option>
            </select>
          </td>
          <td class="border border-gray-300 px-4 py-2 text-center">
            <input type="number" class="border rounded w-full text-center" value="${recursoData.precio_costo}">
          </td>
          <td class="border border-gray-300 px-4 py-2 text-center">
            <button class="text-red-500 deleteRow">🗑️</button>
          </td>
        `;

        // Agregar la nueva fila a la tabla
        recursosTable.appendChild(newRow);
      });

      // Mostrar el modal
      modalRecursos.classList.remove('hidden');
    } else {
      // Limpiar la tabla si no hay recursos para el id
      recursosTable.innerHTML = '';
      // Mostrar el modal
      modalRecursos.classList.remove('hidden');
    }

    e.preventDefault();
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
    <td class="border border-gray-300 px-4 py-2 text-center hidden">
      <input type="number" class="border rounded w-full text-center" value="${id}">
    </td>
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