@extends('layout.diagramo')
{{-- page title --}}
@section('title','Diagramo Plugin')
{{-- scripts includes --}}
@section('scripts')
@stop
{{-- main page content --}}
@section('content')




<div id="actions">
                
    <a href="javascript:action('connector-straight');"  title="Straight connector"><img src="{{asset('assets/diagramo/diagramo/web/editor/assets/images/icon_connector_straight.gif') }}" border="0"/></a>

    <img class="separator" src="{{asset('assets/diagramo/diagramo/web/editor/assets/images/toolbar_separator.gif') }}" border="0" width="1" height="16"/>
    
    <a href="javascript:action('connector-jagged');" title="Jagged connector"><img src="{{asset('assets/diagramo/diagramo/web/editor/assets/images/icon_connector_jagged.gif') }}" border="0"/></a>
    
    <img class="separator" src="{{asset('assets/diagramo/diagramo/web/editor/assets/images/toolbar_separator.gif') }}" border="0" width="1" height="16"/>
    
    <a href="javascript:action('connector-organic');" title="Organic connector (Experimental)"><img src="{{asset('assets/diagramo/diagramo/web/editor/assets/images/icon_connector_organic.gif') }}" border="0" alt="Organic"/></a>
    
    <img class="separator" src="{{asset('assets/diagramo/diagramo/web/editor/assets/images/toolbar_separator.gif') }}" border="0" width="1" height="16"/>
    
    <a href="javascript:action('container');" title="Container (Experimental)"><img src="{{asset('assets/diagramo/diagramo/web/editor/assets/images/container.png') }}" border="0" alt="Container"/></a>
    
    <img class="separator" src="{{asset('assets/diagramo/diagramo/web/editor/assets/images/toolbar_separator.gif') }}" border="0" width="1" height="16"/>            
                
    <input type="checkbox" onclick="showGrid();" id="gridCheckbox"  title="Show grid" /> <span class="toolbarText">Show grid</span>
    
    <img class="separator" src="{{asset('assets/diagramo/diagramo/web/editor/assets/images/toolbar_separator.gif') }}" border="0" width="1" height="16"/>
    
    <input type="checkbox" onclick="snapToGrid();" id="snapCheckbox" title="Snap elements to grid" /> <span class="toolbarText">Snap to grid</span>
    
    <img class="separator" src="{{asset('assets/diagramo/diagramo/web/editor/assets/images/toolbar_separator.gif') }}" border="0" width="1" height="16"/>

    <a href="javascript:action('front');" title="Move to front"><img src="{{asset('assets/diagramo/diagramo/web/editor/assets/images/icon_front.gif') }}" border="0"/></a>
    
    <img class="separator" src="{{asset('assets/diagramo/diagramo/web/editor/assets/images/toolbar_separator.gif') }}" border="0" width="1" height="16"/>
    
    <a href="javascript:action('back');" title="Move to back"><img src="{{asset('assets/diagramo/diagramo/web/editor/assets/images/icon_back.gif') }}" border="0"/></a>
    
    <img class="separator" src="{{asset('assets/diagramo/diagramo/web/editor/assets/images/toolbar_separator.gif') }}" border="0" width="1" height="16"/>
    
    <a href="javascript:action('moveforward');" title="Move (one level) to front"><img src="{{asset('assets/diagramo/diagramo/web/editor/assets/images/icon_forward.gif') }}" border="0"/></a>
    
    <img class="separator" src="{{asset('assets/diagramo/diagramo/web/editor/assets/images/toolbar_separator.gif') }}" border="0" width="1" height="16"/>
    
    <a href="javascript:action('moveback');" title="Move (one level) back"><img src="{{asset('assets/diagramo/diagramo/web/editor/assets/images/icon_backward.gif') }}" border="0"/></a>

    
    
    <img class="separator" src="{{asset('assets/diagramo/diagramo/web/editor/assets/images/toolbar_separator.gif') }}" border="0" width="1" height="16"/>
    <a href="javascript:action('group');" title="Group (Ctrl-G)"><img src="{{asset('assets/diagramo/diagramo/web/editor/assets/images/group.gif') }}" border="0"/></a>
    
    <img class="separator" src="{{asset('assets/diagramo/diagramo/web/editor/assets/images/toolbar_separator.gif') }}" border="0" width="1" height="16"/>
    <a href="javascript:action('ungroup');" title="Ungroup (Ctrl-U)"><img src="{{asset('assets/diagramo/diagramo/web/editor/assets/images/ungroup.gif') }}" border="0"/></a>

    <img class="separator" src="{{asset('assets/diagramo/diagramo/web/editor/assets/images/toolbar_separator.gif') }}" border="0" width="1" height="16"/>
    
    <a href="javascript:createFigure(figure_Text);"  title="Add text"><img  src="{{asset('assets/diagramo/diagramo/web/editor/assets/images/text.gif') }}" border="0" height ="16"/></a>
    <img class="separator" src="{{asset('assets/diagramo/diagramo/web/editor/assets/images/toolbar_separator.gif') }}" border="0" width="1" height="16"/>
    
    <a href="javascript:showInsertImageDialog();"  title="Add image"><img src="{{asset('assets/diagramo/diagramo/web/editor/assets/images/image.gif') }}" border="0" height ="16" alt="Image"/></a>
    <img class="separator" src="{{asset('assets/diagramo/diagramo/web/editor/assets/images/toolbar_separator.gif') }}" border="0" width="1" height="16"/>

    <a href="javascript:action('undo');" title="Undo (Ctrl-Z)"><img src="{{asset('assets/diagramo/diagramo/web/editor/assets/images/arrow_undo.png') }}" border="0"/></a>
    <!-- TODO: From Janis: we have to create a nice icon for duplicate, currently this is the only command without an icon -->
    <!--
    <a href="javascript:action('duplicate');">Copy (Ctrl-D)</a>
    -->
    
    <!-- <a href="javascript:action('redo');" title="Redo (Ctrl-Y)"><img src="{{asset('assets/diagramo/diagramo/web/editor/assets/images/arrow_redo.png') }}" border="0"/></a> -->
    <!--
    <input type="text" id="output" />                
    <img style="vertical-align:middle;" src="{{asset('assets/diagramo/diagramo/web/editor/') }}../assets/images/toolbar_separator.gif" border="0" width="1" height="16"/>
    <a href="javascript:action('duplicate');">Copy</a>
    <img style="vertical-align:middle;" src="{{asset('assets/diagramo/diagramo/web/editor/') }}../assets/images/toolbar_separator.gif" border="0" width="1" height="16"/>
    <a href="javascript:action('group');">Group</a>
    <img style="vertical-align:middle;" src="{{asset('assets/diagramo/diagramo/web/editor/') }}../assets/images/toolbar_separator.gif" border="0" width="1" height="16"/>
    <a href="javascript:action('ungroup');">Ungroup</a>
    -->
</div>
<div style="width:100%;">
	
    <div id="editor" style="top:85px;">
        <div id="figures">
            <select style="width: 120px;" onchange="setFigureSet(this.options[this.selectedIndex].value);">
                <script type="text/javascript">
                    for(var setName in figureSets){
                        var set = figureSets[setName];
                        document.write('<option value="' + setName + '">' + set['name'] + '</option>');
                    }
                </script>
            </select>
            
            <script>
                /**Builds the figure panel*/
                function buildPanel()
                {
                    //var first = true;
                    var firstPanel = true;
                    for(var setName in figureSets)
                    {                            
                        var set = figureSets[setName];
                        
                        //creates the div that will hold the figures
                        var eSetDiv = document.createElement('div');
                        eSetDiv.setAttribute('id', setName);
                        //eSetDiv.style.border = '1px solid green';
                        if(firstPanel) {
                            firstPanel = false;
                        }
                        else{
                            eSetDiv.style.display = 'none';
                        }
                        document.getElementById('figures').appendChild(eSetDiv);
                        
                        //add figures to the div
                        for(var figure in set['figures']){
                            figure = set['figures'][figure];
                            
                            var figureFunctionName = 'figure_' + figure.figureFunction;                                
                            var figureThumbURL = "{{ Config::get('app.url') }}/assets/diagramo/diagramo/web/editor/lib/sets/" + setName + '/' + figure.image;
                            
                            var eFigure = document.createElement('img');
                            eFigure.setAttribute('src', figureThumbURL);
                            
                            eFigure.addEventListener('mousedown', function (figureFunction, figureThumbURL){                                    
                                return function(evt) {
                                    evt.preventDefault();
                                    //Log.info("editor.php:buildPanel: figureFunctionName:" + figureFunctionName);
                                    
                                    createFigure(window[figureFunction] /*we need to search for function in window namespace (as all that we have is a simple string)**/
                                        ,figureThumbURL);
                                };
                            } (figureFunctionName, figureThumbURL)
                            , false);

                            //in case use drops the figure
                            eFigure.addEventListener('mouseup', function (){
                                createFigureFunction = null;    
                                selectedFigureThumb = null;
                                state = STATE_NONE;
                            }
                            , false);                                                                                                
                            
                            
                            eFigure.style.cursor = 'pointer';
                            eFigure.style.marginRight = '5px';
                            eFigure.style.marginTop = '2px';
                            
                            eSetDiv.appendChild(eFigure);
                        }
                    }
                }
                
                buildPanel();
                
               // var first = true;
               // for(var setName in figureSets){
                   
               //     document.write('<div id="' + setName + '" ' + (!first ? 'style="display: none"' : '')+'>');
               //     document.write('<table border="0" cellpadding="0" cellspacing="0" width="120">');
               //     var counter = 0;
               //     var set = figureSets[setName];
               //     for(var figure in set['figures']){
               //         figure = set['figures'][figure];
               //         if(counter % 3 == 0){
               //             document.write('<tr>');
               //         }
                       
               //         var figureFunctionName = 'figure_' + figure.figureFunction;
               //         var figureThumbURL = 'lib/sets/' + setName + '/' + figure.image;
                       
               //         document.write('<td align="center">');
               //         document.write('<a href="javascript:createFigure(' + figureFunctionName + "," + "'" + figureThumbURL + "'" + ');">');
                       
               //         //TODO: how to prevent default behaviour?
               //         var figureImageId = 'fig' + setName + '_' + figure.figureFunction;
               //         document.write('<img id="' + figureImageId +'" onmousedown="javascript:createFigure(' + figureFunctionName + "," + "'" + figureThumbURL + "'" + ');" src="{{asset('assets/diagramo/diagramo/web/editor/') }}' + figureThumbURL + '" border="0" alt="'+ figure.figureFunction + '" />');
                       
               //         var figureImageElem = document.getElementById(figureImageId);
               //         figureImageId.onMouseDown = function(evt){
               //             alert('I am here');
               //             evt.preventDefault();
               //         }
                       
               //         //document.write('</a>');
               //         document.write('</td>');
                       
               //         counter ++;
               //         if(counter % 3 == 0){
               //             document.write('</tr>');
               //         }
               //     }
               //     if(counter % 3 != 0){
               //         document.write('</tr>');
               //     }
               //     document.write('</table></div>');
               //     first = false;
               // }
            </script>
            
            <div style="display:none;" id="more">
                More sets of figures <a hresf="http://diagramo.com/figures.php" target="_blank">here</a>
            </div>
        </div>
        
        <!--THE canvas-->
        <div style="width: 100%">
            <div  id="container" style="top:90px;">
                <canvas id="a" width="800" height="600">
                    Your browser does not support HTML5. Please upgrade your browser to any modern version.
                </canvas>
                <div id="text-editor"></div>
                <div id="text-editor-tools"></div>
            </div>
        </div>
        
        <!--Right panel-->
        <div id="right">
            <center>
                <div id="minimap">
                </div>
            </center>
            <div style="overflow: scroll;" id="edit">
            </div>
        </div>
        
    </div> 
</div>
        
        
        
        

        <script type="text/javascript">
            function loadFill(check){
                if(check.checked === true){
                    if($('#colorpickerHolder3').css('display') === 'none'){
                        $('#colorSelector3').click();
                    }
                }
                else{
                    if($('#colorpickerHolder3').css('display') === 'block'){
                        $('#colorSelector3').click();
                    }
                }
            }
        </script>
        

    	<style type="text/css">
    		div.label{
    			background-color: #F6F6F6;
    		}
    		#edit div.line {
    			height: 50px;
    		}
        </style>
@stop