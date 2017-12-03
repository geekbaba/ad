@extends('dashboard_layout')
@section('content')
            <div class="container-fluid">
                <div class="animated fadeIn">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <i class="fa fa-align-justify"></i> 产品列表
                                </div>
                                <div class="card-block">
                                    <table class="table table-bordered table-striped table-condensed">
                                        <thead>
                                            <tr>
                                                <th>产品编号</th>
                                                <th>产品名称</th>
                                                <th>状态</th>
                                                <th>创建时间</th>
                                                <th>操作</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($activity_products as $product)
                                        	<tr>
                                                <td>{{ $product->activity_product_id }}</td>
                                                <td>{{ $product->activity_product_name }}</td>
                                                <td>{{ $product->status }}</td>
                                                <td>{!! $product->created_at !!}</td>
                                                <td>
                                                    <a href="/product/edit/{{$product->activity_product_id}}"><span class="badge badge-success">编辑</span></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                            
                                        </tbody>
                                    </table>
                                    <nav>
                                        {{ $activity_products->links() }}
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