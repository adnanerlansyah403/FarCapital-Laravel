@extends("frontend.master")

@section("title", 'Details Of Product')

@section("content_master")

    <a href="{{ route("products.index") }}">Kembali</a>
     <br><br>
    <img id="photo">
    <div id="form"><br>
        <label for="nama">Nama</label>
        <input type="text" id="nama"><br>
        <label for="harga">Harga</label>
        <input type="number" id="harga"><br>
        <label for="rating">Rating</label>
        <input type="number" id="rating"><br>
        <label for="deskripsi">Deskripsi</label><br>
        <textarea name="deskripsi" id="deskripsi" cols="30" rows="10"></textarea><br>
        <label for="image">Image</label>
        <input type="file" name="image" id="image"><br><br>

        <button type="submit" id="submit">Submit</button>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.2.min.js"></script>
    
    <script>

        $.ajax({
            url: "http://127.0.0.1:8000/api/products/{{ $id }}/show",
            type: "GET",
            dataType: "json",
            beforeSend: function () { 
                let loader = true;
                if(loader) {
                    $("#loading").text('Loading...');
                }
            },
            success: response => {
                let product = response.data
                loading = false
                if(!loading) {
                    $("#loading").text("");
                }
                $("#nama").val(product.nama);
                $("#harga").val(product.harga);
                $("#rating").val(product.rating);
                $("#deskripsi").val(product.deskripsi);
                $("#photo").attr("src", "http://localhost:8000/" + product.image_path);
            }
        })

        $("#image").change(function() {
            if ($("#image").length > 0) {
            console.log("Hello");
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#photo').attr('src', e.target.result);
                }

                
                reader.readAsDataURL($('#image').files[0]);
            }
        })
    
        $("#submit").click(function (id) {
            let nama = $("#nama").val();
            let harga = $("#harga").val();
            let rating = $("#rating").val();
            let deskripsi = $("#deskripsi").val();
            let image = $("#image").prop("files")[0];
            
            if(nama == "") {
                return alert("Nama harus di isi");
            }
            if(harga == "") {
                return alert("Harga harus di isi");
            }
            if(rating == "") {
                return alert("Rating harus di isi");
            }
            if(deskripsi == "") {
                return alert("Deskripsi harus di isi");
            }
            
            let formData = new FormData();
            formData.append("nama", nama)
            formData.append("harga", harga)
            formData.append("rating", rating)
            formData.append("deskripsi", deskripsi)
            formData.append("image", image)

            $.ajax({
                url: "http://127.0.0.1:8000/api/products/{{ $id }}/update",
                type: "POST",
                data: formData,
                processData: false,
                contentType: false,
                success: response => {

                    window.location.href = "http://127.0.0.1:8000/products"
                },
                error: err => {
                    console.log(err);
                }
            })
        })
    
    </script>
    

@endsection