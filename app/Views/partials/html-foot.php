</body>
<script>
    function togglePassword() {
        var passwordField = document.getElementById("password");
        var eyeIcon = document.getElementById("eyeIcon");
        if (passwordField.type === "password") {
            passwordField.type = "text";
            eyeIcon.classList.replace("bi-eye-slash", "bi-eye");
        } else {
            passwordField.type = "password";
            eyeIcon.classList.replace("bi-eye", "bi-eye-slash");
        }
    }
</script>

</html>