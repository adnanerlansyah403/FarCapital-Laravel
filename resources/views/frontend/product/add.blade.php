@extends("frontend.master")

@section("title", 'Add Product')

@section("content_master")


    <a href="{{ route("products.index") }}">Kembali</a>
    <div class="product"><br>
        <label for="nama">Nama</label>
        <input type="text" id="nama"><br>
        <label for="harga">Harga</label>
        <input type="number" id="harga"><br>
        <label for="rating">Rating</label>
        <input type="number" id="rating"><br><br>
        <label for="deskripsi">Deskripsi</label><br>
        <textarea name="deskripsi" id="deskripsi" cols="30" rows="10"></textarea><br>
        <label for="image">Image</label>
        <input type="file" name="image" id="image"><br><br>

        <button type="submit" id="submit">Submit</button>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.2.min.js"></script>
    
    <script>

        $("#submit").click(function () {
            let nama = $("#nama").val();
            let harga = $("#harga").val();
            let deskripsi = $("#deskripsi").val();
            let rating = $("#rating").val();
            let image = $("#image").prop("files")[0];

            if(nama == "") {
                return alert("Nama harus di isi");
            }
            if(harga == "") {
                return alert("Harga harus di isi");
            }
            if(deskripsi == "") {
                return alert("Deskripsi harus di isi");
            }

            let formData = new FormData();
            formData.append("nama", nama)
            formData.append("harga", harga)
            formData.append("deskripsi", deskripsi)
            formData.append("rating", rating)
            formData.append("image", image)

            console.log(image);

            $.ajax({
                url: "http://127.0.0.1:8000/api/products/store",
                type: "POST",
                data: formData,
                processData: false,
                contentType: false,
                cache: false,
                success: response => {
                    window.location.href = "http://127.0.0.1:8000/products"
                },
                error: err => {
                    console.log(err);
                }
            })
        })

        // function addProduct() {

        //     let nama = $("#nama").val();
        //     let harga = $("#harga").val();
        //     let deskripsi = $("#deskripsi").val();
        //     let rating = $("#rating").val();
        //     let image = $("#image").prop("files")[0];

        //     if(nama == "") {
        //         return alert("Nama harus di isi");
        //     }
        //     if(harga == "") {
        //         return alert("Harga harus di isi");
        //     }
        //     if(deskripsi == "") {
        //         return alert("Deskripsi harus di isi");
        //     }

        //     let formData = new FormData();
        //     formData.append("nama", nama)
        //     formData.append("harga", harga)
        //     formData.append("deskripsi", deskripsi)
        //     formData.append("rating", rating)
        //     formData.append("image", image)

        //     console.log(image);

        //     $.ajax({
        //         url: "http://127.0.0.1:8000/api/products/store",
        //         type: "POST",
        //         data: formData,
        //         processData: false,
        //         contentType: false,
        //         cache: false,
        //         enctype: "multipart/form-data"
        //         success: response => {
        //             window.location.href = "http://127.0.0.1:8000/products"
        //         },
        //         error: err => {
        //             console.log(err);
        //         }
        //     })
        // }
        

    </script>


@endsection