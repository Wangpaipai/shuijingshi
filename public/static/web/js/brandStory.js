$(function(){
			$(".OpenAll").click(function(){
				$(".GroExAll").removeClass("hide").addClass("show");
				$(".GatheUp").removeClass("hide").addClass("show");
				$(".OpenAll").removeClass("show").addClass("hide")
			});
			$(".GatheUp").click(function(){
				$(".GroExAll").removeClass("show").addClass("hide")
				$(".GatheUp").removeClass("show").addClass("hide")
				$(".OpenAll").removeClass("hide").addClass("show");
			});
		})