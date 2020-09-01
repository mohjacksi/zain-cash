<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Json</title>


    <!-- Bootstrap core CSS -->
    <link href="{{asset("css/bootstrap.min.css")}}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{asset("css/signin.css")}}" rel="stylesheet">
    <style>
        textarea {
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;

            width: 100%;
            height: 160px;
        }
    </style>
</head>

<body class="text-center">
<form method="POST" action="{{ route("get_organized_json") }}" class="form-signin" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <a href="https://mjacksi.com">
            <img class="mb-4" src="https://mjacksi.com/files/uploads/2020/04/small-150x150.png" alt="" width="72"
                 height="72">
        </a>
        <h1 class="h1 mb-3 font-weight-normal">Json parser</h1>
        <p class=" mb-3 font-weight-normal">* Upload a file or just paste your json inside the textarea below</p>
        <input name="file" type="file" class="form-control-file" id="file">
        <br>
        <hr>

        <h2 class="h3 mb-3 font-weight-normal">Enter Json</h2>

        <label for="textArea" class="sr-only">Example textarea</label>
        <textarea name="json" class="form-control" id="textArea" rows="5" placeholder="Json" autofocus>[{"letter.txt":"Richard"},{"paper.pdf":"jack"},{"test.py":"Johnny"},{"numbers.docx":"jack"}]</textarea>
    </div>
    <div class="mb-3">

        <button class="btn btn-lg btn-primary btn-block" type="submit">Get Organized Json</button>
        <p class="mt-5 mb-3 text-muted">&copy; Mjacksi.com</p>
        <div class="">
            <label for="textArea" class="sr-only">Example textarea</label>
            <textarea class="form-control" id="resultTextArea" rows="10" placeholder="Json"
                      style="display:{{!isset($value)?"none":""}};"
                      autofocus>{{isset($value) && $value != null ? $value : ""}}</textarea>

        </div>

    </div>
</form>

</body>
</html>
<script>
    document.addEventListener("DOMContentLoaded", function(event) {
        prettyPrint();
    });
    function prettyPrint() {
        var ugly = document.getElementById('resultTextArea').value;
        var obj = JSON.parse(ugly);
        var pretty = JSON.stringify(obj, undefined, 4);
        document.getElementById('resultTextArea').value = pretty;
    }

</script>
