const today = new Date().toISOString().split('T')[0];

// Asignar la fecha actual como valor por defecto a los campos de fecha
document.getElementById("txtBuscarDesde").value = today;
// Asignar la misma fecha por defecto al segundo campo
document.getElementById("txtBuscarHasta").value = today;