const editModal = document.getElementById('editModal')
editModal.addEventListener('show.bs.modal', event => {
    // Button that triggered the modal
    const button = event.relatedTarget;
    // Get mode from button
    const mode = button.getAttribute("data-bs-mode");

    // Get elements from modal
    const title = editModal.querySelector('#editModalLabel');
    const projectIdInput = editModal.querySelector('#projektIdInput');
    const projectNameInput = editModal.querySelector('#projektNameInput');
    const projectBeschreibungText = editModal.querySelector('#beschreibungTextArea');

    if (mode === 'edit') {
        title.textContent = 'Projekt bearbeiten'

        // Get data about the select area
        const projectSelect = document.getElementById('projectSelect');
        const selectedOption = projectSelect.options[projectSelect.selectedIndex];

        // Extract Info from selected element
        const selectedProjectId = projectSelect.value;
        const selectedProjectName = selectedOption.getAttribute('label');
        const selectedProjectBeschreibung = selectedOption.getAttribute('data-bs-beschreibung');

        // Fill attributes
        projectIdInput.setAttribute('value', selectedProjectId);
        projectNameInput.setAttribute('value', selectedProjectName);
        projectBeschreibungText.textContent = selectedProjectBeschreibung;
    }
    else {
        // New user dialog
        title.textContent = 'Projekt erstellen'

        // Clear attributes
        projectIdInput.removeAttribute('value');
        projectNameInput.removeAttribute('value');
        projectBeschreibungText.textContent = '';
    }
});