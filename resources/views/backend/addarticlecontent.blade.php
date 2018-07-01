<!doctype html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>添加文章内容</title>
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.25.0/codemirror.min.css">

    <!-- Include Editor style. -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.8.4/css/froala_editor.pkgd.min.css" rel="stylesheet" type="text/css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.8.4/css/froala_style.min.css" rel="stylesheet" type="text/css" />
</head>
<body>

<div class="container">

    <h3 class="text-center">添加内容</h3>
    <div style="text-align: left;margin-top: 10px">
        <form class="form-horizontal" method="post" action="/darenwx/addarticlecontent/{{$id}}" enctype="multipart/form-data" >

            <div class="form-group">
                <label class="col-sm-2 control-label text-right" for="type">内容类型:</label>
                <div class="col-sm-10">
                    <select name="type" id="type">
                        <option  value="0">文本</option>
                        <option value="1">代码</option>
                        <option value="2">图片</option>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label text-right" for="content">简介:</label>
                <div class="col-sm-10">
                    <textarea class="form-control " id="content" name="content" rows="20"></textarea>
                </div>
            </div>

            <div style="text-align: center">
                <button type="submit" class="btn btn-default" style="vertical-align: middle;text-align: center; ">添加</button>
            </div>

            <input type="hidden" name="_token" value="{{ csrf_token() }}">
        </form>

    </div>
</div>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.25.0/codemirror.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.25.0/mode/xml/xml.min.js"></script>

<!-- Include Editor JS files. -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.8.4/js/froala_editor.pkgd.min.js"></script>

<!-- Initialize the editor. -->

<script> $(function() { $('textarea').froalaEditor() }); </script>
<script src="/js/bootstrap.min.js"></script>
</body>
</html>
