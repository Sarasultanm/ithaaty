 $(document).ready(function () {
        $("#audioContainer").hide();
        $("#embedContainer").hide();

        $('#uploadAudio').click(function () {
        	$("#audioContainer").show();
        	$("#embedContainer").hide();
        });	

         $('#embedAudio').click(function () {
        	$("#audioContainer").hide();
        	$("#embedContainer").show();
        });	

    });