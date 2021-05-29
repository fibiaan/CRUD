Sensores
<br>
<?php
    
?>
<script>
window.onload = function () {

var chart = new CanvasJS.Chart("chartContainer", {
	title: {
		text: "Temperatura"
	},
	axisX: {
		valueFormatString: "MMM YYYY"
	},
	axisY2: {
		title: "En grados Centígrados",
		prefix: "",
		suffix: "°"
	},
	toolTip: {
		shared: true
	},
	legend: {
		cursor: "pointer",
		verticalAlign: "top",
		horizontalAlign: "center",
		dockInsidePlotArea: true,
		itemclick: toogleDataSeries
	},
	data: [{
		type:"line",
		axisYType: "secondary",
		name: "",
		showInLegend: true,
		markerSize: 0,
		yValueFormatString: "$#,###k",
		dataPoints: [		
            <?php 
                while ($dat = mysqli_fetch_assoc($res)){
                    echo "{ x: " . $dat['tiempo'] . ", y: " . $dat['temperatura'] . " },";
                } 
            ?>,
			{ x: new Date(2014, 00, 01), y: 850 },
			{ x: new Date(2014, 01, 01), y: 889 },
			{ x: new Date(2014, 02, 01), y: 890 },
    ]}]
});
chart.render();

function toogleDataSeries(e){
	if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
		e.dataSeries.visible = false;
	} else{
		e.dataSeries.visible = true;
	}
	chart.render();
}

}
</script>
<div id="chartContainer" style="height: 300px; width: 100%;"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>