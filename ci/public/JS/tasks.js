const deleteModal = document.getElementById('deleteModal')
deleteModal.addEventListener('show.bs.modal', event => {
    // Button that triggered the modal
    const button = event.relatedTarget;
    // Extract info from data-bs-* attributes
    const username = button.getAttribute('data-bs-taskname');
    const del_link = button.getAttribute('data-bs-delete-link');
    // If necessary, you could initiate an AJAX request here
    // and then do the updating in a callback.
    //
    // Update the modal's content.
    //const modalTitle = deleteModal.querySelector('.modal-title')
    const modalText = deleteModal.querySelector('.modal-body p');
    const deleteBtn = deleteModal.querySelector('#deleteBtn');

    modalText.textContent = `Soll die Aufgabe "${username}" wirklich gelöscht werden?`;
    deleteBtn.setAttribute("href", del_link);
});

const editModal = document.getElementById('editModal')
editModal.addEventListener('show.bs.modal', event => {
    // Button that triggered the modal
    const button = event.relatedTarget;
    // Extract info from data-bs-* attributes
    const aufgabeid = button.getAttribute("data-bs-aufgabeid");
    const aufgabeerstellt = button.getAttribute("data-bs-erstellt");
    const aufgabefaellig = button.getAttribute("data-bs-faellig");
    const reiterid = button.getAttribute("data-bs-reiterid");
    const zustaendig = button.getAttribute("data-bs-zustaendig");

    const title = editModal.querySelector('#editModalLabel');

    // Get form elements from modal
    const aufgabeIdInput = editModal.querySelector('#aufgabeIdInput');
    const aufgabeBezeichnungInput = editModal.querySelector('#aufgabeBezeichnungInput');
    const aufgabeBeschreibungText = editModal.querySelector('#aufgabeBeschreibungText');
    const erstellungsDatumInput = editModal.querySelector('#erstellungsDatumInput');
    const faelligDatumInput = editModal.querySelector('#faelligDatumInput');
    const reiterMenu = editModal.querySelector('#reiterMenu');
    const zustaendigMenu = editModal.querySelector('#zustaendigMenu');

    if (aufgabeid != null) {
        title.textContent = 'Aufgabe bearbeiten'
        // Load data for edit dialog

        // Extract info from DOM
        const tableRow = button.parentNode.parentNode;
        const bezeichnung = tableRow.querySelector('.data-name').textContent;
        const beschreibung = tableRow.querySelector('.data-beschreibung').textContent;

        // Fill attributes
        aufgabeIdInput.setAttribute('value', aufgabeid);
        aufgabeBezeichnungInput.setAttribute('value', bezeichnung);
        aufgabeBeschreibungText.textContent =  beschreibung;
        erstellungsDatumInput.setAttribute('value', aufgabeerstellt);
        faelligDatumInput.setAttribute('value', aufgabefaellig);

        // Select associated tabs in select menu
        for (let i = 0; i < reiterMenu.options.length; i++) {
            let item = reiterMenu.options[i];
            if (item.value === reiterid) {
                item.setAttribute('selected', '');
            }
            else {
                item.removeAttribute('selected');
            }
        }

        // Select associated persons in select menu
        const zustaendigArray = zustaendig.split(", ");
        for (let i = 0; i < zustaendigMenu.options.length; i++) {
            let item = zustaendigMenu.options[i];
            if (zustaendigArray.includes(item.value)) {
                item.setAttribute('selected', '');
            }
            else {
                item.removeAttribute('selected');
            }
        }

    }
    else {
        // New user dialog
        title.textContent = 'Aufgabe erstellen'

        // Clear attributes
        aufgabeIdInput.removeAttribute('value');
        aufgabeBezeichnungInput.removeAttribute('value');
        aufgabeBeschreibungText.textContent =  "";
        erstellungsDatumInput.setAttribute('value', new Date().toISOString().substring(0,10));
        faelligDatumInput.removeAttribute('value');

        // Select associated tabs in select menu
        for (let i = 0; i < reiterMenu.options.length; i++) {
            let item = reiterMenu.options[i];
            item.removeAttribute('selected');
        }

        // Select associated persons in select menu
        for (let i = 0; i < zustaendigMenu.options.length; i++) {
            let item = zustaendigMenu.options[i];
            item.removeAttribute('selected');
        }
    }

});