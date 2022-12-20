@extends("frontend.master")

@section("title", 'List Pengguna')

@section("content_master")

<a href="{{ route('add') }}">Tambah Pengguna</a>
<table border="1">
    <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody id="daftar-pengguna">
        
    </tbody>
</table>

<p id="loading">
    
</p>

<script src="https://code.jquery.com/jquery-3.6.2.min.js"></script>

<script type="text/javascript">
    $.ajax({
        url: "http://127.0.0.1:8000/api/pengguna/list",
        type: "GET",
        dataType: "json",
        beforeSend: function () { 
            let loader = true;
            if(loader) {
                $("#loading").text('Loading...');
            }
        },
        success: response => {
            let listPengguna = response.data
            let htmlString = ""
            loading = false
            if(!loading) {
                $("#loading").text("");
            }
            for(let pengguna of listPengguna) {
                htmlString += `
                    <tr>
                        <td>${pengguna.nama}</td>
                        <td>${pengguna.email}</td>
                        <td>
                            <a href="http://localhost:8000/detail/${pengguna.id}">
                                Details
                            </a>  
                            <a onClick={deletePengguna(${pengguna.id})}>
                                <button>Hapus</button>
                            </a>    
                        </td>
                    </tr>
                `
            }
            $('#daftar-pengguna').append($.parseHTML(htmlString))
        }
    })

    function deletePengguna(id) {
        $.ajax({
            url: `http://127.0.0.1:8000/api/pengguna/${id}/delete`,
            type: "POST",
            dataType: "json",
            success: _ => {
                console.log("success!");
                window.location.reload();
            },
            error: err => {
                console.log(err);
            }
        })
    }
</script>

    
@endsection