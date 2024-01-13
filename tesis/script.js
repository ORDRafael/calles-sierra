// Array de horas disponibles
const horas = [
  "09:00", "10:00", "11:00", "12:00", "13:00", "14:00", "15:00", "16:00", "17:00"
];

// Obtén la referencia al cuerpo de la tabla
const tbody = document.querySelector('.calendario tbody');

// Generar filas para cada hora
horas.forEach(hora => {
  const fila = document.createElement('tr');
  const celdaHora = document.createElement('td');
  celdaHora.textContent = hora;
  fila.appendChild(celdaHora);

  // Generar columnas para cada día
  for (let i = 1; i <= 5; i++) { // 5 días de la semana (lunes a viernes)
    const celda = document.createElement('td');
    celda.dataset.hora = hora;
    celda.dataset.dia = i;
    celda.addEventListener('click', agendarCita);
    fila.appendChild(celda);
  }

  tbody.appendChild(fila);
});

// Función para agendar la cita
function agendarCita(event) {
  const celda = event.target;
  const hora = celda.dataset.hora;
  const dia = celda.dataset.dia;

  // Aquí puedes implementar la lógica para mostrar un formulario de agendamiento
  // y guardar la cita en tu base de datos
  console.log("Cita agendada para el día " + dia + " a las " + hora);
}