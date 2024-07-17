document.addEventListener("DOMContentLoaded", function () {
  const startDateInput = document.getElementById("formation_date_start");
  const endDateInput = document.getElementById("formation_date_end");
  const durationInput = document.getElementById("formation_duration");

  function calculateDuration() {
    const startDate = new Date(startDateInput.value);
    const endDate = new Date(endDateInput.value);

    if (startDate && endDate && endDate >= startDate) {
      const durationInDays = (endDate - startDate) / (1000 * 60 * 60 * 24);
      const durationInWeeks = Math.ceil(durationInDays / 7);
      durationInput.value = `${durationInWeeks} semaines`;
    } else {
      durationInput.value = "";
    }
  }

  startDateInput.addEventListener("change", calculateDuration);
  endDateInput.addEventListener("change", calculateDuration);
});
