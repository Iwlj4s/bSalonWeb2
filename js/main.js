document.getElementById('dataForm').addEventListener('submit', function(event) {
    var name = document.getElementById('name').value;
    var phone = document.getElementById('phone').value;
    var email = document.getElementById('email').value;

    console.log(name, phone, email)
    this.submit();
});