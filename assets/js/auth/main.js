// Toogle Password
const togglePassword = document.getElementById('toggle-password');
const passwordInput = document.getElementById('password');
const eyeIcon = document.getElementById('eye-icon');

togglePassword.addEventListener('click', () => {
	const isPasswordHidden = passwordInput.type === 'password';
	passwordInput.type = isPasswordHidden ? 'text' : 'password';
	eyeIcon.classList.toggle('fa-eye');
	eyeIcon.classList.toggle('fa-eye-slash');
});