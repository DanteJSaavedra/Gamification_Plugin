var RadarChart = {
  draw: function(id, d, options){
      var cfg = {
          radius: 5,
          w: 600,
          h: 600,
          factor: 1,
          factorLegend: .85,
          levels: 3,
          maxValue: 0,
          radians: 2 * Math.PI,
          opacityArea: 0.5,
          ToRight: 5,
          TranslateX: 80,
          TranslateY: 30,
          ExtraWidthX: 100,
          ExtraWidthY: 100,
          color: d3.scale.category10()
      };
  }//function
}//RadarChart

//Options for the Radar chart, other than default
var mycfg = {
  w: 500,
  h: 500,
  maxValue: 0.6,
  levels: 6,
  ExtraWidthX: 300
}

//Call function to draw the Radar chart
RadarChart.draw("#chart", d, mycfg);