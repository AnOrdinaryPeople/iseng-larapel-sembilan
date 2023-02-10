(() => {
  const parser = document.getElementById('users-parser');

  (document.getElementById('user-delete-confirm') as Element)?.addEventListener?.('show.bs.modal', (event) => {
    let obj: Record<string, string | number> = {}

    try {
      const attr = event.relatedTarget?.getAttribute?.('data-bs-json')

      if (attr) {
        obj = JSON.parse(attr)
      }
    } catch {
      //
    }

    if (event.target && obj?.id !== void 0 && obj?.email !== void 0) {
      const p = event.target.querySelector('p'),
        form = event.target.querySelector('form')

      if (p) {
        p.innerHTML = parser?.getAttribute?.('data-bs-msg')?.replace?.(/:email/g, '' + obj.email) || ''
      }

      if (form) {
        form.setAttribute('action', parser?.getAttribute?.('data-bs-url')?.replace?.(/:id/g, '' + obj.id) || '')
      }
    }
  })
})()
