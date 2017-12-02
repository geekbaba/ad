@extends('dashboard_layout')
@section('content')
            <div class="container-fluid">
                <div class="animated fadeIn">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <i class="fa fa-align-justify"></i> 活动列表
                                </div>
                                <div class="card-block">
                                    <table class="table table-bordered table-striped table-condensed">
                                        <thead>
                                            <tr>
                                                <th>活动编码</th>
                                                <th>活动名称</th>
                                                <th>状态</th>
                                                <th>创建时间</th>
                                                <th>操作</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($activitys as $activity)
                                        	<tr>
                                                <td>{{ $activity->activity_id }}</td>
                                                <td>{{ $activity->activity_name }}</td>
                                                <td>{{ $activity->status }}</td>
                                                <td>{!! $activity->created_at !!}</td>
                                                <td>
                                                    <a href="/activity/edit/{{$activity->activity_id}}"><span class="badge badge-success">编辑</span></a>
                                                    <a href="/skin/create/{{$activity->activity_id}}"><span class="badge badge-success">添加皮肤</span></a>
                                                    <a href="/skin/list/{{$activity->activity_id}}"><span class="badge badge-success">皮肤列表</span></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                            
                                        </tbody>
                                    </table>
                                    <nav>
                                        {{ $activitys->links() }}
                                    </nav>
                                </div>
                            </div>
                        </div>
                        <!--/.col-->
                    </div>
                    <!--/.row-->
                </div>


            </div>
            <!-- /.conainer-fluid -->
    @stop