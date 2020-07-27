$(document).ready(function(){
	$.ajax({
		url: "includes/graph.inc.php",
		method: "GET",
		success: function(data) {
			console.log(data)
			var attempts = [];
			var scores = [];

			for (var i in data) {
				console.log(data[i].score)
				attempts.push(parseInt(data[i].attempt_id));
				scores.push(parseInt(data[i].score));
			}

			new Chart(document.getElementById("line-chart"), {
			  	type: 'line',
			  	data: {
			    	labels: attempts,
			    	datasets: [{ 
			        	data: scores,
			        	label: "Scores",
			        	borderColor: "#3e95cd",
			        	lineTension: 0, 
			        	fill: false
			    	}]
			  	},
			  	options: { 
			  		scales: {
					    xAxes: [{
					      	scaleLabel: {
					        	display: true,
					        	labelString: 'Number of Attempts'
					      	}
					    }],
					    yAxes: [{
					      	scaleLabel: {
					        	display: true,
					        	labelString: 'Score'
					      	}
					    }]					    
			  		}
			  	}
			});

		},
		error: function(data) {
			console.log(data);
		}
	});
})
