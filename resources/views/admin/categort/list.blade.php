@extends('common.admin_base')

@section('title','管理后台-分类列表')

@section('pageHeader')
    <div class="pageheader">
        <h2><i class="fa fa-home"></i>分类列表<span>Subtitle goes here...</span></h2>
        <div class="breadcrumb-wrapper">
        </div>
    </div>
@endsection


@section('content')
    <div class="row" id="list">
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table table-primary  mb30">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>分类名称</th>
                        <th>操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(!empty($categorts))
                        @foreach($categorts as $categort)
                            <tr>
                                <td>{{$categort['id']}}</td>
                                <td>{{$categort['c_name']}}</td>
                                <td>
                                    <a href="{{route('admin.categort.edit',['id'=>$categort['id']])}}" class="btn btn-sm btn-success" >修改</a>
                                    <a  href="" class="btn btn-sm btn-primary">权限</a>
                                    <a href="{{route('admin.categort.del',['id'=>$categort['id']])}}" class="btn btn-sm btn-danger">删除</a>
                                </td>
                            </tr>
                        @endforeach

                    @endif
                    </tbody>
                </table>
                {{$categorts->links()}}
            </div><!-- table-responsive -->
        </div>
    </div>
@endsection