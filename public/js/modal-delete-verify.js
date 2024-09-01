document.addEventListener("DOMContentLoaded", function () {
  const deleteButtons = document.querySelectorAll(".delete");
  const modal = document.getElementById("deleteModal");
  const closeModal = document.querySelector(".close");
  const confirmDelete = document.getElementById("confirmDelete");
  let hrefToNavigate;

  deleteButtons.forEach((button) => {
    button.addEventListener("click", function (event) {
      event.preventDefault();
      hrefToNavigate = this.getAttribute("href");
      modal.style.display = "block";
    });
  });

  closeModal.addEventListener("click", function () {
    modal.style.display = "none";
  });

  confirmDelete.addEventListener("click", function () {
    window.location.href = hrefToNavigate;
  });

  window.addEventListener("click", function (event) {
    if (event.target === modal) {
      modal.style.display = "none";
    }
  });

  document
    .getElementById("cancelDelete")
    .addEventListener("click", function () {
      modal.style.display = "none";
    });
});
