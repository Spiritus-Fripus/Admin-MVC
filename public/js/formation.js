console.log("JavaScript chargé");

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
    if (event.target == modal) {
      modal.style.display = "none";
    }
  };
});
