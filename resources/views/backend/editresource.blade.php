<!doctype html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>内容列表</title>
    <link href="/css/bootstrap.min.css" rel="stylesheet">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.25.0/codemirror.min.css">

    <!-- Include Editor style. -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.8.4/css/froala_editor.pkgd.min.css" rel="stylesheet" type="text/css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.8.4/css/froala_style.min.css" rel="stylesheet" type="text/css" />

</head>
<body>

<div class="container">
    <h3 class="text-center">添加资源</h3>
    <div style="text-align: left;margin-top: 10px">
        <form class="form-horizontal" method="post" action="/darenwx/updateresource/{{$id}}" enctype="multipart/form-data" >
            <div class="form-group">
                <label class="col-sm-2 control-label text-right" for="title">资源标题:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control " id="title" name="title"  value="{{$resouceinfo->title}}">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label text-right" for="type">资源类型:</label>
                <div class="col-sm-10">
                    <select name="type" id="type">
                        <option  value="0" @if($resouceinfo->type===0)  selected="selected"  @endif >电子书</option>
                        <option value="1" @if($resouceinfo->type===1)  selected="selected"  @endif >源码</option>
                        <option value="2" @if($resouceinfo->type===2)  selected="selected"  @endif>课程</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label text-right" for="bigImgUrl1">封面图片:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control " id="bigImgUrl1" name="bigImgUrl1"  value="{{$resouceinfo->bigImgUrl}}">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label text-right" for="bigImgUrl">封面图片:</label>
                <div class="col-sm-10">
                    <input class="form-control" type="file"  name="bigImgUrl"  id="bigImgUrl" >
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label text-right" for="onelineUrl">在线地址:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control " id="onelineUrl" name="onelineUrl"  value="{{$resouceinfo->onelineUrl}}">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label text-right" for="downURLBaidu">百度网盘:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control " id="downURLBaidu" name="downURLBaidu"  value="{{$resouceinfo->downURLBaidu}}">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label text-right" for="downUrlTX">腾讯网盘:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control " id="downUrlTX" name="downUrlTX" value="{{$resouceinfo->downUrlTX}}">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label text-right" for="about">简介:</label>
                <div class="col-sm-10">
                    <textarea class="form-control " id="about" name="about" rows="5">{{$resouceinfo->about}}</textarea>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label text-right" for="conetent">详细介绍:</label>
                <div class="col-sm-10">
                    <textarea class="form-control " id="conetent" name="conetent" rows="20">{{$resouceinfo->conetent}}</textarea>
                </div>
            </div>
            <div style="text-align: center">
                <button type="submit" class="btn btn-default" style="vertical-align: middle;text-align: center; ">编辑</button>
            </div>
            <input type="hidden" name="_method" value="PUT">
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
<script> $(function() { $('#conetent').froalaEditor() }); </script>

<script src="/js/bootstrap.min.js"></script>
</body>
</html>
