const today = new Date().toISOString().split('T')[0];

// Asignar la fecha actual como valor por defecto a los campos de fecha
document.getElementById("txtFechaEntrega").value = today;

function addRow() {
    const tableBody = document.getElementById('table-body');
    const newRow = `
        <tr>
        <td class="border border-gray-300 px-4 py-2">
        <select name="producto[]" class="w-full rounded border border-gray-300 px-2 py-1">
        <option value="">Selecciona</option>
        ${productos.map(producto => `<option value="${producto.id_producto}">${producto.nombre}</option>`).join('')}
        </select>
        </td>
        <td class="border border-gray-300 px-4 py-2">
        <input type="text" name="descripcion[]" class="w-full rounded border border-gray-300 px-2 py-1" placeholder="Descripción">
        </td>
        <td class="border border-gray-300 px-4 py-2">
        <input type="number" name="cantidad[]" class="w-full rounded border border-gray-300 px-2 py-1" placeholder="Cantidad">
        </td>
        <td class="border border-gray-300 px-4 py-2 text-center">
        <button type="button" class="text-red-500 hover:text-red-700" onclick="removeRow(this)">Eliminar</button>
        </td>
        </tr>
`;
    tableBody.insertAdjacentHTML('beforeend', newRow);
}

function removeRow(button) {
    const row = button.closest('tr');
    row.remove();
}