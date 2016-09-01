schoolView = (function() {
    var areaInfo = [
        ["安徽省","合肥市|芜湖市|安庆市|巢湖市|亳州市|六安市|宣城市|宿州市|池州市|淮北市|淮南市|滁州市|蚌埠市|铜陵市|阜阳市|马鞍山市|黄山市"],
        ["北京市","市辖区|县"],
        ["天津市","市辖区|县"],
        ["河北省","石家庄市|保定市|唐山市|廊坊市|张家口市|承德市|沧州市|秦皇岛市|衡水市|邢台市|邯郸市"],
        ["山西省","太原市|大同市|临汾市|吕梁市|忻州市|晋中市|晋城市|朔州市|运城市|长治市|阳泉市"],
        ["内蒙古自治区","呼和浩特市|包头市|赤峰市|呼伦贝尔市|乌兰察布市|通辽市|乌海市|兴安盟|巴彦淖尔市|鄂尔多斯市|锡林郭勒盟|阿拉善盟"],
        ["辽宁省","沈阳市|大连市|葫芦岛市|丹东市|抚顺市|朝阳市|本溪市|盘锦市|营口市|辽阳市|铁岭市|锦州市|阜新市|鞍山市"],
        ["吉林省","长春市|吉林市|通化市|四平市|松原市|白城市|白山市|辽源市|延边朝鲜族自治州"],
        ["黑龙江省","哈尔滨市|大庆市|佳木斯市|鹤岗市|七台河市|伊春市|双鸭山市|牡丹江市|绥化市|鸡西市|黑河市|齐齐哈尔市|大兴安岭地区"],
        ["上海市","市辖区|县"],
        ["江苏省","南京市|苏州市|南通市|宿迁市|常州市|徐州市|扬州市|无锡市|泰州市|淮安市|盐城市|连云港市|镇江市"],
        ["浙江省","杭州市|宁波市|绍兴市|温州市|台州市|嘉兴市|丽水市|湖州市|舟山市|衢州市|金华市"],
        ["福建省","福州市|厦门市|泉州市|漳州市|三明市|南平市|宁德市|莆田市|龙岩市"],
        ["江西省","南昌市|九江市|抚州市|赣州市|上饶市|吉安市|宜春市|新余市|景德镇市|萍乡市|鹰潭市"],
        ["山东省","济南市|青岛市|威海市|泰安市|德州市|日照市|枣庄市|济宁市|淄博市|滨州市|潍坊市|烟台市|聊城市|莱芜市|菏泽市|东营市|临沂市"],
        ["河南省","郑州市|洛阳市|濮阳市|安阳市|三门峡市|信阳市|南阳市|周口市|商丘市|平顶山市|开封市|新乡市|济源市|漯河市|焦作市|许昌市|驻马店市|鹤壁市"],
        ["湖北省","武汉市|荆州市|荆门市|襄樊市|十堰市|咸宁市|孝感市|宜昌市|恩施土家族苗族自治州|鄂州市|随州市|黄冈市|黄石市"],
        ["湖南省","长沙市|株洲市|湘潭市|娄底市|岳阳市|常德市|张家界市|怀化市|永州市|湘西土家族苗族自治州|益阳市|衡阳市|邵阳市|郴州市"],
        ["广东省","广州市|深圳市|茂名市|云浮市|佛山市|惠州市|揭阳市|梅州市|汕头市|汕尾市|江门市|河源市|清远市|湛江市|潮州市|珠海市|肇庆市|阳江市|韶关市"],
        ["广西壮族自治区","南宁市|桂林市|北海市|柳州市|玉林市|崇左市|来宾市|梧州市|河池市|百色市|贵港市|贺州市|钦州市|防城港市"],
        ["海南省","海口市|三亚市|省直辖县级行政单位"],
        ["重庆市","市辖区|县"],
        ["四川省","成都市|绵阳市|乐山市|德阳市|内江市|南充市|宜宾市|巴中市|广元市|广安市|攀枝花市|泸州市|眉山市|自贡市|资阳市|达州市|遂宁市|雅安市|甘孜藏族自治州|凉山彝族自治州|阿坝藏族羌族自治州"],
        ["贵州省","贵阳市|遵义市|六盘水市|安顺市|毕节地区|铜仁地区|黔东南苗族侗族自治州|黔南布依族苗族自治州|黔西南布依族苗族自治州"],
        ["云南省","昆明市|玉溪市|丽江市|保山市|临沧市|思茅市|曲靖市|大理白族自治州|德宏傣族景颇族自治州|怒江傈僳族自治州|迪庆藏族自治州|文山壮族苗族自治州|昭通市|楚雄彝族自治州|红河哈尼族彝族自治州|西双版纳傣族自治州"],
        ["西藏自治区","拉萨市|日喀则地区|昌都地区|林芝地区|阿里地区|那曲地区"],
        ["陕西省","西安市|咸阳市|宝鸡市|榆林市|汉中市|延安市|渭南市|铜川市|商洛市|安康市"],
        ["甘肃省","兰州市|天水市|张掖市|武威市|白银市|酒泉市|定西市|平凉市|庆阳市|金昌市|陇南市|临夏回族自治州|甘南藏族自治州"],
        ["青海省","西宁市|果洛藏族自治州|海东地区|海北藏族自治州|海南藏族自治州|海西蒙古族藏族自治州|玉树藏族自治州|黄南藏族自治州"],
        ["宁夏回族自治区","银川市|中卫市|吴忠市|固原市|石嘴山市"],
        ["新疆维吾尔自治区","乌鲁木齐市|克拉玛依市|吐鲁番地区|塔城地区|喀什地区|伊犁哈萨克自治州|巴音郭楞蒙古自治州|昌吉回族自治州|阿克苏地区|阿勒泰地区|克孜勒苏柯尔克孜自治州|博尔塔拉蒙古自治州|和田地区|哈密地区"]
    ];
    Backbone.emulateHTTP = true;
    var schoolView = Backbone.View.extend({
        el : '#j_schoolpanel',
        events : {
            "click .j_provice a" : "renderCity",
            "click .j_city a" : "renderSubdistrict",
            "click .j_subdistrict a" : "renderSchool",
            "click .j_school a" : "chooseSchool",
            "keyup #j_searchName" : "changeSchools",
            "click .j_inputSchoolName" : 'inputSchoolName',
            "click .j_sure" : 'SureAboutInput',
            "click .j_chooseAgain" : "GoBackToSchoolList"
        },
        initialize : function() {
            this.provinceName = "";
            this.cityName = "";
            this.subdistrictName = "";
            this.schoolName = "";
            this.areaid = "";
            this.searchDom = $(".j_search").html();
            this.proviceCollection = null;
            this.cityCollection = new Backbone.Collection;
            this.subdistrict = new Backbone.Collection;
            this.schoolCollection = new Backbone.Collection;

            this.subdistrict.on('display', this.displaySub, this);
            this.schoolCollection.on('display', this.displaySchool, this);

            this.initProvinceData();
            this.renderProvince();

        },

        initProvinceData : function() {
            var provices = [];
            for(var i = 0, dataLength = areaInfo.length; i < dataLength; i ++) {
                provices.push({name : areaInfo[i][0]});
            }

            this.proviceCollection = new Backbone.Collection(provices);
        },

        renderProvince : function() {
            $(".j_provice").html("");
            var proviceHtml = "";
            _.each(this.proviceCollection.models, function(p, index) {
                proviceHtml += '<a alt-value="' + p.get("name") + '" href="javascript:;"' + (p.get("name") == provinceName? 'class="current"' : '') + '>' + p.get("name") + '</a>';
            });
            $(".j_provice").html(proviceHtml);
            this.renderCity();
        },

        renderCity : function(e) {
            e && e.preventDefault();
            var province = e && $(e.currentTarget).attr("alt-value") ? $(e.currentTarget).attr("alt-value") : provinceName; //provinceName 服务器端输出在页面上
            if(e && e.currentTarget) {
                $(e.currentTarget).addClass("current").siblings().removeClass("current");
            }
            var that = this;
            var data = [];

            if (province == "") {
                $(".j_city").html("请选择省份");
                $(".j_subdistrict").html("请选择省份");
                $(".j_search").html("请选择省份");
                $(".j_school").html("");
                return false;
            } else {
                $(".j_search").html(this.searchDom);
            }
            this.provinceName = province;
            if (typeof province == "number") {
                data = areaInfo[province];
                this.provinceName = data[0];
            }

            if (typeof province == "string") {
                _.each(areaInfo, function(d) {
                    if (d[0] == province) {
                        data = d;
                    }
                })
            }

            that.cityCollection.reset([]);
            _.each(data[1].split("|"), function(city) {
                that.cityCollection.add({name : city});
            });

            $(".j_city").html("");
            var cityHtml = "";
            _.each(this.cityCollection.models, function(city, index) {
                var isCur = (city.get("name") == districtName) ;
                cityHtml += '<a alt-value="' + city.get("name") + '" href="javascript:;" ' + (isCur ? 'class="current"' : '') + '>' + city.get("name") + '</a>';
            });
            $(".j_city").html(cityHtml);
            this.renderSubdistrict(false, true);

        },

        renderSubdistrict : function(e, isClick) {
            e && e.preventDefault();
            var that = this;
            this.cityName = e && $(e.currentTarget).attr('alt-value') ? $(e.currentTarget).attr('alt-value') : (isClick === true ? "" : districtName);
            //this.cityName = _.indexOf(['北京', '天津', '上海', '重庆'], this.provinceName) >= 0 ? this.provinceName : this.cityName;
            if(!this.cityName){this.cityName = "市辖区"};
            if(e && e.currentTarget) {
                $(e.currentTarget).addClass("current").siblings().removeClass("current");
            }

            if (this.cityName == "") {
                $(".j_subdistrict").html("请选择城市");
                $(".j_search").html("请选择城市");
                $(".j_school").html("");
                return false;
            } else {
                $(".j_search").html(this.searchDom);
            }
            var param ="province=" + encodeURIComponent(this.provinceName) + "&city=" + encodeURIComponent(this.cityName);
            this._request(param, function(response) {
                if (!response) {
                    alert("请求异常!");
                    return false;
                }
                that.subdistrict.reset(response);
                that.subdistrict.trigger('display', that);
            });
        },

        displaySub : function() {
            var that = this;
            $('.j_subdistrict').html("");
            var subdistrictHtml = "";
            _.each(this.subdistrict.models, function(district, index) {
                subdistrictHtml += '<a href="javascript:;" alt-value="' + district.get("districtname") + '" alt-id="' + district.get("id") + '">' + district.get("districtname") + '</a>';
            });
            $(".j_subdistrict").html(subdistrictHtml);

            this.renderSchool();
        },

        renderSchool : function(e) {
            e && e.preventDefault();
            var that = this;
            this.subdistrictName = e && $(e.currentTarget).attr('alt-value') ? $(e.currentTarget).attr('alt-value') : "";

            if (this.subdistrictName == "") {
                $(".j_search").html("请选择区/县");
                $(".j_school").html("");
                return false;
            } else {
                $(".j_search").html(this.searchDom);
                $(".j_school").html('<div class="textcenter f666"><img src="' + etWebSiteUrl + '/images/common/icon_loading.gif" alt="正在加载"> 正在努力加载学校信息，请稍候</div>');
            }
            //设置搜索范围的区名称
            $(".j_search b").html(this.subdistrictName);
            $(".j_input b").html(this.subdistrictName);
            if(e && e.currentTarget) {
                $(e.currentTarget).addClass("current").siblings().removeClass("current");
            }

            if (this.subdistrictName === "") {
                return;
            }
            var param = "areaid=" + encodeURIComponent($(e.currentTarget).attr('alt-id') );
            this.areaid = $(e.currentTarget).attr('alt-id'); 
            $.ajax({
                url :  "https://xue.hfjy.com/markposition/findarea/markposition/findschool/",
                data : param,
                type : 'post',
                dataType : 'json',
                success : function(response){
                	if (!response) {
                        alert("请求异常");
                        return false;
                    }
                    that.schoolCollection.reset(response);
                    that.schoolCollection.trigger('display', that);
                },
                error : function() {
                  $(".j_school").html('<div class="schoolMsg textcenter f666 fn-link-blue"><img src="' + etWebSiteUrl + '/images/register/error_bg.png" width="20" height="20">请检查网络连接，或点击 <a href="javascript:void(0);" onclick="javascript:window.location.reload();">刷新</a> 后再试。</div>');
                }
            })

        },

        displaySchool : function(e, models) {
            $('.j_school').html("");
            var data = models ? models : this.schoolCollection.models;
            var schoolListHtml = "";
            _.each(data, function(school) {
              schoolListHtml += "<a href='javascript:;' alt-value='" + school.get('districtname') + "' ' alt-id='" + school.get('id') + "' > " + school.get('districtname') + " </a>";
            });
            $('.j_school').html('<div class="schoolList">' + schoolListHtml + '</div>');
            //this.chooseSchool();
            this.displayEllipsis(".j_school a", 18, 1);
        },
        displayEllipsis : function(element, maxchars, isvisibility){
        	var displayItem = $(element);
        	displayItem.each(function(){
        		var _this = this;
        		var textCon = $(_this).html();
        		if($(_this).text().length > maxchars){
        			$(_this).text($(_this).text().substring(0, maxchars - 2));
        			$(_this).html($(_this).html() + "…");
                    if(isvisibility != undefined && isvisibility == 1){
                        $(_this).css({"cursor": "pointer", "visibility": "visible"});
                    }
                    else {
                        $(_this).css({"cursor": "pointer", "display": "block"});
                    }
        			var x = 10;
        			var y = 20;
        			$(_this).mouseover(function(e){
        				var tooltip = "<div id='tooltip'>"+ textCon +"</div>"; //创建 div 元素
        				$("body").append(tooltip);
        				$("#tooltip")
        					.css({
        						"top": (e.pageY+y) + "px",
        						"left": (e.pageX+x) - 60  + "px",
        						"z-index": 99999
        					}).show("fast");
        			}).mouseout(function(){
        				$("#tooltip").remove();
        			}).mousemove(function(e){
        				$("#tooltip")
        					.css({
        						"top": (e.pageY+y) + "px",
        						"left": (e.pageX+x) - 60  + "px",
        						"z-index": 99999
        					});
        			});
        		}
        		else{
        			$(_this).css({"display": "block"});
        		}
        	});
        },

        _request : function(data, callback) {
            $.ajax({
                url :  "https://xue.hfjy.com/markposition/findarea/markposition/findarea/",
                data : data,
                type : 'post',
                dataType : 'json',
                success : callback,
                error : function() {
                  $(".j_school").html('<div class="schoolMsg textcenter f666 fn-link-blue"><img src="' + etWebSiteUrl + '/images/register/error_bg.png" width="20" height="20">请检查网络连接，或点击 <a href="javascript:void(0);" onclick="javascript:window.location.reload();">刷新</a> 后再试。</div>');
                }
            })
        },
        chooseSchool : function(e, myschool) {
            e && e.preventDefault();
            this.schoolName = e && $(e.currentTarget).attr('alt-value') ? $(e.currentTarget).attr('alt-value') : myschool;
            $("#iprovince").val(this.provinceName);
            $("#idistrict").val(this.cityName);
            $("#isubdistrict").val(this.subdistrictName);
            $("#ischool").val(this.schoolName);
            $("#school").val(this.schoolName).removeClass("f999");
            $("#areaid").val(this.areaid);
            if(e){
            	   $("#schoolId").val($(e.currentTarget).attr('alt-id'));
            }else{
            	$("#schoolId").val("");
            }
            box_clearDiv();
        },

        changeSchools : function(e) {
            var inputText = $(e.currentTarget).val();
            var searchCollection = this.schoolCollection.clone();
            var modelArray = _.filter(this.schoolCollection.models, function(school) {
                return school.get('districtname').indexOf(inputText) >= 0;
            });
            searchCollection.reset(modelArray);
            this.displaySchool(null, searchCollection.models);
        },

        inputSchoolName : function () {
            //切换 输入 学校名称的 输入框
            $(".j_search").removeClass('fn-hide').addClass('fn-hide');
            $(".j_school").removeClass('fn-hide').addClass('fn-hide');
            $(".j_input").removeClass('fn-hide');
        },

        SureAboutInput : function(e) {
            var mySchool = $("#j_inputSchoolName").val();
            if (!mySchool) {
                alert("请输入您的学校名称！");
                return false;
            }

            this.chooseSchool(null, mySchool);
        },

        GoBackToSchoolList : function() {
            $(".j_search").removeClass('fn-hide');
            $(".j_school").removeClass('fn-hide')
            $(".j_input").removeClass('fn-hide').addClass('fn-hide');
        }
    });

    return schoolView;
})();