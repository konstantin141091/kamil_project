let inputs = document.querySelectorAll('.placeholder');
inputs.forEach((el) => {
  if (el.value != '') {
    el.classList.add('has-value');
  }
});
