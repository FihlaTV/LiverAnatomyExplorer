<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
  "http://www.w3.org/TR/html4/loose.dtd">
<?php
/* ==================================
 * X3DOM WebApp
 * ==================================
 * 
 * Copyright (c) 2013 X3DOMApp | Steven Birr | http://www.steven-birr.de
 * This application is dual licensed under the MIT and GPL licenses (see license.txt)
 * GPL 3.0: http://www.opensource.org/licenses/gpl-3.0.html
 * MIT: http://www.opensource.org/licenses/mit-license.php
 */
   if (isset($_GET['site']))
   {
      $siteParam = htmlentities($_GET['site']);
   }
?>
<html>
   <head>
      <meta http-equiv='Content-Type' content='text/html;charset=utf-8'>
      <meta http-equiv="X-UA-Compatible" content="chrome=1">
      <meta name="author" content="Steven Birr">
      <meta name="publisher" content="Steven Birr">
      <meta name="copyright" content="Steven Birr">
      <meta name="description" content="The WebGL LiverAnatomyExplorer provides interactive web-based 3D models derived from anonymized clinical image data. The 3D visualizations are accessible in real-time with our newly developed 3D viewer based on X3D, X3DOM and WebGL without any plugin.">
      <meta name="keywords" content="Liver Anatomy Explorer, LiverAnatomyExplorer, WebGL, X3D, X3DOM, Web3D, Medical, E-Learning, Anatomy, Liver, Surgery, 3D models, Real-Time Visualization, HTML5, WebWorker, Progressbar">
      <meta name="page-topic" content="Wissenschaft">
      <meta name="page-type" content="Forschungsbericht">
      <meta name="audience" content="Alle">
      <meta http-equiv="content-language" content="en">
      <meta name="robots" content="index, follow">
      
      <link rel="stylesheet" href="js/fancybox/jquery.fancybox-1.3.4.css" type="text/css" media="screen">
      <link rel="stylesheet" href="js/x3dom/1.6.2/x3dom.css" type="text/css" media="screen">
      <link rel="stylesheet" type="text/css" href="style/style.css">
      <script type="text/javascript" src="js/jquery-1.8.3.min.js"></script>
      <script type="text/javascript" src="js/x3dom/1.6.2/x3dom.js"></script>
      <script type="text/javascript" src="js/fancybox/jquery.fancybox-1.3.4.pack.js"></script>
      <script type="text/javascript" src="js/jquery.repeatedclick.min.js"></script>
      <script type="text/javascript" src="js/jquery.mousewheel-3.0.6.min.js"></script>
      <script type="text/javascript" src="js/x3domApp.js"></script>
      <script type="text/javascript" src="js/myScript.js"></script>
      <title>WebGL LiverAnatomyExplorer</title>
   </head>
   <body>
   <noscript>
   <p id="jsError">
   This website uses JavaScript. Please activate JavaScript and try it again!<br>
   <span>
   Mozilla Firefox: Extras --> Einstellungen --> Inhalt --> JavaScript aktivieren<br>
   Microsoft Internet Explorer: Extras --> Internetoptionen --> Sicherheit --> Stufe anpassen --> Active Scripting aktivieren<br>
   </span>
   </p>
   </noscript>
   <canvas id="myCanvas"></canvas>
   <div id="webglAlert">
      <span class="error">Leider unterst&uuml;tzt Ihr Browser keine 3D-Visualisierungen auf Basis von WebGL!</span>
      <p id="IE">
      Sie nutzen den Internet Explorer und haben daher 2 M&ouml;glichkeiten:
      </p>
      <ol id="IEoptions">
         <li>Installieren Sie das Plugin <b><a href='http://www.google.com/chromeframe?hl=de&quickenable=true' target='blank'>ChromeFrame</a></b>.</li>
         <li>Oder nutzen Sie einen WebGL-f&auml;higen Browser, z.B. <b><a href='http://www.mozilla.org/de/firefox/fx/' target='_blank'>Mozilla Firefox</a></b> oder <b><a href='http://www.google.de/chrome/' target='_blank'>Google Chrome</a></b>!</li>
      </ol>
      <p id="notIE">
      Bitte nutzen Sie einen WebGL-f&auml;higen Browser, z.B. <b><a href='http://www.mozilla.org/de/firefox/fx/' target='_blank'>Mozilla Firefox</a></b> oder <b><a href='http://www.google.de/chrome/' target='_blank'>Google Chrome</a></b>!
      </p>
   </div>
    <div id="noCaseAlert">
       <p class="error">Error: Could not load X3D file!</p>
   </div>
   <script type='text/javascript'>
<?php
    if (isset($siteParam) && $siteParam == "start"):
    ?>
        var load3d = true;
    <?php
    else:
        ?>
        var load3d = false;
    <?php
    endif;
?>
   </script>
   
   <br style="clear:both">
   <div id="mainPanel" class="clearfix">
      <div id="headline">
         <a id="headlineLink" href="index.php">WebGL LiverAnatomyExplorer</a>
         
      </div>
      <div id="content">
         <?php
         if (isset($siteParam) && $siteParam == "start")
            show3DPanel();
         else
            showStartPanel();
         ?>
      </div>
   </div>
   
   <?php
      function showStartPanel()
      {
      ?>
         <h2>Research Project</h2>
         <p class="textindent">
            The <strong>WebGL LiverAnatomyExplorer</strong> has been developed in a german research project supported by the Federal Ministry of Education and Research ("BMBF"). Our goal was the development of a new medical e-learning application. In contrast to existing e-learning portals, we provide interactive web-based 3D models derived from anonymized clinical data. The 3D visualizations are accessible in real-time with our newly developed 3D viewer based on X3D, <a href="http://www.x3dom.org" target="blank">X3DOM</a> and WebGL. No platform-speciﬁc browser plugin is required!
         </p>
         <hr>
         <h2>Features</h2>
         <ul>
            <li class="current">Rotate, pan and zoom a real patient-individual 3D liver model</li>
            <li class="current">Explore the 3D model freely with your mouse or with an easy-to-use control panel</li>
            <li class="current">Simply show or hide structures of the liver (e.g. tumors) by one click</li>
         </ul>
         <hr>
         <h2>System Requirements</h2>
         <ul>
            <li>You need a modern WebGL enabled browser with JavaScript activated, and a modern graphic card with shader support!</li>
            <li>Currently it works <strong>plugin-free</strong> in <a href="http://www.mozilla.org/de/firefox/fx/" target="blank">Mozilla Firefox</a> (Version >= 4.0) and <a href="http://www.google.de/chrome/" target="blank">Google Chrome</a>  (Version >= 9).
                <br>If you use <a href="http://windows.microsoft.com/de-DE/internet-explorer/downloads/ie" target="blank">Internet Explorer</a> (Version 9/10), you need the <a href="http://www.adobe.com/products/flashplayer.html" target="blank">Flash</a> plugin installed! Since IE 11, basic WebGL support is available.
                <br>Internet Explorer < 9 is not supported!
            </li>
            <li>It also runs on modern WebGL enabled smartphones (with Android OS) like Samsung Galaxy SII!</li>
            <li><a href="http://www.x3dom.org/check/" target="blank">Check here</a> if your browser supports X3DOM.</li>
         </ul>
         <hr>
         <h2>Contact</h2>
         <p class="textindent">
         If you have questions, please contact me: <img src="images/email.png" alt="email" style="position: relative; top: 3px;">
         <span class="mAdr"></span>
         </p>
         <hr>
         
         <h2>Last update</h2>
         <p class="textindent">23.02.2015 <strong>|</strong> Version 2.0.11<br>&nbsp;- Bugfix for middle and right mouse button</p>
         <hr>

         <p id="startButtonText">Click to load the 3D liver model (1.2 MB).<br>Please wait a moment...</p>
         <div id="startButtonWrapper">
            <a id='startButton' href='index.php?site=start' class='button'>Start</a>
         </div>
    <?php
    }
    ?>

    <?php
      function show3DPanel()
      {
      ?>
      <div id="mainScene">
         <x3d id='main' showStat='false' showLog='false'>
            <param name="disableDoubleClick" value="true"></param>
            <scene id="main_scene">
            </scene>
         </x3d>
          
         <div id="widget3D">
            <div id="panControls" class="widgetControl">
               <div id="rotate-left" class="pointer horizontalPan rotate-left widgetControl"></div>
               <div id="rotate-right" class="pointer horizontalPan rotate-right widgetControl"></div>
               <div id="rotate-up" class="pointer verticalPan rotate-up widgetControl"></div>
               <div id="rotate-down" class="pointer verticalPan rotate-down widgetControl"></div>
               <div id="rotate-home" class="pointer tooltip2D rotate-home widgetControl"><span>View all</span></div>
            </div>
            <div id="zoomControls" class="widgetControl zoomControls">
               <div id="zoom-in" class="pointer zoom-in widgetControl"></div>
               <div id="zoom-out" class="pointer zoom-out widgetControl"></div>
            </div>
         <div id="helperScene">
             <x3d id='helper' showStat='false' showLog='false'>
               <param name="disableDoubleClick" value="true">
               <scene id="helper_scene">
               </scene>
             </x3d>
          </div>
         </div>
          
       </div>
  
       <div id='controlsWrapper'>

         <div id="interactionHelp" class="box">
            <p class="controlsHeader">Mouse interaction</p>
            <p style="margin-bottom: 30px;">
               <img src="images/mouse-select-left-icon.png" alt="mouse-left" class="interactHelpIcon">
               <span class="interactionHelpText">Rotate 3D Model</span>
            </p>
            <p style="margin-bottom: 30px;">
               <img src="images/mouse-select-right-icon.png" alt="mouse-left" class="interactHelpIcon">
               <span class="interactionHelpText">Zoom in/out</span>
            </p>
            <p>
               <img src="images/ctrl-key-icon.png" alt="str-icon" class="interactHelpIcon">
               <span id="plus">+</span>
               <img src="images/mouse-select-left-icon.png" alt="mouse-left" class="interactHelpIcon">
               <span class="interactionHelpText">Pan 3D Model</span>
            </p>
         </div>
    
        <div id="x3dObjects" class="box">
          <p class="controlsHeader">Show/hide 3D objects</p>   
        </div>
       
        <div id="experimentalControls" class="box">
          <p class="controlsHeader">Experimental</p>
          <input type="checkbox" id="Check_Tooltip"><label for="Check_Tooltip">3D Tooltip</label><br>
        </div>

        <br style="clear:left">

       </div>
      
       <a id="show3DLoadingText" href="#splash"></a>
       <div id="splashWrapper">
            <div id="splash">
              <p id="loadingText">Loading 3D Model.<br>Please wait...</p>
              <progress value="0" id="progressBar"></progress>
              <span id="progressValue">0</span>&nbsp;%
            </div>
       </div>
   <?php
   }
   ?>
  </body>
</html>



