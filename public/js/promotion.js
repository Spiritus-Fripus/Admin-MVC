document.addEventListener("DOMContentLoaded", function () {
  const deleteModal = document.getElementById("deleteModal");
  const closeModal = document.querySelector(".close");
  const confirmDelete = document.getElementById("confirmDelete");
  const cancelDelete = document.getElementById("cancelDelete");
  const promotionIdToDelete = document.getElementById("promotionIdToDelete");
  const deleteForm = document.getElementById("deleteForm");

  window.openDeleteModal = function (promotionId) {
    promotionIdToDelete.value = promotionId;
    deleteModal.style.display = "block";
  };

  closeModal.onclick = function () {
    deleteModal.style.display = "none";
  };

  cancelDelete.onclick = function () {
    deleteModal.style.display = "none";
  };

  confirmDelete.onclick = function () {
    deleteForm.submit();
  };

  window.onclick = function (event) {
    if (event.target == deleteModal) {
      deleteModal.style.display = "none";
    }
  };
});
