@extends("frontend.master")

@section("title", 'Details Of Product')

@section("content_master")

    <a href="{{ route("blogs.index") }}">Kembali</a>
     
    
    <div id="form"><br>
        <label for="title">Title</label>
        <input type="text" id="title"><br>
        <label for="author">Author Name</label>
        <input type="text" id="author"><br>
        <label for="body">Content</label><br>
        <textarea name="body" id="body" cols="30" rows="10"></textarea><br>

        <label for="image">Image</label>
        <input type="file" name="image" id="image"><br><br>

        <label for="cover">Cover</label>
        <input type="file" name="cover" id="cover"><br><br>
        
        <button type="submit" id="submit">Submit</button>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.2.min.js"></script>
    
    <script type="text/javascript" defer>

        $("#submit").click(function () {

            let title = $("#title").val();
            let body = $("#body").val();
            let author = $("#author").val();
            let image = $("#image").prop("files")[0];
            let cover = $("#cover").prop("files")[0];

            if(title == "") {
                return alert("Nama harus di isi");
            }
            if(body == "") {
                return alert("Harga harus di isi");
            }
            if(author == "") {
                return alert("Deskripsi harus di isi");
            }

            let formData = new FormData();
            formData.append("title", title)
            formData.append("body", body)
            formData.append("author", author)
            formData.append("image", image);
            formData.append("cover", cover);

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

        const form = document.getElementById('form');
        form.addEventListener("submit", addPost);
    
    </script>
    

@endsection