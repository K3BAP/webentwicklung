const exampleModal = document.getElementById('deleteModal')
exampleModal.addEventListener('show.bs.modal', event => {
    // Button that triggered the modal
    const button = event.relatedTarget;
    // Extract info from data-bs-* attributes
    const username = button.getAttribute('data-bs-username');
    const del_link = button.getAttribute('data-bs-delete-link');
    // If necessary, you could initiate an AJAX request here
    // and then do the updating in a callback.
    //
    // Update the modal's content.
    //const modalTitle = exampleModal.querySelector('.modal-title')
    const modalText = exampleModal.querySelector('.modal-body p');
    const deleteBtn = exampleModal.querySelector('#deleteBtn');

    modalText.textContent = `Soll das Mitglied "${username}" wirklich gelöscht werden?`;
    console.log(del_link);
    deleteBtn.setAttribute("href", del_link);
});
