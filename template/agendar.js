const form = document.querySelector('form')
const inputs = document.querySelectorAll('input')
const button = document.querySelector('.agendar')

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
        // alert("Agendamento realizado com sucesso!")
    } else {
        alert("Preencha os dados da sua consulta!")
    }
})