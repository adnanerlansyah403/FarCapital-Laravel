@extends("frontend.master")

@section("title", "List Product")

@section("content_master")

    <a href="{{ route('products.create') }}">Tambah Product</a>
    <table border="1">
        <thead>
            <tr>
                <th>Name</th>
                <th>Harga</th>
                <th>Deskripsi</th>
                <th>Rating</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody id="daftar-product">
            
        </tbody>
    </table>

    <p id="loading">
        
    </p>

    <script src="https://code.jquery.com/jquery-3.6.2.min.js"></script>

    <script>
        $.ajax({
            url: "http://127.0.0.1:8000/api/products/list",
            type: "GET",
            dataType: "json",
            beforeSend: function () { 
                let loader = true;
                if(loader) {
                    $("#loading").text('Loading...');
                }
            },
            success: response => {
                let products = response.data
                let htmlString = ""
                loading = false
                if(!loading) {
                    $("#loading").text("");
                }
                for(let product of products) {
                    htmlString += `
                        <tr>
                            <td>${product.nama}</td>
                            <td>${product.harga}</td>
                            <td>${product.deskripsi}</td>
                            <td>${product.rating}</td>
                            <td>
                                <a href="http://localhost:8000/products/${product.id}/show">
                                    Details
                                </a>  
                                <a onClick={deleteProduct(${product.id})}>
                                    <button>
                                        Hapus
                                    </button>
                                </a>    
                            </td>
                        </tr>
                    `
                }
                $('#daftar-product').append($.parseHTML(htmlString))
            }
        })

        function deleteProduct(id) {
            $.ajax({
                url: `http://127.0.0.1:8000/api/products/${id}/delete`,
                type: "POST",
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