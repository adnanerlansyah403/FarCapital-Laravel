@extends("frontend.master")

@section("title", 'List Pengguna')

@section("content_master")

<a href="{{ route("index") }}">Kembali</a>

    <h1>Details Pengguna</h1>

    <form id="form">
        <label for="nama">Nama</label>
        <input type="text" id="nama"><br>
        <label for="email">Email</label>
        <input type="email" id="email"><br>
        <label for="password">Password</label>
        <input type="password" id="password" value="" autocomplete="off"><br>

        <button type="submit">Update Data</button>
    </form>
    
    
    <script src="https://code.jquery.com/jquery-3.6.2.min.js"></script>
    
    <script type="text/javascript" defer>

        const form = document.getElementById('form');

        $.ajax({
            url: "http://127.0.0.1:8000/api/pengguna/{{ $id }}/show",
            type: "GET",
            dataType: "json",
            beforeSend: function () { 
                let loader = true;
                if(loader) {
                    $("#loading").text('Loading...');
                }
            },
            success: response => {
                let pengguna = response.data
                loading = false
                if(!loading) {
                    $("#loading").text("");
                }
                $("#nama").val(pengguna.nama);
                $("#email").val(pengguna.email);
            }
        })
    
        function updatePengguna(id) {

            let nama = $("#nama").val();
            let email = $("#email").val();
            let password = $("#password").val();
            
            if(nama == "") {
                return alert("Nama harus di isi");
            }
            if(email == "") {
                return alert("Nama harus di isi");
            }
            
            let formData = new FormData();
            formData.append("nama", nama)
            formData.append("email", email)
            
            if(password !== "") formData.append("password", password)

            $.ajax({
                url: "http://127.0.0.1:8000/api/pengguna/{{ $id }}/update",
                type: "POST",
                data: formData,
                processData: false,
                contentType: false,
                success: _ => {
                    window.location.href = "http://127.0.0.1:8000"
                },
                error: err => {
                    console.log(err);
                }
            })
        }
        form.addEventListener("submit", updatePengguna);
    
    </script>
    
@endsection