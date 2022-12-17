let container = document.getElementById('container')

toggle = () => {
	container.classList.toggle('sign-up')
	container.classList.toggle('sign-u[')
}

setTimeout(() => {
	container.classList.add('sign-up')
}, 200)