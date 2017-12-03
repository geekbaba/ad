(function(){
	
	
	
	var VERSION = "0.0.1"
		,_v = VERSION
		,_length = "length"
		,_o_window = window
		,_str_window = "window"
		,_location = "location"
		,emptyFunction = function(){}
		,_str_document = "document"
		,_true = true
		,_false = false
		,_protocol = "protocol"
		,_substring = "substring"
		,_str_indexOf = "indexOf"
		,_push = "push"
		,Q = 'q'
		,_replace = "replace"
		/**
		 * 添加监听事件。
		 * @param element {Element} 注册方法的对象。
		 * @param type {String} 要注册方法的事件。
		 * @param listener {Function} 面加载完毕的回调方法。
		 * @param useCapture {Boolean} 
		 */
		,AddListener = function(element, type, listener, useCapture){
			if(element.addEventListener){
				element.addEventListener(type, listener, !!useCapture);
			}else{
				element.attachEvent && element.attachEvent("on" + type, listener);
			}
		};
		
		/** 
	     * 插件部分代码
		 */
		  
		 
		var qa = function (a) {
			return void 0 != a && -1 < (a.constructor + "")[_str_indexOf]("String")
		}, sa = function (a) {
			return a ? a[_replace](/^[\s\xa0]+|[\s\xa0]+$/g, "") : ""
		};
		var gb = qa(_o_window.AnalyticsObject) && sa(_o_window.AnalyticsObject) || "CA";
		/**
		 * 全局工具对象。
		 * @param win {Window} 窗口对象。
		 * @param doc {Document} 文档对象。
		 */
		var Global = function(win, doc){
				var oThis = this;
				oThis.window = win;
				oThis.document = doc;

				/**
				 * 定时执行指定的回调函数。
				 * @param callback {Function} 需要执行的回调函数。
				 * @param delay {Int} 延时的间隔（以毫秒计）。
				 */
				oThis.setTimeout = function(callback, delay){
					setTimeout(callback, delay);
				};
				
				/**
				 * 用户代理头的字符串表示(就是包括浏览器版本信息等的字符串)是否包含指定的字符串。
				 * @param key {String} 指定的字符串。
				 * @return {Boolean} 是否包含。
				 */
				oThis.contains = function(key){
					return navigator.userAgent[_str_indexOf](key) >= 0;
				};

				/**
				 * 判断浏览器是否是Firefox浏览器。
				 * @return {Boolean} 是否是Firefox浏览器。
				 */
				oThis.isFirefox = function(){
					return oThis.contains("Firefox") && ![].reduce;
				};

				/**
				 * 处理网页来源页面的URL地址。
				 * @return {String} 处理过的URL地址。
				 */
				oThis.processSource = function(source){
					if(!source || !oThis.contains("Firefox")){
						return source;
					}
					source = source.replace(/\n|\r/g, " ");
					for(var i = 0, len = source[_length]; i < len; ++i){
						var charCode = source.charCodeAt(i)&255;
						if(charCode == 10 || charCode == 13){
							source = source[_substring](0, i) + "?" + source[_substring](i + 1);
						}
					}
					return source;
				}
			}

        /**
         * 全局工具对象实例。
         */
        ,$Global = new Global(_o_window, document)
	,analytics_domain = "http:" == $Global[_str_document][_location][_protocol] ? "{{$ssl_analytics_server}}" : "{{$analytics_server}}"
        ,analytics_path = analytics_domain + "p/ga.gif";
		
		
        /**
         * 用于向服务器发出请求的对象。
         */
        var Ajax = function(){
            var oThis = this;

            /**
             * 发送请求。
             * @param url {String} 发送请求的地址。
             * @param param {String} 发送请求的参数串。
             * @param mark {String} 请求的标识（包括版本号、随机整数ID、UA账号、域名哈希值）。
             * @param callback {Function} 回调函数。
             * @param _ioo {Boolean}
             */
            oThis.send = function(url, param, mark, callback, _ioo){
                if(param[_length] <= 2036 || _ioo){
                    oThis.sendByImage(url + "?" + param, callback);
                }else if(param[_length] <= 8192){
                    $Global.isFirefox() ? oThis.sendByImage(url + "?" + mark + "&err=ff2post&len=" + param[_length], callback) : oThis.Send(param, callback);
                }else{
                    oThis.sendByImage(url + "?" + mark + "&err=len&max=8192&len=" + param[_length], callback);
                }
            };

            /**
             * 使用图片对象发出请求。
             * @param src {String} 组装完毕的图片的地址。
             * @param callback {Function} 回调函数。
             */
            oThis.sendByImage = function(src, callback){
                var image = new Image(1, 1);
                image.src = src;
                image.onload = function(){
                    image.onload = null;
                    (callback || emptyFunction)()
                }
            };

            /**
             * 根据情况使用XMLHttpRequest或iframe对象发出请求。
             * @param param {String} 发送请求的参数串。
             * @param callback {Function} 回调函数。
             */
            oThis.Send = function(param, callback){
                oThis.sendByRequest(param, callback) || oThis.sendByIFrame(param, callback)
            };

            /**
             * 使用XMLHttpRequest对象发出请求。
             * @param param {String} 发送请求的参数串。
             * @param callback {Function} 回调函数。
             */
            oThis.sendByRequest = function(param, callback){
                var request,
                    Request = $Global[_str_window].XDomainRequest;
                if(Request){
                    request = new Request;
                    request.open("POST", analytics_path);
                }else if(Request = $Global[_str_window].XMLHttpRequest){
                    Request = new Request;
                    if("withCredentials"in Request){
                        request = Request;
                        request.open("POST", analytics_path, _true);
                        request.setRequestHeader("Content-Type", "text/plain");
                    }
                }
                if(request){
                    request.onreadystatechange = function(){
                        if(request.readyState == 4){
                            callback && callback();
                            request = null;
                        }
                    };
                    request.send(param);
                    return _true;
                }
                return _false;
            };

            /**
             * 使用iframe对象发出请求。
             * @param param {String} 发送请求的参数串。
             * @param callback {Function} 回调函数。
             */
            oThis.sendByIFrame = function(param, callback){
                var doc = $Global[_str_document];
                if(doc.body){
                    param = _encodeURI(param);
                    try{
                        var fra = doc.createElement('<iframe name="' + param + '"></iframe>');
                    }catch(ex){
                        fra = doc.createElement("iframe");
                        fra.name = param;
                    }
                    fra.height = "0";
                    fra.width = "0";
                    fra.style.display = "none";
                    fra.style.visibility = "hidden";
                    var _loca = doc[_location];
                    _loca = _loca[_protocol] + "//" + _loca.host + "/favicon.ico";
                    _loca = analytics_domain + "u/post_iframe.html#" + _encodeURI(_loca);
                    var setFra = function(){
                        fra.src = "";
                        fra.parentNode && fra.parentNode.removeChild(fra);
                    };

                    AddListener($Global[_str_window], "beforeunload", setFra);
                    var succes = _false,
                        i = 0,
                        fraLoad = function(){
                            if(!succes){
                                try{
                                    if(i > 9 || fra.contentWindow[_location].host == doc[_location].host){
                                        succes = _true;
                                        setFra();
                                        var win = $Global[_str_window],
                                            _beforeunload = "beforeunload",
                                            _setFra = setFra;
                                        if(win.removeEventListener){
                                            win.removeEventListener(_beforeunload, _setFra, _false); }
                                        else{
                                            win.detachEvent && win.detachEvent("on" + _beforeunload, _setFra);
                                        }
                                        callback && callback();
                                        return
                                    }
                                }catch(ex){}
                                i++;
                                $Global.setTimeout(fraLoad, 200)
                            }
                        };
                    AddListener(fra, "load", fraLoad);
                    doc.body.appendChild(fra);
                    fra.src = _loca;
                }else{
                    $Global.setTimeout(function(){
                            oThis.sendByIFrame(param, callback);
                        }, 100)
                }
            }
        },ajax=new Ajax();
		
		var getCode = function(ads, width, height) {
		//width -> b
		//height->c
			var d = void 0 === d ? "" : d;
			var iframeElement = ["<iframe"];
			iframeElement.push("src = ");
			iframeElement.push('"'+ ads.ad_server + slot +'"');
			iframeElement.push('style="' + ("left:0;position:absolute;top:0;border:none;width:" + ads.width + "px;height:" + ads.height + "px;") + '"');
			iframeElement.push("></iframe>");
			adsp_id = ads.adsp_id;
			height = "border:none;height:" + ads.height + "px;margin:0;padding:0;position:relative;visibility:visible;width:" + ads.width + "px;background-color:transparent;";
			return ['<ins id="', adsp_id + "_expand", '" style="display:inline-table;', ads.height, void 0 === d ? "" : d, '"><ins id="', adsp_id + "_anchor", '" style="display:block;', ads.height, '">', iframeElement.join(" "), "</ins></ins>"].join("")
	};


	try{
		for(i in _o_window[gb].q){
	
			var args = Array.prototype.slice.call(_o_window[gb].q[i]);   
			var to,obc = args.shift(),fn= args.shift();
				console.log(_o_window[obc]);
			   _o_window[obc][fn].apply(to,args);
		};
	}catch(e){
		console.log("error");
	}

	elm = _o_window[_str_document].getElementsByClassName('adsbygoojo');
	
	console.log(elm);

	slot = elm[0].getAttribute('goojoad-slot');
	ad_client = elm[0].getAttribute('goojoad-ad-client');
	
	text = getCode({!!$adspace!!},slot,ad_client);
	fullDocument = _o_window[_str_document];
	//	fullDocument.write(text);
	console.log(text);
	elm[0].innerHTML = text;
	//elm.appendChild(fullDocument);

		
})();
