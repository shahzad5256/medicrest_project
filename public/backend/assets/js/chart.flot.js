$(function() {
	'use strict';
	
	/**************** PIE CHART *******************/
	
	var pending_orders = 0;
	var cancelled_orders = 0;
	var return_orders = 0;
	var delivered_orders = 0;
	var dispatched_orders = 0;
	
	$.ajax({
        url: "/dashboard/pie",
        type: "get",
        
    success: function (response) {	
     
         pending_orders = response.pending_orders;
    	 cancelled_orders = response.cancelled_orders;
    	 return_orders = response.return_orders;
    	 delivered_orders = response.delivered_orders;
    	 dispatched_orders = response.dispatched_orders;
       
	var piedata = [{
		label: 'Pending',
		data: [
			[1, pending_orders]
		],
		color: '#6610f2'
	}, {
		label: 'Delivered',
		data: [
			[1, delivered_orders]
		],
		color: '#00cccc'
	}, {
		label: 'Return',
		data: [
			[1, return_orders]
		],
		color: '#6d26be'
	}, {
		label: 'Dispatched',
		data: [
			[1, dispatched_orders]
		],
		color: '#f74f75'
	}, {
		label: 'Cancel',
		data: [
			[1, cancelled_orders]
		],
		color: '#494c57'
	}];
	$.plot('#flotPie1', piedata, {
		series: {
			pie: {
				show: true,
				radius: 1,
				label: {
					show: true,
					radius: 2 / 3,
					formatter: labelFormatter,
					threshold: 0.1
				}
			}
		},
		grid: {
			hoverable: true,
			clickable: true
		}
	});	
	
    }
	});
	    
	function labelFormatter(label, series) {
		return '<div style="font-size:8pt; text-align:center; padding:2px; color:white;">' + label + '<br/>' + Math.round(series.percent) + '%</div>';
	}
});