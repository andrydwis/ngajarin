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
        show: true,
      },
    },
    grid: {
      show: true,
      padding: {
        top: 0,
        right: 0,
        bottom: 0,
        left: 0
      }
    },
    dataLabels: {
      enabled: true
    },
    legend: {
      show: true,
    },
    series: [{
      name: "Nilai ",
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





