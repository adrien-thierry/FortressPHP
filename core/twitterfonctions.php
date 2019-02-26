<?php

function getLastTweets($name = "adrien_thierry", $i = 4)
{

echo '<a class="twitter-timeline" style="color:#000;" href="https://twitter.com/' . $name . '" data-widget-id="340015599335923712">Tweets de @' . $name . '</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?\'http\':\'https\';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>';

}

?>
