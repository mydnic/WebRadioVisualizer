<?php $config = include 'config.php'; ?>
<html>
    <head>
        <meta charset="utf-8">
        
        <title><?php echo $config['name'] ?></title>
        <link rel="stylesheet" href="style.css">

        <meta name="description" content="<?php echo $config['description'] ?>">
        <meta name="keywords" content="<?php echo $config['keywords'] ?>">
        <meta name="author" content="<?php echo $config['author'] ?>">
        <meta property="og:title" content="<?php echo $config['name'] ?>"/>
        <meta property="og:url" content="<?php echo $config['url'] ?>"/>
        <meta property="og:image" content="<?php echo $config['image'] ?>"/>
        <meta property="og:site_name" content="<?php echo $config['name'] ?>"/>
        <meta property="og:description" content="<?php echo $config['description'] ?>">
        <meta property="og:type" content="website"/>
    </head>
    <body>
        <div id='body-fx-wrapper'>
            <canvas id='visualizer'></canvas>
            
            <div id='foreground' onclick="GetInfo()">
                <audio crossorigin='' id='Stream' autoplay="" controls="">
                    <source src="<?php echo $config['stream_url'] ?>" type="audio/mp3">
                </audio>
                
                <input onclick="setVol(this.value)" min="0" max="1" step="0.01" id="volume-bar" type="range"/>
                <svg viewBox="0 0 100 100" onclick='start()' class='play-btn' id='start'><polygon points="0,0 100,50 0,100" /></svg>
                <svg viewBox="0 0 100 100" onclick='pause()' class='pause-btn' id='pause'><rect height="100" width="100" /></rect></svg>
                
                <div id="current-volume"></div>
            </div>
            <?php if ($config['customizable']): ?>
                <div id='settings'>
                    <div id='settings-fx-wrapper'>
                        <div id='settings-title'>
                            Settings
                        </div>
                        <div id='settings-wrapper'>
                            <table><tr><td>Source:</td><td><input value='http://mydnic.be:8000/radio.ogg' id='srInput'/><div onclick='NewSource()' class='btn'>Save</div></td></tr>
                            <tr><td>Foreground:</td><td><input value='33aaff' id='fgInput' maxlength="6"/><div onclick='NewFGColour()' class='btn'>Save</div></td></tr>
                            <tr><td>Background:</td><td><input value='051015' id='bgInput' maxlength="6"/><div onclick='NewBGColour()' class='btn'>Save</div></td></tr>
                            <tr><td>Bleed Quality:</td><td><input step='1' value='1' id='bqInput' max='20' min='1' type='range'/><div onclick='NewBleedQuality()' class='btn'>Save</div></td></tr>
                            <tr><td>Bar Height:</td><td><input step='0.01' value='0' id='bhInput' max='1' min='0' type='range'/><div onclick='NewBarHeight()' class='btn'>Save</div></td></tr>
                            <tr><td>Bar Width:</td><td><input step='1' value='4' id='bwInput' max='100' min='1' type='range'/><div onclick='NewBarWidth()' class='btn'>Save</div></td></tr>
                            <tr><td>Bar Spacing:</td><td><input step='1' value='1' id='bsInput' max='5' min='0' type='range'/><div onclick='NewBarSpacing()' class='btn'>Save</div></td></tr>
                            </table>
                            
                            <div id='filters'>
                                <div id='filters-title'>FX</div>
                                
                                <table>
                                    <tr><td>Vibrance:</td><td><div onclick='toggleFX("vibrance")' class='filter-toggle'><div style='opacity:0.2;'>On</div><div>Off</div></div></td></tr>
                                    <tr><td>Color Shift:</td><td><div onclick='toggleFX("colourShift")' class='filter-toggle'><div style='opacity:0.2;'>On</div><div>Off</div></div></td></tr>
                                    <tr><td>Pulse:</td><td><div onclick='toggleFX("pulse")' class='filter-toggle'><div style='opacity:0.2;'>On</div><div>Off</div></div></td></tr>
                                    <tr style='opacity:0.2;'><td>Strobe:</td><td><div class='filter-toggle'><div style='opacity:0.2;'>On</div><div>Off</div></div></td></tr>
                                    <tr style='opacity:0.2;'><td>Inverse:</td><td><div class='filter-toggle'><div style='opacity:0.2;'>On</div><div>Off</div></div></td></tr>
                                </table>
                            </div>
                        </div>

                        <div onclick='SettingsToggle()' id='settings-toggle'>
                            >
                        </div>
                    </div>
                </div>
            <?php endif ?>
        </div>

        <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script>var radioName = "<?php echo $config['name'] ?>";</script>
        <script>var host = "<?php echo $config['icecast_url'] ?>";</script>
        <script src="app.js"></script>
        
        <script>
          (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
          (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
          m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
          })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

          ga('create', "<?php echo $config['analytics'] ?>", 'auto');
          ga('send', 'pageview');
        </script>
    </body>
</html>
