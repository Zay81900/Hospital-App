// Function to open the profile modal

document.addEventListener("DOMContentLoaded", function () {
    var updateProfileModal = document.getElementById('updateProfileModal');

    updateProfileModal.addEventListener('hidden.bs.modal', function () {
        // Ensure the modal backdrop is removed
        document.body.classList.remove('modal-open');
        document.body.style.overflow = ''; // Restore scrolling

        let modalBackdrop = document.querySelector('.modal-backdrop');
        if (modalBackdrop) {
            modalBackdrop.remove();
        }
    });

    updateProfileModal.addEventListener('shown.bs.modal', function () {
        document.body.style.overflow = 'hidden'; // Prevent scrolling when modal is open
    });
});

function openProfileModal() {
    var modalElement = document.getElementById('updateProfileModal');

    if (modalElement) {
        var modalInstance = new bootstrap.Modal(modalElement);
        modalInstance.show();

        // Store the instance so we can close it later
        modalElement.dataset.bsModalInstance = modalInstance;
    } else {
        console.error("Modal element not found!");
    }
}

function previewImage(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            document.querySelector('.doctor-image').src = e.target.result;
        }
        reader.readAsDataURL(input.files[0]);
    }
}