@extends('common.admin_base')

@section('title','管理后台-分类编辑')

<!--页面顶部信息-->
@section('pageHeader')

    <div class="pageheader">
        <h2><i class="fa fa-home"></i> 分类编辑 <span>Subtitle goes here...</span></h2>
        <div class="breadcrumb-wrapper">
        </div>
    </div>
@endsection

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="panel-btns">
                <a href="" class="panel-close">&times;</a>
                <a href="" class="minimize">&minus;</a>
            </div>

            <h4 class="panel-title">分类编辑表单</h4>

        </div>
        <div class="panel-body panel-body-nopadding">


            <form class="form-horizontal form-bordered" action="{{route('admin.categort.doEdit')}}" method="post">
                {{csrf_field()}}
                <input type="hidden" name="id" value="{{$categorts->id}}">

                <div class="form-group">
                    <label class="col-sm-3 control-label">分类名称</label>
                    <div class="col-sm-6">
                        <input type="text" placeholder="分类名称" class="form-control" name='c_name' value="{{$categorts->c_name}}"/>
                    </div>
                </div>

                <div class="panel-footer">
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-3">
                            <button class="btn btn-primary btn-danger" id="btn-save">保存分类</button>&nbsp;
                        </div>
                    </div>
                </div><!-- panel-footer -->
            </form>

        </div><!-- panel-body -->

    </div><!-- panel -->

    <script type="text/javascript">
        $(".alert-danger").hide();
        $("#btn-save").click(function(){
            var name = $("input[name=name]").val();
            var url = $("input[name=url]").val();
            if(name == '' || url == ''){
                $("#error_msg").text('名字或url地址不能为空');
                $(".alert-danger").toggle();
                return false;
            }
        });
    </script>

@endsection


