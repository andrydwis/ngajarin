// Num Array Generator
var numArr = function (length, max) {
  return Array.from({
    length: length
  }, () => Math.floor(Math.random() * max));
}
// end Num Array Generator

// APEX Charts
var options = function (type, height, numbers, color) {
  return {
    chart: {
      height: height,
      width: '100%',
      type: type,
      sparkline: {
        enabled: true
      },
      toolbar: {
        show: false,
      },
    },
    grid: {
      show: false,
      padding: {
        top: 0,
        right: 0,
        bottom: 0,
        left: 0
      }
    },
    dataLabels: {
      enabled: false
    },
    legend: {
      show: false,
    },
    series: [{
      name: "serie1",
      data: numbers
    }],
    fill: {
      colors: [color],
    },
    stroke: {
      colors: [color],
      width: 3
    },
    yaxis: {
      show: false,
    },
    xaxis: {
      show: false,
      labels: {
        show: false,
      },
      axisBorder: {
        show: false,
      },
      tooltip: {
        enabled: false,
      }
    },

  };
}

var sealsOptions = {
  chart: {
    height: 350,
    type: "line",
    stacked: false
  },
  dataLabels: {
    enabled: false
  },
  colors: ['#99C2A2', '#C5EDAC', '#66C7F4'],
  series: [

    {
      name: 'Column A',
      type: 'column',
      data: [21.1, 23, 33.1, 34, 44.1, 44.9, 56.5, 58.5]
    },
    {
      name: "Column B",
      type: 'column',
      data: [10, 19, 27, 26, 34, 35, 40, 38]
    },
    {
      name: "Line C",
      type: 'column',
      data: [1.4, 2, 2.5, 1.5, 2.5, 2.8, 3.8, 4.6]
    },
  ],
  stroke: {
    width: [4, 4, 4]
  },
  plotOptions: {
    bar: {
      columnWidth: "20%"
    }
  },
  xaxis: {
    categories: [2009, 2010, 2011, 2012, 2013, 2014, 2015, 2016]
  },
  yaxis: [{
    seriesName: 'Column A',
    axisTicks: {
      show: true
    },
    axisBorder: {
      show: true,
    },
    title: {
      text: "Columns"
    }
  },
  {
    seriesName: 'Column A',
    show: false
  }, {
    opposite: true,
    seriesName: 'Line C',
    axisTicks: {
      show: true
    },
    axisBorder: {
      show: true,
    },
    title: {
      text: "Line"
    }
  }
  ],
  tooltip: {
    shared: false,
    intersect: true,
    x: {
      show: false
    }
  },
  legend: {
    horizontalAlign: "left",
    offsetX: 40
  }
};
// end APEX Charts


// page view & Unique Users
var analytics_1 = document.getElementsByClassName("analytics_1");

if (analytics_1 != null && typeof (analytics_1) != 'undefined') {
  var chart = new ApexCharts(analytics_1[0], options("area", '51px', numArr(10, 99), '#4fd1c5'));
  var chart_1 = new ApexCharts(analytics_1[1], options("area", '51px', numArr(10, 99), '#4c51bf'));
  chart.render();
  chart_1.render();
}
// end page view & Unique Users


// Sales Overview
var sealsOverview = document.getElementById('sealsOverview');
var sealsOverviewChart = new ApexCharts(sealsOverview, options('bar', '100%', numArr(20, 999), '#30aba0'));
sealsOverviewChart.render();
// endSales Overview