function grafikIkan() {
  const ctx = document.getElementById("myChart").getContext("2d");
  new Chart(ctx, {
    type: "line",
    data: {
      datasets: [
        {
          type: "line",
          label: "Intensitas Cahaya",
          data: [2035.3, 2093.1, 2003.3],
          backgroundColor: "rgb(246, 250, 41)",
          borderColor: "rgb(225, 228, 63)",
        },
      ],
      labels: [
        1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20,
        21, 22, 23, 24,
      ],
    },
    options: {
      scales: {
        y: {
          beginAtZero: true,
        },
      },
    },
  });
}
