<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<title>mainpage</title>
		<meta name="description" content="overview & stats" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<!-- basic styles -->
		<link href="admin/css/bootstrap.min.css" rel="stylesheet" />
		<link href="admin/css/bootstrap-responsive.min.css" rel="stylesheet" />
		<link rel="stylesheet" href="admin/css/font-awesome.min.css" />
		<!--[if IE 7]>
		<link rel="stylesheet" href="admin/css/font-awesome-ie7.min.css" />
		<![endif]-->
		<!-- page specific plugin styles -->
		<!-- ace styles -->
		<link rel="stylesheet" href="admin/css/ace.min.css" />
		<link rel="stylesheet" href="admin/css/ace-responsive.min.css" />
		<link rel="stylesheet" href="admin/css/ace-skins.min.css" />
		<!--[if lt IE 9]>
		  <link rel="stylesheet" href="admin/css/ace-ie.min.css" />
		<![endif]-->
	</head>
	<body>
	{{--sidebar position--}}
		<div id="main-content" class="clearfix">
			<div id="breadcrumbs">
				<ul class="breadcrumb">
					<li><i class="icon-home"></i> <a href="#">Home</a><span class="divider"><i class="icon-angle-right"></i></span></li>
					<li class="active">Dashboard</li>
				</ul><!--.breadcrumb-->
				<div id="nav-search">
					<form class="form-search">
						<span class="input-icon">
							<input autocomplete="off" id="nav-search-input" type="text" class="input-small search-query" placeholder="Search ..." />
							<i id="nav-search-icon" class="icon-search"></i>
						</span>
					</form>
				</div><!--#nav-search-->
			</div><!--#breadcrumbs-->
			<div id="page-content" class="clearfix">
			<div class="page-header position-relative">
				<h1>Dashboard <small><i class="icon-double-angle-right"></i> overview & stats</small></h1>
			</div><!--/page-header-->
			<div class="row-fluid">
			<!-- PAGE CONTENT BEGINS HERE -->
			<div class="alert alert-block alert-success">
				 <button type="button" class="close" data-dismiss="alert"><i class="icon-remove"></i></button>
				 <i class="icon-ok green"></i> Welcome to <strong class="green">Ace <small>(v1)</small></strong>,
				 the lightweight, feature-rich, easy to use and well-documented admin template.
			</div>
			<div class="space-6"></div>
			<div class="span7 infobox-container">
				<div class="infobox infobox-green">
					<div class="infobox-icon"><i class="icon-comments"></i></div>
					<div class="infobox-data">
						<span class="infobox-data-number">32</span>
						<span class="infobox-content">comments + 2 reviews</span>
					</div>
					<div class="stat stat-success">8%</div>
				</div>
			</div>
			<div class="vspace"></div>
			<div class="span5">
				<div class="widget-box">
					<div class="widget-header widget-header-flat widget-header-small">
						<h5><i class="icon-signal"></i> Traffic Sources</h5>
						<div class="widget-toolbar no-border">
							<button class="btn btn-minier btn-primary dropdown-toggle" data-toggle="dropdown">This Week <i class="icon-angle-down icon-on-right"></i></button>
							<ul class="dropdown-menu dropdown-info pull-right dropdown-caret">
								<li class="active"><a href="#">This Week</a></li>
								<li><a href="#">Last Week</a></li>
								<li><a href="#">This Month</a></li>
								<li><a href="#">Last Month</a></li>
							</ul>
						</div>
					</div>
					<div class="widget-body">
						<div class="widget-main">
						<div id="piechart-placeholder"></div>
						<div class="hr hr8 hr-double"></div>
						<div class="clearfix">
							<div class="grid3">
								<span class="grey"><i class="icon-facebook-sign icon-2x blue"></i> &nbsp; likes</span>
								<h4 class="bigger pull-right">1,255</h4>
							</div>
							<div class="grid3">
								<span class="grey"><i class="icon-twitter-sign icon-2x purple"></i> &nbsp; tweets</span>
								<h4 class="bigger pull-right">941</h4>
							</div>
							<div class="grid3">
								<span class="grey"><i class="icon-pinterest-sign icon-2x red"></i> &nbsp; pins</span>
								<h4 class="bigger pull-right">1,050</h4>
							</div>
						</div>
						</div><!--/widget-main-->
					</div><!--/widget-body-->
				</div><!--/widget-box-->
			</div><!--/span-->
			<div id="ace-settings-container">
				<div class="btn btn-app btn-mini btn-warning" id="ace-settings-btn">
					<i class="icon-cog"></i>
				</div>
				<div id="ace-settings-box">
				</div>
				<div class="pull-left">
					<select id="skin-colorpicker" class="hidden">
						<option data-class="default" value="#438EB9">#438EB9</option>
						<option data-class="skin-1" value="#222A2D">#222A2D</option>
						<option data-class="skin-2" value="#C6487E">#C6487E</option>
						<option data-class="skin-3" value="#D0D0D0">#D0D0D0</option>
					</select>
				</div>
				<span>&nbsp; Choose Skin</span>
				</div>
				<div><input type="checkbox" class="ace-checkbox-2" id="ace-settings-header" /><label class="lbl" for="ace-settings-header"> Fixed Header</label></div>
				<div><input type="checkbox" class="ace-checkbox-2" id="ace-settings-sidebar" /><label class="lbl" for="ace-settings-sidebar"> Fixed Sidebar</label></div>
				</div>
			</div><!--/#ace-settings-container-->
		</div><!-- #main-content -->
		<a href="#" id="btn-scroll-up" class="btn btn-small btn-inverse">
			<i class="icon-double-angle-up icon-only"></i>
		</a>
		<!-- basic scripts -->
		<script src="admin/js/jquery-1.9.1.min.js"></script>
		<script type="text/javascript">
			window.jQuery || document.write("<script src='admin/js/jquery-1.9.1.min.js'>\x3C/script>");
		</script>
		<script src="admin/js/bootstrap.min.js"></script>
		<!-- page specific plugin scripts -->
		<!--[if lt IE 9]>
		<script type="text/javascript" src="admin/js/excanvas.min.js"></script>
		<![endif]-->
		<script type="text/javascript" src="admin/js/jquery-ui-1.10.2.custom.min.js"></script>
		<script type="text/javascript" src="admin/js/jquery.ui.touch-punch.min.js"></script>
		<script type="text/javascript" src="admin/js/jquery.slimscroll.min.js"></script>
		<script type="text/javascript" src="admin/js/jquery.easy-pie-chart.min.js"></script>
		<script type="text/javascript" src="admin/js/jquery.sparkline.min.js"></script>
		<script type="text/javascript" src="admin/js/jquery.flot.min.js"></script>
		<script type="text/javascript" src="admin/js/jquery.flot.pie.min.js"></script>
		<script type="text/javascript" src="admin/js/jquery.flot.resize.min.js"></script>
		<!-- ace scripts -->
		<script src="admin/js/ace-elements.min.js"></script>
		<script src="admin/js/ace.min.js"></script>
		<!-- inline scripts related to this page -->
		
		<script type="text/javascript">
		
$(function() {
	$('.dialogs,.comments').slimScroll({
        height: '300px'
    });

	$('#tasks').sortable();
	$('#tasks').disableSelection();
	$('#tasks input:checkbox').removeAttr('checked').on('click', function(){
		if(this.checked) $(this).closest('li').addClass('selected');
		else $(this).closest('li').removeClass('selected');
	});
	var oldie = $.browser.msie && $.browser.version < 9;
	$('.easy-pie-chart.percentage').each(function(){
		var $box = $(this).closest('.infobox');
		var barColor = $(this).data('color') || (!$box.hasClass('infobox-dark') ? $box.css('color') : 'rgba(255,255,255,0.95)');
		var trackColor = barColor == 'rgba(255,255,255,0.95)' ? 'rgba(255,255,255,0.25)' : '#E2E2E2';
		var size = parseInt($(this).data('size')) || 50;
		$(this).easyPieChart({
			barColor: barColor,
			trackColor: trackColor,
			scaleColor: false,
			lineCap: 'butt',
			lineWidth: parseInt(size/10),
			animate: oldie ? false : 1000,
			size: size
		});
	})
	$('.sparkline').each(function(){
		var $box = $(this).closest('.infobox');
		var barColor = !$box.hasClass('infobox-dark') ? $box.css('color') : '#FFF';
		$(this).sparkline('html', {tagValuesAttribute:'data-values', type: 'bar', barColor: barColor , chartRangeMin:$(this).data('min') || 0} );
	});


  var data = [
	{ label: "social networks",  data: 38.7, color: "#68BC31"},
	{ label: "search engines",  data: 24.5, color: "#2091CF"},
	{ label: "ad campaings",  data: 8.2, color: "#AF4E96"},
	{ label: "direct traffic",  data: 18.6, color: "#DA5430"},
	{ label: "other",  data: 10, color: "#FEE074"}
  ];
 var placeholder = $('#piechart-placeholder').css({'width':'90%' , 'min-height':'150px'});
 $.plot(placeholder, data, {

	series: {
        pie: {
            show: true,
			tilt:0.8,
			highlight: {
				opacity: 0.25
			},
			stroke: {
				color: '#fff',
				width: 2
			},
			startAngle: 2

        }
    },
    legend: {
        show: true,
		position: "ne",
	    labelBoxBorderColor: null,
		margin:[-30,15]
    }
	,
	grid: {
		hoverable: true,
		clickable: true
	},
	tooltip: true, //activate tooltip
	tooltipOpts: {
		content: "%s : %y.1",
		shifts: {
			x: -30,
			y: -50
		}
	}

 });

  var $tooltip = $("<div class='tooltip top in' style='display:none;'><div class='tooltip-inner'></div></div>").appendTo('body');
  placeholder.data('tooltip', $tooltip);
  var previousPoint = null;
  placeholder.on('plothover', function (event, pos, item) {
	if(item) {
		if (previousPoint != item.seriesIndex) {
			previousPoint = item.seriesIndex;
			var tip = item.series['label'] + " : " + item.series['percent']+'%';
			$(this).data('tooltip').show().children(0).text(tip);
		}
		$(this).data('tooltip').css({top:pos.pageY + 10, left:pos.pageX + 10});
	} else {
		$(this).data('tooltip').hide();
		previousPoint = null;
	}

 });
		var d1 = [];
		for (var i = 0; i < Math.PI * 2; i += 0.5) {
			d1.push([i, Math.sin(i)]);
		}
		var d2 = [];
		for (var i = 0; i < Math.PI * 2; i += 0.5) {
			d2.push([i, Math.cos(i)]);
		}
		var d3 = [];
		for (var i = 0; i < Math.PI * 2; i += 0.2) {
			d3.push([i, Math.tan(i)]);
		}
		
		var sales_charts = $('#sales-charts').css({'width':'100%' , 'height':'220px'});
		$.plot("#sales-charts", [
			{ label: "Domains", data: d1 },
			{ label: "Hosting", data: d2 },
			{ label: "Services", data: d3 }
		], {
			hoverable: true,
			shadowSize: 0,
			series: {
				lines: { show: true },
				points: { show: true }
			},
			xaxis: {
				tickLength: 0
			},
			yaxis: {
				ticks: 10,
				min: -2,
				max: 2,
				tickDecimals: 3
			},
			grid: {
				backgroundColor: { colors: [ "#fff", "#fff" ] },
				borderWidth: 1,
				borderColor:'#555'
			}
		});
		$('[data-rel="tooltip"]').tooltip();
})
		</script>
	</body>
</html>
