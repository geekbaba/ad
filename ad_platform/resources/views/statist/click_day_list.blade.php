@extends('dashboard_layout')
@section('content')
            <div class="container-fluid">
                <div class="animated fadeIn">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <i class="fa fa-align-justify"></i> {{$title}}（天）
                                </div>
                                <div class="card-block">
                                    <table class="table table-bordered table-striped table-condensed">
                                        <thead>
                                            <tr>
                                                <th>日期</th>
                                                <th>原链接</th>
                                                <th>短链接</th>
                                                <th>点击次数</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($list as $item)
                                        	<tr>
                                                <td>{{ $item->request_day }}</td>
                                                <td>{{ $namemap[$item->shorturl] }}</td>
                                                <td>{{ $item->shorturl }}</td>
                                                <td>{{ $item->count }}</td>
                                            </tr>
                                        @endforeach
                                            
                                        </tbody>
                                    </table>
                                    <nav>
                                        {{ $list->links() }}
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