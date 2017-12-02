window.WidgetBuilder,
WidgetBuilder = (function() {
	var oThis;
	function WidgetBuilder() {
	  oThis = this;
	  oThis.htmls = [];
	  oThis.widgetStyleClass = "attribute";
	  oThis.namePrefix = "attribute";
	  oThis.attribute;
	}
	WidgetBuilder.prototype.render = function(items,callback) {
		
		oThis.attribute = arguments[2]?arguments[2]:[];
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
			case 0x5://file
				html = oThis.imageBuilder(item);
				break;
				
		}
		oThis.htmls = oThis.htmls.concat(html);
	};
	
	WidgetBuilder.prototype.textBuilder = function(item) {
		
		var html = [];
		var value = oThis.attribute[item.name] ? oThis.attribute[item.name] : '';
		html.push('<div class="form-group row '+ oThis.widgetStyleClass +'">');
		html.push('<label class="col-md-3 form-control-label" for="text_'+ item.name +'">'+ item.display_name +'</label>');
		html.push('<div class="col-md-9">');
		html.push('<input type="text" id="text_'+ item.name +'" name="'+ oThis.namePrefix +'['+ item.name +']" value="'+value+'" />');
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
		var value = oThis.attribute[item.name] ? oThis.attribute[item.name] : '';
		html.push('<div class="form-group row '+ oThis.widgetStyleClass +'">');
		html.push('<label class="col-md-3 form-control-label" for="select_'+ item.name +'">'+ item.display_name +'</label>');
		html.push('<div class="col-md-9">');
		html.push('<select id="select_'+ item.name +'" name="'+ oThis.namePrefix +'['+ item.name +']">');
		for(i in options){
			if(i==value){
				html.push('<option selected value="'+ i +'">'+ options[i] +'</option>');
			}else{
				html.push('<option value="'+ i +'">'+ options[i] +'</option>');
			}
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
		var value = oThis.attribute[item.name] ? oThis.attribute[item.name] : '';
		var html = [];
		if(value!=''){
			html.push('<div class="form-group row '+ oThis.widgetStyleClass +'">');
			html.push('<label class="col-md-3 form-control-label" for="file_'+ item.name +'">'+ item.display_name +'</label>');
			html.push('<div class="col-md-9">');
			html.push('<img style="width:50px;height:50px;" id="file_'+ item.name +'" src="/' + value + '" />');
			html.push('</div>');
			html.push('</div>');
		}else{
			html.push('<div class="form-group row '+ oThis.widgetStyleClass +'">');
			html.push('<label class="col-md-3 form-control-label" for="file_'+ item.name +'">'+ item.display_name +'</label>');
			html.push('<div class="col-md-9">');
			html.push('<input type="file" id="file_'+ item.name +'" name="'+ oThis.namePrefix +'['+ item.name +']" />');
			html.push('</div>');
			html.push('</div>');
		}
		
		return html;
	};

	WidgetBuilder.prototype.imageBuilder = function(item) {
		var value = oThis.attribute[item.name] ? oThis.attribute[item.name] : '';
		var html = [];
		if(value!=''){
			html.push('<div class="form-group row '+ oThis.widgetStyleClass +'">');
			html.push('<label class="col-md-3 form-control-label" for="file_'+ item.name +'">'+ item.display_name +'</label>');
			html.push('<div class="col-md-9">');
			html.push('<img style="width:50px;height:50px;" id="file_'+ item.name +'" src="/' + value + '" />');
			html.push('</div>');
			html.push('</div>');
		}else{
			html.push('<div class="form-group row '+ oThis.widgetStyleClass +'">');
			html.push('<label class="col-md-3 form-control-label" for="file_'+ item.name +'">'+ item.display_name +'</label>');
			html.push('<div class="col-md-9">');
			html.push('<input type="file" id="file_'+ item.name +'" name="'+ oThis.namePrefix +'['+ item.name +']" />');
			html.push('</div>');
			html.push('</div>');
		}
		
		return html;
	};
	
	return WidgetBuilder;
  })();