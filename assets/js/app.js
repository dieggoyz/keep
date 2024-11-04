const modal = document.getElementById('modal')
modal.addEventListener('show.bs.modal', event => {
  const url = '';
  console.log(url)
  const button = event.relatedTarget
  const title = button.getAttribute('data-bs-title')
  const content = button.getAttribute('data-bs-content')
  const modalBodyInput = modal.querySelector('.mb-3 input')
  const modalBodyTextarea = modal.querySelector('.mb-0 textarea')
  const form = modal.querySelector('form')
  const a = modal.querySelector('.modal-footer a')
  modalBodyInput.value = title
  modalBodyTextarea.value = content
  form.action = `/home/update?id=${button.getAttribute('data-bs-id')}`
  a.href = `/home/delete?id=${button.getAttribute('data-bs-id')}`
})

// console.log(window.location.host)
// console.log(window.location.pathname)