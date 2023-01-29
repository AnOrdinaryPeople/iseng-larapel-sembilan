(() => {
  const parser = document.getElementById('users-parser');

  /**
   * @param {string} email
   */
  function modalBody(email) {
    return parser.getAttribute('data-bs-msg').replace(/:email/g, email);
  }

  /**
   * @param {number} id
   */
  function destroy(id) {
    return parser.getAttribute('data-bs-url').replace(/:id/g, id);
  }

  document.getElementById('user-delete-confirm').addEventListener('show.bs.modal', (event) => {
    let obj = {};

    try {
      obj = JSON.parse(
        event.relatedTarget.getAttribute('data-bs-json')
      );
    } catch { }

    if (obj?.id !== void 0 && obj?.email !== void 0) {
      event.target.querySelector('p').innerHTML = modalBody(obj.email);
      event.target.querySelector('form').action = destroy(obj.id);
    }
  });
})();
