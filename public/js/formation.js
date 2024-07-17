document.addEventListener("DOMContentLoaded", (event) => {
  const modal = document.getElementById("deleteModal");
  const span = document.getElementsByClassName("close")[0];
  const confirmDeleteButton = document.getElementById("confirmDelete");
  const cancelDeleteButton = document.getElementById("cancelDelete");
  let formToSubmit = null;

  document.querySelectorAll(".bouton-suppression").forEach((button) => {
    button.addEventListener("click", function (event) {
      event.preventDefault();
      formToSubmit = this.closest("form");
      modal.style.display = "block";
    });
  });

  span.onclick = function () {
    modal.style.display = "none";
  };

  cancelDeleteButton.onclick = function () {
    modal.style.display = "none";
  };

  confirmDeleteButton.onclick = function () {
    if (formToSubmit) {
      formToSubmit.submit();
    }
  };

  window.onclick = function (event) {
    if (event.target === modal) {
      modal.style.display = "none";
    }
  };
});

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
