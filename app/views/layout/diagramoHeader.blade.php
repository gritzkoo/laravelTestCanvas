<script type="text/javascript" src="{{asset('assets/diagramo/diagramo/web/editor/assets/javascript/dropdownmenu.js') }}"></script>    

<link rel="stylesheet" media="screen" type="text/css" href="{{ asset('assets/diagramo/diagramo/web/editor/assets/css/style.css') }}" />
<link rel="stylesheet" media="screen" type="text/css" href="{{ asset('assets/diagramo/diagramo/web/editor/assets/css/minimap.css') }}" />

<script type="text/javascript" src="{{asset('assets/diagramo/diagramo/web/editor/assets/javascript/json2.js') }}"></script>
<script type="text/javascript" src="{{asset('assets/diagramo/diagramo/web/editor/assets/javascript/jquery-1.11.0.min.js') }}"></script>
<script type="text/javascript" src="{{asset('assets/diagramo/diagramo/web/editor/assets/javascript/ajaxfileupload.js') }}"></script>

<link type='text/css' href="{{ asset('assets/diagramo/diagramo/web/editor/assets/simplemodal/css/diagramo.css') }}" rel='stylesheet' media='screen' />
<script type="text/javascript" src="{{asset('assets/diagramo/diagramo/web/editor/assets/simplemodal/js/jquery.simplemodal.js') }}"></script>


<script type="text/javascript">
    /*Option 1:
     *We can use window.location like this:
     * url = window.location.protocol + window.location.hostname + ":" + window.location.port + ....
     * @see http://www.w3schools.com/jsref/obj_location.asp
     * 
     * Option 2:
     * Use http://code.google.com/p/js-uri/
     **/
    var appURL = "{{ Config::get('app.get') }}/assets/diagramo/diagramo/web";
    var figureSetsURL = appURL + '/editor/lib/sets';
    var insertImageURL = appURL + '/editor/data/import/';
    
    /**Run Diagramo in light mode (no server side)*/
    var light = true;

    function showImport(){
        //alert("ok");
        var r = confirm("Current diagram will be deleted. Are you sure?");
        if(r === true){                    
            $('#import-dialog').modal(); // jQuery object; this demo
        }                
    }
    
    function initLight(id){
        init(id);
        // fullVersionWarning();
    }
    
    /**
     * Shows a warning about feature not present in Light version
     * */
    /*function fullVersionWarning(){
        alert("Some features like: Save, Load, Print, Share, Export are
             not present in Light version of Diagramo due to technical reason.\n\
            Please download one of the full server versions like: LAMP or All-In-One to have them.");
    }*/
</script>

<script type="text/javascript" src="{{asset('assets/diagramo/diagramo/web/editor/lib/canvasprops.js') }}"></script>
<script type="text/javascript" src="{{asset('assets/diagramo/diagramo/web/editor/lib/style.js') }}"></script>
<script type="text/javascript" src="{{asset('assets/diagramo/diagramo/web/editor/lib/primitives.js') }}"></script>
<script type="text/javascript" src="{{asset('assets/diagramo/diagramo/web/editor/lib/ImageFrame.js') }}"></script>
<script type="text/javascript" src="{{asset('assets/diagramo/diagramo/web/editor/lib/matrix.js') }}"></script>
<script type="text/javascript" src="{{asset('assets/diagramo/diagramo/web/editor/lib/util.js') }}"></script>
<script type="text/javascript" src="{{asset('assets/diagramo/diagramo/web/editor/lib/key.js') }}"></script>
<script type="text/javascript" src="{{asset('assets/diagramo/diagramo/web/editor/lib/groups.js') }}"></script>
<script type="text/javascript" src="{{asset('assets/diagramo/diagramo/web/editor/lib/stack.js') }}"></script>
<script type="text/javascript" src="{{asset('assets/diagramo/diagramo/web/editor/lib/connections.js') }}"></script>
<script type="text/javascript" src="{{asset('assets/diagramo/diagramo/web/editor/lib/connectionManagers.js') }}"></script>
<script type="text/javascript" src="{{asset('assets/diagramo/diagramo/web/editor/lib/handles.js') }}"></script>


<script type="text/javascript" src="{{asset('assets/diagramo/diagramo/web/editor/lib/builder.js') }}"></script>        
<script type="text/javascript" src="{{asset('assets/diagramo/diagramo/web/editor/lib/text.js') }}"></script>
<script type="text/javascript" src="{{asset('assets/diagramo/diagramo/web/editor/lib/log.js') }}"></script>
<script type="text/javascript" src="{{asset('assets/diagramo/diagramo/web/editor/lib/text.js') }}"></script>
<script type="text/javascript" src="{{asset('assets/diagramo/diagramo/web/editor/lib/browserReady.js') }}"></script>
<script type="text/javascript" src="{{asset('assets/diagramo/diagramo/web/editor/lib/containers.js') }}"></script>
<script type="text/javascript" src="{{asset('assets/diagramo/diagramo/web/editor/lib/importer.js') }}"></script>
<script type="text/javascript" src="{{asset('assets/diagramo/diagramo/web/editor/lib/main.js') }}"></script>

<script type="text/javascript" src="{{asset('assets/diagramo/diagramo/web/editor/lib/sets/basic/basic.js') }}"></script>
<script type="text/javascript" src="{{asset('assets/diagramo/diagramo/web/editor/lib/sets/experimental/experimental.js') }}"></script>
<script type="text/javascript" src="{{asset('assets/diagramo/diagramo/web/editor/lib/sets/network/network.js') }}"></script>
<script type="text/javascript" src="{{asset('assets/diagramo/diagramo/web/editor/lib/sets/secondary/secondary.js') }}"></script>
<script type="text/javascript" src="{{asset('assets/diagramo/diagramo/web/editor/lib/sets/statemachine/statemachine.js') }}"></script>

<script type="text/javascript" src="{{asset('assets/diagramo/diagramo/web/editor/lib/minimap.js') }}"></script>

<script type="text/javascript" src="{{asset('assets/diagramo/diagramo/web/editor/lib/commands/History.js') }}"></script>

<script type="text/javascript" src="{{asset('assets/diagramo/diagramo/web/editor/lib/commands/FigureCreateCommand.js') }}"></script>
<script type="text/javascript" src="{{asset('assets/diagramo/diagramo/web/editor/lib/commands/FigureCloneCommand.js') }}"></script>
<script type="text/javascript" src="{{asset('assets/diagramo/diagramo/web/editor/lib/commands/FigureTranslateCommand.js') }}"></script>
<script type="text/javascript" src="{{asset('assets/diagramo/diagramo/web/editor/lib/commands/FigureRotateCommand.js') }}"></script>
<script type="text/javascript" src="{{asset('assets/diagramo/diagramo/web/editor/lib/commands/FigureScaleCommand.js') }}"></script>
<script type="text/javascript" src="{{asset('assets/diagramo/diagramo/web/editor/lib/commands/FigureZOrderCommand.js') }}"></script>
<script type="text/javascript" src="{{asset('assets/diagramo/diagramo/web/editor/lib/commands/FigureDeleteCommand.js') }}"></script>

<script type="text/javascript" src="{{asset('assets/diagramo/diagramo/web/editor/lib/commands/GroupRotateCommand.js') }}"></script>
<script type="text/javascript" src="{{asset('assets/diagramo/diagramo/web/editor/lib/commands/GroupScaleCommand.js') }}"></script>
<script type="text/javascript" src="{{asset('assets/diagramo/diagramo/web/editor/lib/commands/GroupCreateCommand.js') }}"></script>
<script type="text/javascript" src="{{asset('assets/diagramo/diagramo/web/editor/lib/commands/GroupCloneCommand.js') }}"></script>
<script type="text/javascript" src="{{asset('assets/diagramo/diagramo/web/editor/lib/commands/GroupDestroyCommand.js') }}"></script>
<script type="text/javascript" src="{{asset('assets/diagramo/diagramo/web/editor/lib/commands/GroupDeleteCommand.js') }}"></script>
<script type="text/javascript" src="{{asset('assets/diagramo/diagramo/web/editor/lib/commands/GroupTranslateCommand.js') }}"></script>


<script type="text/javascript" src="{{asset('assets/diagramo/diagramo/web/editor/lib/commands/ContainerCreateCommand.js') }}"></script>
<script type="text/javascript" src="{{asset('assets/diagramo/diagramo/web/editor/lib/commands/ContainerDeleteCommand.js') }}"></script>
<script type="text/javascript" src="{{asset('assets/diagramo/diagramo/web/editor/lib/commands/ContainerTranslateCommand.js') }}"></script>
<script type="text/javascript" src="{{asset('assets/diagramo/diagramo/web/editor/lib/commands/ContainerScaleCommand.js') }}"></script>

<script type="text/javascript" src="{{asset('assets/diagramo/diagramo/web/editor/lib/commands/ConnectorCreateCommand.js') }}"></script>
<script type="text/javascript" src="{{asset('assets/diagramo/diagramo/web/editor/lib/commands/ConnectorDeleteCommand.js') }}"></script>                                
<script type="text/javascript" src="{{asset('assets/diagramo/diagramo/web/editor/lib/commands/ConnectorAlterCommand.js') }}"></script>

<script type="text/javascript" src="{{asset('assets/diagramo/diagramo/web/editor/lib/commands/ShapeChangePropertyCommand.js') }}"></script>

<script type="text/javascript" src="{{asset('assets/diagramo/diagramo/web/editor/lib/commands/CanvasChangeColorCommand.js') }}"></script>
<script type="text/javascript" src="{{asset('assets/diagramo/diagramo/web/editor/lib/commands/CanvasChangeSizeCommand.js') }}"></script>

<script type="text/javascript" src="{{asset('assets/diagramo/diagramo/web/editor/lib/commands/InsertedImageFigureCreateCommand.js') }}"></script>


<script type="text/javascript" src="{{asset('assets/diagramo/diagramo/web/editor/assets/javascript/colorPicker_new.js') }}"></script>
<link rel="stylesheet" media="screen" type="text/css" href="{{ asset('assets/diagramo/diagramo/web/editor/assets/css/colorPicker_new.css') }}" />
