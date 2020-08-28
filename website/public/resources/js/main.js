// Doing error handling on form submit won't work here because the validation blocks the submit event from firing.

//Get all the inputs...
const inputs = document.querySelectorAll('input, select, textarea');

// Loop through them...
for(let input of inputs) {
  // Just before submit, the invalid event will fire, let's apply our class there.
  input.addEventListener('invalid', (event) => {
    input.classList.add('error');
  }, false);

  // Optional: Check validity onblur
 /* input.addEventListener('blur', (event) => {
    input.checkValidity();
})*/

}
