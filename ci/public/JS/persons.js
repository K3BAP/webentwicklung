const deleteModal = document.getElementById('deleteModal')
deleteModal.addEventListener('show.bs.modal', event => {
    // Button that triggered the modal
    const button = event.relatedTarget;
    // Extract info from data-bs-* attributes
    const username = button.getAttribute('data-bs-username');
    const del_link = button.getAttribute('data-bs-delete-link');
    // If necessary, you could initiate an AJAX request here
    // and then do the updating in a callback.
    //
    // Update the modal's content.
    //const modalTitle = deleteModal.querySelector('.modal-title')
    const modalText = deleteModal.querySelector('.modal-body p');
    const deleteBtn = deleteModal.querySelector('#deleteBtn');

    modalText.textContent = `Soll das Mitglied "${username}" wirklich gelöscht werden?`;
    deleteBtn.setAttribute("href", del_link);
});

const editModal = document.getElementById('editModal')
editModal.addEventListener('show.bs.modal', event => {
    // Button that triggered the modal
    const button = event.relatedTarget;
    // Extract info from data-bs-* attributes
    const mitgliedid = button.getAttribute("data-bs-mitgliedid");
    const pwplaceholder = button.getAttribute('data-bs-pwplaceholder');
    const showpw = button.getAttribute('data-bs-showpw');

    const title = editModal.querySelector('#editModalLabel');

    // Get form elements from modal
    const userIdInput = editModal.querySelector('#userIdInput');
    const usernameInput = editModal.querySelector('#usernameInput');
    const emailInput = editModal.querySelector('#emailInput');
    const passwordInput = editModal.querySelector('#passwordInput');
    const assignedCheck = editModal.querySelector('#assignedCheck');

    passwordInput.setAttribute('placeholder', pwplaceholder);

    if (mitgliedid != null) {
        title.textContent = 'Mitglied bearbeiten'
        // Load data for edit dialog
        // Extract info from DOM
        const tableRow = button.parentNode.parentNode;
        const email = tableRow.querySelector('.data-email').textContent;
        const username = tableRow.querySelector('.data-username').textContent;
        const assigned = tableRow.querySelector('.data-assigned').getAttribute('checked');

        // Fill attributes
        userIdInput.setAttribute('value', mitgliedid);
        usernameInput.setAttribute('value', username);
        emailInput.setAttribute('value', email);
        if (assigned) assignedCheck.setAttribute('checked', 'checked');
        if (showpw != 'true') passwordInput.setAttribute('disabled' , 'true');
        else passwordInput.removeAttribute('disabled');
    }
    else {
        // New user dialog
        title.textContent = 'Mitglied erstellen'

        // Clear attributes
        userIdInput.removeAttribute('value');
        usernameInput.removeAttribute('value');
        emailInput.removeAttribute('value');
        assignedCheck.removeAttribute('checked');
        passwordInput.removeAttribute('disabled');
    }

});
