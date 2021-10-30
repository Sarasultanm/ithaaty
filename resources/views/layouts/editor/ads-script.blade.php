 @if($numAds == 1)
 <script>
    var adsVideoLinkOne = "<?php echo $videlink[0] ?>";
    var adsSkipOne = "<?php echo $skip[0] ?>";
    var adsDisplayOne = "<?php echo $displaytime[0] ?>";
 </script>
 @elseif($numAds == 2)
 <script>
    var adsVideoLinkOne = "<?php echo $videlink[0] ?>";
    var adsVideoLinkTwo = "<?php echo $videlink[1] ?>";
    var adsSkipOne = "<?php echo $skip[0] ?>";
    var adsSkipTwo = "<?php echo $skip[1] ?>";
    var adsDisplayOne = "<?php echo $displaytime[0] ?>";
    var adsDisplayTwo = "<?php echo $displaytime[1] ?>";
 </script>

@endif
