<?php 
$html = file_get_contents($_GET['host']);
preg_match('$Currently playing:</td><td class="streamstats">(.*)</td>$s',$html,$match);
echo preg_replace('/\s+/', ' ',$match[1]);