'use strict';$(document).ready(function(){$(function(){am4core.useTheme(am4themes_animated);var chart=am4core.create("support-chart",am4charts.XYChart);chart.data=[{"date":"2018-01-1","price":180},{"date":"2018-01-2","price":252},{"date":"2018-01-3","price":185},{"date":"2018-01-4","price":189},{"date":"2018-01-5","price":158},{"date":"2018-01-6","price":200},{"date":"2018-01-7","price":187},{"date":"2018-01-8","price":180},{"date":"2018-01-9","price":252},{"date":"2018-01-10","price":185},{"date":"2018-01-11","price":268},{"date":"2018-01-12","price":158},{"date":"2018-01-13","price":200},{"date":"2018-01-14","price":187},{"date":"2018-01-15","price":180},{"date":"2018-01-16","price":252},{"date":"2018-01-17","price":185},{"date":"2018-01-18","price":250},{"date":"2018-01-19","price":158},{"date":"2018-01-20","price":200},{"date":"2018-01-21","price":187},{"date":"2018-01-22","price":180},{"date":"2018-01-23","price":252},{"date":"2018-01-24","price":185},{"date":"2018-01-25","price":295},{"date":"2018-01-26","price":158},{"date":"2018-01-27","price":200},{"date":"2018-01-28","price":90}];var dateAxis=chart.xAxes.push(new am4charts.DateAxis());dateAxis.renderer.grid.template.location=0;dateAxis.startLocation=0.6;dateAxis.endLocation=0.4;dateAxis.renderer.opposite=true;var valueAxis=chart.yAxes.push(new am4charts.ValueAxis());valueAxis.logarithmic=false;valueAxis.renderer.minGridDistance=1;valueAxis.renderer.grid.template.disabled=true;valueAxis.renderer.inside=true;valueAxis.renderer.labels.template.disabled=true;var series=chart.series.push(new am4charts.LineSeries());series.dataFields.valueY="price";series.dataFields.dateX="date";series.strokeWidth=3;series.fillOpacity=0.1;series.tooltipText="{valueY.value}";series.stroke=am4core.color("#7759de");series.strokeWidth=3;series.fillOpacity=1;var gradient=new am4core.LinearGradient();gradient.addColor(am4core.color("#7759de"),0.2);gradient.addColor(am4core.color("#7759de"),0);gradient.rotation=90;series.fill=gradient;chart.cursor=new am4charts.XYCursor();chart.cursor.fullWidthLineX=true;chart.cursor.lineX.strokeWidth=0;chart.cursor.lineX.fillOpacity=0;chart.padding(0,0,0,0);});$(function(){am4core.useTheme(am4themes_animated);var chart=am4core.create("support-chart1",am4charts.XYChart);chart.data=[{"date":"2018-01-1","price":180},{"date":"2018-01-2","price":252},{"date":"2018-01-3","price":185},{"date":"2018-01-4","price":189},{"date":"2018-01-5","price":158},{"date":"2018-01-6","price":200},{"date":"2018-01-7","price":187},{"date":"2018-01-8","price":180},{"date":"2018-01-9","price":252},{"date":"2018-01-10","price":185},{"date":"2018-01-11","price":268},{"date":"2018-01-12","price":158},{"date":"2018-01-13","price":200},{"date":"2018-01-14","price":187},{"date":"2018-01-15","price":180},{"date":"2018-01-16","price":252},{"date":"2018-01-17","price":185},{"date":"2018-01-18","price":250},{"date":"2018-01-19","price":158},{"date":"2018-01-20","price":200},{"date":"2018-01-21","price":187},{"date":"2018-01-22","price":180},{"date":"2018-01-23","price":252},{"date":"2018-01-24","price":185},{"date":"2018-01-25","price":295},{"date":"2018-01-26","price":158},{"date":"2018-01-27","price":200},{"date":"2018-01-28","price":90}];var dateAxis=chart.xAxes.push(new am4charts.DateAxis());dateAxis.renderer.grid.template.location=0;dateAxis.startLocation=0.6;dateAxis.endLocation=0.4;dateAxis.renderer.opposite=true;var valueAxis=chart.yAxes.push(new am4charts.ValueAxis());valueAxis.logarithmic=false;valueAxis.renderer.minGridDistance=1;valueAxis.renderer.grid.template.disabled=true;valueAxis.renderer.inside=true;valueAxis.renderer.labels.template.disabled=true;var series=chart.series.push(new am4charts.LineSeries());series.dataFields.valueY="price";series.dataFields.dateX="date";series.strokeWidth=3;series.fillOpacity=0.1;series.tooltipText="{valueY.value}";series.stroke=am4core.color("#2196f3");series.strokeWidth=3;series.fillOpacity=1;var gradient=new am4core.LinearGradient();gradient.addColor(am4core.color("#2196f3"),0.2);gradient.addColor(am4core.color("#2196f3"),0);gradient.rotation=90;series.fill=gradient;chart.cursor=new am4charts.XYCursor();chart.cursor.fullWidthLineX=true;chart.cursor.lineX.strokeWidth=0;chart.cursor.lineX.fillOpacity=0;chart.padding(0,0,0,0);});$(function(){am4core.useTheme(am4themes_animated);var chart=am4core.create("support-chart2",am4charts.XYChart);chart.data=[{"date":"2018-01-1","price":180},{"date":"2018-01-2","price":252},{"date":"2018-01-3","price":185},{"date":"2018-01-4","price":189},{"date":"2018-01-5","price":158},{"date":"2018-01-6","price":200},{"date":"2018-01-7","price":187},{"date":"2018-01-8","price":180},{"date":"2018-01-9","price":252},{"date":"2018-01-10","price":185},{"date":"2018-01-11","price":268},{"date":"2018-01-12","price":158},{"date":"2018-01-13","price":200},{"date":"2018-01-14","price":187},{"date":"2018-01-15","price":180},{"date":"2018-01-16","price":252},{"date":"2018-01-17","price":185},{"date":"2018-01-18","price":250},{"date":"2018-01-19","price":158},{"date":"2018-01-20","price":200},{"date":"2018-01-21","price":187},{"date":"2018-01-22","price":180},{"date":"2018-01-23","price":252},{"date":"2018-01-24","price":185},{"date":"2018-01-25","price":295},{"date":"2018-01-26","price":158},{"date":"2018-01-27","price":200},{"date":"2018-01-28","price":90}];var dateAxis=chart.xAxes.push(new am4charts.DateAxis());dateAxis.renderer.grid.template.location=0;dateAxis.startLocation=0.6;dateAxis.endLocation=0.4;dateAxis.renderer.opposite=true;var valueAxis=chart.yAxes.push(new am4charts.ValueAxis());valueAxis.logarithmic=false;valueAxis.renderer.minGridDistance=1;valueAxis.renderer.grid.template.disabled=true;valueAxis.renderer.inside=true;valueAxis.renderer.labels.template.disabled=true;var series=chart.series.push(new am4charts.LineSeries());series.dataFields.valueY="price";series.dataFields.dateX="date";series.strokeWidth=3;series.fillOpacity=0.1;series.tooltipText="{valueY.value}";series.stroke=am4core.color("#4caf50");series.strokeWidth=3;series.fillOpacity=1;var gradient=new am4core.LinearGradient();gradient.addColor(am4core.color("#4caf50"),0.2);gradient.addColor(am4core.color("#4caf50"),0);gradient.rotation=90;series.fill=gradient;chart.cursor=new am4charts.XYCursor();chart.cursor.fullWidthLineX=true;chart.cursor.lineX.strokeWidth=0;chart.cursor.lineX.fillOpacity=0;chart.padding(0,0,0,0);});$(function(){am4core.useTheme(am4themes_animated);var chart=am4core.create("satisfaction-chart",am4charts.PieChart);chart.data=[{"sector":"Very Poor [66%]","size":8},{"sector":"Satisfied [50%]","size":14.6},{"sector":"Very Satisfied [40%]","size":22.5},{"sector":"Poor [30%]","size":8}];chart.innerRadius=40;var pieSeries=chart.series.push(new am4charts.PieSeries());pieSeries.dataFields.value="size";pieSeries.dataFields.category="sector";pieSeries.labels.template.disabled=true;pieSeries.ticks.template.disabled=true;pieSeries.colors.step=1;});var px=new PerfectScrollbar('.latest-scroll',{wheelSpeed:.5,swipeEasing:0,wheelPropagation:1,minScrollbarLength:40,});});