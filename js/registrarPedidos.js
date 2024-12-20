const today = new Date().toISOString().split('T')[0];

// Asignar la fecha actual como valor por defecto a los campos de fecha
document.getElementById("txtFechaEntrega").value = today;