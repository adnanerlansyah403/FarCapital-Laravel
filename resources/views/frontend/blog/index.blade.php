@extends("frontend.master")

@section("title", "List Post")

@section("content_master")

    <a href="{{ route('blogs.create') }}">Tambah Post</a>
    <table border="1">
        <thead>
            <tr>
                <th>Title</th>
                <th>Body</th>
                <th>Author</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody id="daftar-product">
            
        </tbody>
    </table>

    <p id="loading">
        
    </p>

    <script src="https://code.jquery.com/jquery-3.6.2.min.js"></script>

    <script type="text/javascript">
        $.ajax({
            url: "http://127.0.0.1:8000/api/blogs/list",
            type: "GET",
            dataType: "json",
            beforeSend: function () { 
                let loader = true;
                if(loader) {
                    $("#loading").text('Loading...');
                }
            },
            success: response => {
                let posts = response.data
                let htmlString = ""
                loading = false
                if(!loading) {
                    $("#loading").text("");
                }
                for(let post of posts) {
                    htmlString += `
                        <tr>
                            <td>${post.title}</td>
                            <td>${post.body}</td>
                            <td>${post.author}</td>
                            <td>
                                <a href="http://localhost:8000/blogs/${post.id}/show">
                                    Details
                                </a>  
                                <a onClick={deletePost(${post.id})}>
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

        function deletePost(id) {
            $.ajax({
                url: `http://127.0.0.1:8000/api/blogs/${id}/delete`,
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