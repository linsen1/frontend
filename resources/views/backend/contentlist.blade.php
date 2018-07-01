<!doctype html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>文章内容列表</title>
    <link href="/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container">
    <h3 className="text-center">文章内容列表</h3>
    <ol class="breadcrumb">
        <li><a href="/backend/articlelist">返回文章</a></li>
        <li><a href="/backend/addarticlecontent/{{$articleID}}">添加文章内容</a></li>
    </ol>
    <table class="table table-bordered" style="margin-top: 20px">
        <tr>
            <td>序号</td>
            <td>内容</td>
            <td>编辑</td>
            <td>删除</td>
        </tr>
        @foreach ($contentlist as $content)
            <tr>
                <td>{{$content->id}}</td>
                <td>{{$content->content}}</td>
                <td>

                    &nbsp;<a href="/backend/editArticleContent/{{$content->id}}/articleid/{{$articleID}}">编辑</a>&nbsp;&nbsp;

                </td>
                <td>
                    <form method="post" action="/darenwx/delarticlecontent/{{$content->id}}/articleid/{{$articleID}}">
                        <input type="hidden" name="_method" value="DELETE">
                        <button type="submit" class="btn btn-link" onclick="javascript:if(window.confirm('你确定删除？')){return true;}else{return false;}">删除</button></form>
                </td>
            </tr>
        @endforeach

    </table>
    <div style="text-align: center">
        {{ $contentlist ->links() }}
    </div>
</div>
<script src="https://cdn.bootcss.com/jquery/1.12.4/jquery.min.js"></script>
<script src="/js/bootstrap.min.js"></script>
</body>
</html>
