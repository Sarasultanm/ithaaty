function getOnTimeUpdate(event) {
    document.getElementById("watchtime").value = event.currentTime;
  } 
  function getOnTimeOnPause(event) {
    var div = document.querySelector('video');
    var video_id = document.getElementById("video_id").value; 
    document.getElementById("watchtimepause").value = event.currentTime;
    $.ajax({
        url: "{{ route('storeVideoTime') }}",
        type:"POST",
          data: {
        "_token": "{{ csrf_token() }}",
        "audioid": video_id,
        "video_time": event.currentTime,
        "video_lenght": event.duration,
        },
        success:function(response){
          console.log(response);
        }
      });
      console.log('savetime');  
  } 
  function getOnTimeOnEnded(event) {
    var div = document.querySelector('video');
    var video_id = document.getElementById("video_id").value; 
    document.getElementById("watchtimepause").value = event.currentTime;
    $.ajax({
        url: "{{ route('storeVideoTime') }}",
        type:"POST",
          data: {
        "_token": "{{ csrf_token() }}",
        "audioid": video_id,
        "video_time": event.currentTime,
        "video_lenght": event.duration,
        },
        success:function(response){
          console.log(response);
        }
      });
      console.log('savetime');  
  } 