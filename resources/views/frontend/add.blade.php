<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>API AJAX</title>
</head>
<body>

    <form id="form">
        <label for="nama">Nama</label>
        <input type="text" id="nama"><br>
        <label for="email">Email</label>
        <input type="email" id="email"><br>
        <label for="password">Password</label>
        <input type="password" id="password"><br>

        <button type="submit">Submit</button>
    </form>
    
    <script src="https://code.jquery.com/jquery-3.6.2.min.js"></script>
    
    <script type="text/javascript" defer>
    
        function addPengguna() {

            let nama = $("#nama").val();
            let email = $("#email").val();
            let password = $("#password").val();

            if(nama == "") {
                return alert("Nama harus di isi");
            }
            if(email == "") {
                return alert("Nama harus di isi");
            }
            if(password == "") {
                return alert("Nama harus di isi");
            }

            let formData = new FormData();
            formData.append("nama", nama)
            formData.append("email", email)
            formData.append("password", password)

            $.ajax({
                url: "http://127.0.0.1:8000/api/pengguna/store",
                type: "POST",
                data: formData,
                processData: false,
                contentType: false,
                cache: false,
                success: _ => {
                    window.location.href = "http://127.0.0.1:8000"
                },
                error: err => {
                    console.log(err);
                }
            })
        }

        const form = document.getElementById('form');
        form.addEventListener("submit", addPengguna);
    
    </script>
    
</body>
</html>