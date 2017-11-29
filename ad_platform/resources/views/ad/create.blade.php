@extends('dashboard_layout')
@section('content')
    <div class="container-fluid">
                <div class="animated fadeIn">
                  <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <strong>创建广告</strong>
                                </div>
                                <div class="card-block">
                                    <form id='ad_form' action="/ad/store" method="post" enctype="multipart/form-data" class="form-horizontal ">
                                        
                                        <div class="form-group row">
                                            <label class="col-md-3 form-control-label" for="text-input">广告名称</label>
                                            <div class="col-md-9">
                                                <input type="text" id="text-input" name="advertising_name" class="form-control" placeholder="广告名称">
                                                <span class="help-block">起一个好的广告名称能让你很好的记住它。</span>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group row">
                                            <label class="col-md-3 form-control-label" for="select">广告类型</label>
                                            <div class="col-md-9">
                                                <select id="select" name="advertising_type_id" class="form-control">
                                                    @foreach ($types as $type)
                                                    <option value="{{$type->advertising_type_id}}">{{$type->advertising_type_name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        
                                    </form>
                                </div>
                                <div class="card-footer">
                                    <button id="save" type="button" class="btn btn-sm btn-primary"><i class="fa fa-dot-circle-o"></i> 保存 </button>
                                </div>
                            </div>

                            
                        </div>
                        
                        <!--/.col-->
                    </div>
                    <!--/.row-->

                    <!--/.row-->

                    
                    </div>
                    <!--/.row-->
                </div>

            </div>
    <!-- /.conainer-fluid -->
@stop
@section('js')
<script type="text/javascript">
var WidgetBuilder,
WidgetBuilder = (function() {
	var oThis;
	function WidgetBuilder() {
	  oThis = this;
	  oThis.htmls = [];
	  oThis.widgetStyleClass = "attribute";
	  oThis.namePrefix = "attribute";
	}
	WidgetBuilder.prototype.render = function(items,callback) {
		for(i in items){
			oThis.addWidget(items[i]);
		}
		callback(oThis.htmls.join('')) && function(){};
	};
	WidgetBuilder.prototype.setWidgetStyleClass = function(styleClass) {
		oThis.widgetStyleClass = styleClass;
	};
	
	WidgetBuilder.prototype.addWidget = function(item) {
		var html;
		switch(item.type){
			case 0x1://text
				html = oThis.textBuilder(item);
				break;
			case 0x2://select
				html = oThis.selectBuilder(item);
				break;
			case 0x3://radio
				html = oThis.radioBuilder(item);
				break;
			case 0x4://file
				html = oThis.fileBuilder(item);
				break;
		}
		oThis.htmls = oThis.htmls.concat(html);
	};
	
	WidgetBuilder.prototype.textBuilder = function(item) {
		
		var html = [];
		html.push('<div class="form-group row '+ oThis.widgetStyleClass +'">');
		html.push('<label class="col-md-3 form-control-label" for="text_'+ item.name +'">'+ item.display_name +'</label>');
		html.push('<div class="col-md-9">');
		html.push('<input type="text" id="text_'+ item.name +'" name="'+ oThis.namePrefix +'['+ item.name +']" />');
		html.push('</div>');
		html.push('</div>');
		return html;
	};
	
	WidgetBuilder.prototype.clear = function() {

		if (jQuery) {
			// jQuery 已加载 
			console.log('jQuery load');
			$('.'+oThis.widgetStyleClass).remove();
		} else { 
			console.log('jQuery unload');
			// jQuery 未加载 
			eles = document.getElementsByClassName(oThis.widgetStyleClass);
			var parantNode = eles[0].parentNode;
			if(parantNode){
				for(i in eles){
					parantNode.removeChild(eles[i]);
				}
         	}
		} 

	};
	WidgetBuilder.prototype.selectBuilder = function(item) {
		var html = [];
		if(item.options_data=='DATA'){
			options = item.options;
		}else{
			options = [];
		}
		
		html.push('<div class="form-group row '+ oThis.widgetStyleClass +'">');
		html.push('<label class="col-md-3 form-control-label" for="select_'+ item.name +'">'+ item.display_name +'</label>');
		html.push('<div class="col-md-9">');
		html.push('<select id="select_'+ item.name +'" name="'+ oThis.namePrefix +'['+ item.name +']">');
		for(i in options){
			html.push('<option value="'+ i +'">'+ options[i] +'</option>');
		}
		html.push('</select>');
		html.push('</div>');
		html.push('</div>');
		return html;
	};

	WidgetBuilder.prototype.radioBuilder = function(item) {
		console.log(item);
		
		return [];
	};

	WidgetBuilder.prototype.fileBuilder = function(item) {
		
		var html = [];
		html.push('<div class="form-group row '+ oThis.widgetStyleClass +'">');
		html.push('<label class="col-md-3 form-control-label" for="file_'+ item.name +'">'+ item.display_name +'</label>');
		html.push('<div class="col-md-9">');
		html.push('<input type="file" id="file_'+ item.name +'" name="'+ oThis.namePrefix +'['+ item.name +']" />');
		html.push('</div>');
		html.push('</div>');
		return html;
	};
	
	return WidgetBuilder;
  })(),widgetBuilder = new WidgetBuilder();
</script>
<script type="text/javascript">
var ad_templates_json = {!! $ad_templates_json !!};
items = ad_templates_json['1'].FLOAT_ICON;

widgetBuilder.render(items,function(html){
	console.log('finnal');
	console.log(html);
	$('#ad_form').append(html);
});
$('#save').click(function(){
var formElement = document.getElementById("ad_form");

var formData = new FormData(formElement);

console.log(formData);
$.ajax({
     url: "{{url('ad/store')}}",
     headers: {
         'X-CSRF-TOKEN':'{{ csrf_token() }}'
     },
     type: 'POST',
     data: formData,
     dataType:'json',
     contentType: false,
     processData: false,
     success: function (result) {
            if(result.status==1){
                    swal({
                      title: "保存成功!",
                      text: "点击确定后跳转!",
                      icon: "success",
                      button: "确定!",
                    }).then((willDelete) => {
                       window.location.href = "{{url('ad/list')}}";
                    });
            }else{

                swal({
                      title: "保存失败!",
                      text: "请联系相关技术人员!",
                      icon: "error",
                      button: "确定!",
                    });

            }
            
     },
     error: function (returndata) {

     }
    });	
});
</script>
@stop