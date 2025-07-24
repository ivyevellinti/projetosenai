const form = document.querySelector('form')
const inputs = document.querySelectorAll('input')
const button = document.querySelector('.entrar')

form.addEventListener('submit', (event) => {
    event.preventDefault()
})

button.addEventListener("click", () => {
    function submit() {
        form.submit()
    }

    const allFilled = Array.from(inputs).every(input => input.value.trim() !== '')

    if (allFilled) {
        submit()
    } else {
        alert("Preencha suas credenciais!")
    }

})