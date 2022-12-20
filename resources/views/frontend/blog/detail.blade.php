@extends("frontend.master")

@section("title", 'Details Of Product')

@section("content_master")

    <a href="{{ route("blogs.index") }}">Kembali</a>
     
    <img src="" alt="" id="photo">
    <form id="form"><br>
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


        <button type="submit">Submit</button>
    </form>

    <script src="https://code.jquery.com/jquery-3.6.2.min.js"></script>
    
    <script type="text/javascript" defer>

        const form = document.getElementById('form');

        $.ajax({
            url: "http://127.0.0.1:8000/api/blogs/{{ $id }}/show",
            type: "GET",
            dataType: "json",
            beforeSend: function () { 
                let loader = true;
                if(loader) {
                    $("#loading").text('Loading...');
                }
            },
            success: response => {
                let post = response.data
                loading = false
                if(!loading) {
                    $("#loading").text("");
                }
                $("#title").val(post.title);
                $("#body").val(post.body);
                $("#author").val(post.author);
                $("#photo").attr("src", post.image_path);
            }
        })
    
        function updatePost(id) {

            let title = $("#title").val();
            let body = $("#body").val();
            let author = $("#author").val();
            let image = $("#image").prop("files")[0];
            let cover = $("#cover").prop("files")[0];
            
            if(title == "") {
                return alert("Title harus di isi");
            }
            if(body == "") {
                return alert("Content harus di isi");
            }
            if(author == "") {
                return alert("Author harus di isi");
            }
            
            let formData = new FormData();
            formData.append("title", title)
            formData.append("body", body)
            formData.append("author", author)
            formData.append("image", image)
            formData.append("cover", cover)

            $.ajax({
                url: "http://127.0.0.1:8000/api/blogs/{{ $id }}/update",
                type: "POST",
                data: formData,
                processData: false,
                contentType: false,
                success: response => {
                    window.location.href = "http://127.0.0.1:8000/blogs"
                },
                error: err => {
                    console.log(err);
                }
            })
        }
        form.addEventListener("submit", updatePost);
    
    </script>
    

@endsection