/* ==================================
 * X3DOM WebApp
 * ==================================
 * 
 * Copyright (c) 2013 X3DOMApp | Steven Birr | http://www.steven-birr.de
 * This application is dual licensed under the MIT and GPL licenses (see license.txt)
 * GPL 3.0: http://www.opensource.org/licenses/gpl-3.0.html
 * MIT: http://www.opensource.org/licenses/mit-license.php
 * 
 * Datei: myScript.js
 * 
 * Das Skript, dass gestartet wird, sobald die HTML-Seite geladen ist.
 * Hier wird die X3DOMApp initialisiert und diverse Member-Eigenschaften (z.B. Tooltip-Darstellung) gesetzt.
 * Über API-Aufrufe können Funktionen der X3DOMApp gestartet werden.
 */

var filename = "demoLiver"; // manuelle Angabe des X3D Files
$(document).ready(function()
{
    if (load3d)
    {
        x3domApp = new X3DOMApp();
        try
        {
            // Ist ein gültiger Dateiname angegeben?
            if (x3domApp.checkCase(filename))
            {
                x3domApp.annotationMode = false;
                x3domApp.setAppTitle("WebGL LiverAnatomyExplorer");
            }
        }
        catch (err)
        {
            x3domApp.showLoadingErrorMessage();
        }
    }
});

/* ---------------------------------------------------------------------------------------------------------------
 * Initialisiere die X3DOMApp erst, wenn die Seite komplett fertig geladen ist
 */
$(window).load(function()
{
    if (load3d)
    {
        x3domApp.initApp();
    }
});

function setExperimentalClickHandler()
{
    $("#Check_Tooltip").click(function()
    {
        if ($(this).is(":checked"))
        {
            x3domApp.show3DTooltips = true;
            x3domApp.show3DMouseOver = true;
        }
        else
        {
            x3domApp.show3DTooltips = false;
            x3domApp.show3DMouseOver = false;
        }
    });
}

/* ---------------------------------------------------------------------------------------------------------------
 * Individuell anpassbares User-Skript (wird nach (!) dem laden der X3D-Datei aufgerufen)
 */
function runMyScript()
{
    x3domApp.setAllDefaultCheckboxes();
    x3domApp.setAllDefault3DMouseOverHandler();
    setExperimentalClickHandler();
}

/* ---------------------------------------------------------------------------------------------------------------
 * Manueller ClickHandler
 * Beispiel:
 * 
   var checkbox1 = x3domApp.setCheckbox("Tumor", true, false); // Checkbox für X3D-Element mit ID "Tumor", Checkbox aktiviert und nicht disabled
   setMyClickHandler(checkbox1.checkbox); // Setzen eines ClickHandlers für diese Checkbox
   $("#id-of-my-div").append(checkbox1.checkboxAndLabel); // Die Checkbox zu einem DOM-Element hinzufügen und anzeigen
 */
/*
function setMyClickHandler(checkboxDOM)
{
    // Wenn die Checkbox nachträglich hinzugefügt wurde ("live"), den Clickhandler setzen
    $(checkboxDOM).live("click",function()
    { 
        var transp;
        var renderState;
        if ($(this).is(':checked'))
        {
            transp = 0.6;
            renderState = true;
        }
        else
        {
            transp = 1.0;
            renderState = false;
        }
        x3domApp.setX3DObjectRenderState("Tumor", renderState);
        x3domApp.setX3DObjectTransparency("Tumor", transp);
   });
}
*/