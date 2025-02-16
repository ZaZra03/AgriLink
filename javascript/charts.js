// MAIN CHART

const getMainChartOptions = () => {
	let mainChartColors = {}

	if (document.documentElement.classList.contains('dark')) {
		mainChartColors = {
			borderColor: '#374151',
			labelColor: '#9CA3AF',
			opacityFrom: 0,
			opacityTo: 0.15,
		};
	} else {
		mainChartColors = {
			borderColor: '#F3F4F6',
			labelColor: '#6B7280',
			opacityFrom: 0.45,
			opacityTo: 0,
		}
	}

	return {
		chart: {
			height: 420,
			type: 'area',
			fontFamily: 'Inter, sans-serif',
			foreColor: mainChartColors.labelColor,
			toolbar: {
				show: false
			},
			toolbar: {
			  show: true,
			  offsetX: 0,
			  offsetY: 0,
			  tools: {
				download: true,
				selection: true,
				zoom: true,
				zoomin: true,
				zoomout: true,
				pan: true,
				customIcons: []
			  },
			  export: {
				csv: {
				  filename: "checkout",
				  columnDelimiter: ',',
				  headerCategory: 'category',
				  headerValue: 'value',
				  dateFormatter(timestamp) {
					return new Date(timestamp).toDateString()
				  }
				},
				svg: {
				  filename: "checkout",
				},
				png: {
				  filename: "checkout",
				}
			  },
			  autoSelected: 'pan' 
			},
		},
		fill: {
			type: 'gradient',
			gradient: {
				enabled: true,
				opacityFrom: mainChartColors.opacityFrom,
				opacityTo: mainChartColors.opacityTo
			}
		},
		dataLabels: {
			enabled: false
		},
		tooltip: {
			style: {
				fontSize: '14px',
				fontFamily: 'Inter, sans-serif',
			},
		},
		grid: {
			show: true,
			borderColor: mainChartColors.borderColor,
			strokeDashArray: 1,
			padding: {
				left: 35,
				bottom: 15
			}
		},
		series: [
			{
				name: 'Revenue',
				data: [6356, 6218, 6156, 6526, 6356, 6256, 6056],
				color: '#1A56DB'
			},
			{
				name: 'Revenue (previous period)',
				data: [6556, 6725, 6424, 6356, 6586, 6756, 6616],
				color: '#FDBA8C'
			}
		],
		markers: {
			size: 5,
			strokeColors: '#ffffff',
			hover: {
				size: undefined,
				sizeOffset: 3
			}
		},
		xaxis: {
			categories: ['01 Feb', '02 Feb', '03 Feb', '04 Feb', '05 Feb', '06 Feb', '07 Feb'],
			labels: {
				style: {
					colors: [mainChartColors.labelColor],
					fontSize: '14px',
					fontWeight: 500,
				},
			},
			axisBorder: {
				color: mainChartColors.borderColor,
			},
			axisTicks: {
				color: mainChartColors.borderColor,
			},
			crosshairs: {
				show: true,
				position: 'back',
				stroke: {
					color: mainChartColors.borderColor,
					width: 1,
					dashArray: 10,
				},
			},
		},
		yaxis: {
			labels: {
				style: {
					colors: [mainChartColors.labelColor],
					fontSize: '14px',
					fontWeight: 500,
				},
				formatter: function (value) {
					return '$' + value;
				}
			},
		},
		legend: {
			fontSize: '14px',
			fontWeight: 500,
			fontFamily: 'Inter, sans-serif',
			labels: {
				colors: [mainChartColors.labelColor]
			},
			itemMargin: {
				horizontal: 10
			}
		},
		responsive: [
			{
				breakpoint: 1024,
				options: {
					xaxis: {
						labels: {
							show: false
						}
					}
				}
			}
		]
	};
}

if (document.getElementById('main-chart')) {
	const chart = new ApexCharts(document.getElementById('main-chart'), getMainChartOptions());
	chart.render();

	// init again when toggling dark mode
	document.addEventListener('dark-mode', function () {
		chart.updateOptions(getMainChartOptions());
	});
}



// DETAIL VIEW CHART

var detail_view_options = {
	chart: {
	  height: 280,
	  type: "area"
	},
	dataLabels: {
	  enabled: false
	},
	series: [
	  {
		name: "Series 1",
		data: [45, 52, 38, 45, 19, 23, 2]
	  }
	],
	fill: {
	  type: "gradient",
	  gradient: {
		shadeIntensity: 1,
		opacityFrom: 0.7,
		opacityTo: 0.9,
		stops: [0, 90, 100]
	  }
	},
	xaxis: {
	  categories: [
		"01 Jan",
		"02 Jan",
		"03 Jan",
		"04 Jan",
		"05 Jan",
		"06 Jan",
		"07 Jan"
	  ]
	},
	chart: {
		toolbar: {
		  show: true,
		  offsetX: 0,
		  offsetY: 0,
		  tools: {
			download: true,
			selection: true,
			zoom: true,
			zoomin: true,
			zoomout: true,
			pan: true,
			customIcons: []
		  },
		  export: {
			csv: {
			  filename: "product_detail_views",
			  columnDelimiter: ',',
			  headerCategory: 'category',
			  headerValue: 'value',
			  dateFormatter(timestamp) {
				return new Date(timestamp).toDateString()
			  }
			},
			svg: {
			  filename: "product_detail_views",
			},
			png: {
			  filename: "product_detail_views",
			}
		  },
		  autoSelected: 'pan' 
		},
	}
  };
  
  var chart = new ApexCharts(document.querySelector("#detail-view-chart"), detail_view_options);
  
  chart.render();
  
// ADD TO CART CHART

var add_to_cart_options = {
	chart: {
	  height: 280,
	  type: "area"
	},
	dataLabels: {
	  enabled: false
	},
	series: [
	  {
		name: "Series 1",
		data: [45, 38, 52, 45, 19, 2, 23]
	  }
	],
	fill: {
	  type: "gradient",
	  gradient: {
		shadeIntensity: 1,
		opacityFrom: 0.7,
		opacityTo: 0.9,
		stops: [0, 90, 100]
	  }
	},
	xaxis: {
	  categories: [
		"01 Jan",
		"02 Jan",
		"03 Jan",
		"04 Jan",
		"05 Jan",
		"06 Jan",
		"07 Jan"
	  ]
	},
	chart: {
		toolbar: {
		  show: true,
		  offsetX: 0,
		  offsetY: 0,
		  tools: {
			download: true,
			selection: true,
			zoom: true,
			zoomin: true,
			zoomout: true,
			pan: true,
			customIcons: []
		  },
		  export: {
			csv: {
			  filename: "product_added_to_cart",
			  columnDelimiter: ',',
			  headerCategory: 'category',
			  headerValue: 'value',
			  dateFormatter(timestamp) {
				return new Date(timestamp).toDateString()
			  }
			},
			svg: {
			  filename: "product_added_to_cart",
			},
			png: {
			  filename: "product_added_to_cart",
			}
		  },
		  autoSelected: 'pan' 
		},
	}
  };
  
  var chart = new ApexCharts(document.querySelector("#add-to-cart-chart"), add_to_cart_options);
  
  chart.render();


// ADD TO CART CHART

var checkout_options = {
	chart: {
	  height: 280,
	  type: "area"
	},
	dataLabels: {
	  enabled: false
	},
	series: [
	  {
		name: "Series 1",
		data: [45, 38, 52, 45, 19, 2, 23]
	  }
	],
	fill: {
	  type: "gradient",
	  gradient: {
		shadeIntensity: 1,
		opacityFrom: 0.7,
		opacityTo: 0.9,
		stops: [0, 90, 100]
	  }
	},
	xaxis: {
	  categories: [
		"01 Jan",
		"02 Jan",
		"03 Jan",
		"04 Jan",
		"05 Jan",
		"06 Jan",
		"07 Jan"
	  ]
	},
	chart: {
		toolbar: {
		  show: true,
		  offsetX: 0,
		  offsetY: 0,
		  tools: {
			download: true,
			selection: true,
			zoom: true,
			zoomin: true,
			zoomout: true,
			pan: true,
			customIcons: []
		  },
		  export: {
			csv: {
			  filename: "checkout",
			  columnDelimiter: ',',
			  headerCategory: 'category',
			  headerValue: 'value',
			  dateFormatter(timestamp) {
				return new Date(timestamp).toDateString()
			  }
			},
			svg: {
			  filename: "checkout",
			},
			png: {
			  filename: "checkout",
			}
		  },
		  autoSelected: 'pan' 
		},
	}
  };
  
  var chart = new ApexCharts(document.querySelector("#checkout-chart"), checkout_options);
  
  chart.render();