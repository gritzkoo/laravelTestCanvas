
function init() 
{
    // if (window.goSamples) goSamples();  // init for these samples -- you don't need to call this
    var GO = go.GraphObject.make;  // for conciseness in defining templates
    myDiagram =
      GO(go.Diagram, "myDiagram",  // must name or refer to the DIV HTML element
      {
          initialContentAlignment: go.Spot.Center,
          allowDrop: true,  // must be true to accept drops from the Palette
          "LinkDrawn": showLinkLabel,  // this DiagramEvent listener is defined below
          "LinkRelinked": showLinkLabel,
          "animationManager.duration": 800, // slightly longer than default (600ms) animation
          "undoManager.isEnabled": true  // enable undo & redo
      });
    // when the document is modified, add a "*" to the title and enable the "Save" button
    myDiagram.addDiagramListener("Modified", function(e) {
      var button = document.getElementById("SaveButton");
      if (button) button.disabled = !myDiagram.isModified;
      var idx = document.title.indexOf("*");
      if (myDiagram.isModified) {
        if (idx < 0) document.title += "*";
    } else {
        if (idx >= 0) document.title = document.title.substr(0, idx);
    }
});
    // helper definitions for node templates
    function nodeStyle() {
      return [
        // The Node.location comes from the "loc" property of the node data,
        // converted by the Point.parse static method.
        // If the Node.location is changed, it updates the "loc" property of the node data,
        // converting back using the Point.stringify static method.
        new go.Binding("location", "loc", go.Point.parse).makeTwoWay(go.Point.stringify),
        {
          // the Node.location is at the center of each node
          locationSpot: go.Spot.Center,
          //isShadowed: true,
          //shadowColor: "#888",
          // handle mouse enter/leave events to show/hide the ports
          mouseEnter: function (e, obj) { showPorts(obj.part, true); },
          mouseLeave: function (e, obj) { showPorts(obj.part, false); }
      }
      ];
  }
    // Define a function for creating a "port" that is normally transparent.
    // The "name" is used as the GraphObject.portId, the "spot" is used to control how links connect
    // and where the port is positioned on the node, and the boolean "output" and "input" arguments
    // control whether the user can draw links from or to the port.
    function makePort(name, spot, output, input) {
      // the port is basically just a small circle that has a white stroke when it is made visible
      return GO(go.Shape, "Circle",
      {
          fill: "transparent",
                  stroke: null,  // this is changed to "white" in the showPorts function
                  desiredSize: new go.Size(8, 8),
                  alignment: spot, alignmentFocus: spot,  // align the port on the main Shape
                  portId: name,  // declare this object to be a "port"
                  fromSpot: spot, toSpot: spot,  // declare where links may connect at this port
                  fromLinkable: output, toLinkable: input,  // declare whether the user may draw links to/from here
                  cursor: "pointer"  // show a different cursor to indicate potential link point
              });
  }
    // define the Node templates for regular nodes
    var lightText = 'whitesmoke';
    myDiagram.nodeTemplateMap.add("",  // the default category
      GO(go.Node, "Spot", nodeStyle(),
        // the main object is a Panel that surrounds a TextBlock with a rectangular Shape
        GO(go.Panel, "Auto",
          GO(go.Shape, "Rectangle",
            { fill: "#fff", stroke: '#000' },
            new go.Binding("figure", "figure")),
          GO(go.TextBlock,
          {
              font: "bold 11pt Helvetica, Arial, sans-serif",
              stroke: '#454545',
              margin: 8,
              maxSize: new go.Size(160, NaN),
              wrap: go.TextBlock.WrapFit,
              editable: true
          },
          new go.Binding("text").makeTwoWay())
          ),
        // four named ports, one on each side:
        makePort("T", go.Spot.Top, false, true),
        makePort("L", go.Spot.Left, true, true),
        makePort("R", go.Spot.Right, true, true),
        makePort("B", go.Spot.Bottom, true, false)
        ));
    myDiagram.nodeTemplateMap.add("Start",
      GO(go.Node, "Spot", nodeStyle(),
        GO(go.Panel, "Auto",
          GO(go.Shape, "Circle",
            { minSize: new go.Size(40, 40), fill: "#79C900", stroke: null }),
          GO(go.TextBlock, "Start",
            { font: "bold 11pt Helvetica, Arial, sans-serif", stroke: lightText },
            new go.Binding("text"))
          ),
        // three named ports, one on each side except the top, all output only:
        makePort("L", go.Spot.Left, true, false),
        makePort("R", go.Spot.Right, true, false),
        makePort("B", go.Spot.Bottom, true, false)
        ));
    myDiagram.nodeTemplateMap.add("End",
      GO(go.Node, "Spot", nodeStyle(),
        GO(go.Panel, "Auto",
          GO(go.Shape, "Circle",
            { minSize: new go.Size(40, 40), fill: "#DC3C00", stroke: null }),
          GO(go.TextBlock, "End",
            { font: "bold 11pt Helvetica, Arial, sans-serif", stroke: lightText },
            new go.Binding("text"))
          ),
        // three named ports, one on each side except the bottom, all input only:
        makePort("T", go.Spot.Top, false, true),
        makePort("L", go.Spot.Left, false, true),
        makePort("R", go.Spot.Right, false, true)
        ));
    myDiagram.nodeTemplateMap.add("Comment",
      GO(go.Node, "Auto", nodeStyle(),
        GO(go.Shape, "File",
          { fill: "#EFFAB4", stroke: null }),
        GO(go.TextBlock,
        {
            margin: 5,
            maxSize: new go.Size(200, NaN),
            wrap: go.TextBlock.WrapFit,
            textAlign: "center",
            editable: true,
            font: "bold 12pt Helvetica, Arial, sans-serif",
            stroke: '#454545'
        },
        new go.Binding("text").makeTwoWay())
        // no ports, because no links are allowed to connect with a comment
        ));

    //gritzko palet parts_________________________________________________________________________________________________
    myDiagram.nodeTemplateMap.add("relacionado",  // the default category
      GO(go.Node, "Spot", nodeStyle(),
        // the main object is a Panel that surrounds a TextBlock with a rectangular Shape
        GO(go.Panel, "Auto",
          GO(go.Shape, "Rectangle",
            { fill: "#fff200", stroke: "#ff0506" },
            new go.Binding("figure", "figure")),
          GO(go.TextBlock,
          {
              font: "bold 11pt Helvetica, Arial, sans-serif",
              stroke: '#454545',
              margin: 8,
              maxSize: new go.Size(160, NaN),
              wrap: go.TextBlock.WrapFit,
              editable: true
          },
          new go.Binding("text").makeTwoWay())
          ),
        // four named ports, one on each side:
        makePort("T", go.Spot.Top, false, true),
        makePort("L", go.Spot.Left, true, true),
        makePort("R", go.Spot.Right, true, true),
        makePort("B", go.Spot.Bottom, true, false)
        ));


    myDiagram.nodeTemplateMap.add("complementar",  // the default category
      GO(go.Node, "Spot", nodeStyle(),
        // the main object is a Panel that surrounds a TextBlock with a rectangular Shape
        GO(go.Panel, "Auto",
          GO(go.Shape, "File",
            { fill: "#fff", stroke: "#000" },
            new go.Binding("figure", "figure")),
          GO(go.TextBlock,
          {
              font: "bold 11pt Helvetica, Arial, sans-serif",
              stroke: '#454545',
              margin: 8,
              maxSize: new go.Size(160, NaN),
              wrap: go.TextBlock.WrapFit,
              editable: true
          },
          new go.Binding("text").makeTwoWay())
          ),
        // four named ports, one on each side:
        makePort("T", go.Spot.Top, false, true),
        makePort("L", go.Spot.Left, true, true),
        makePort("R", go.Spot.Right, true, true),
        makePort("B", go.Spot.Bottom, true, false)
        ));

    myDiagram.nodeTemplateMap.add("critico",  // the default category
      GO(go.Node, "Spot", nodeStyle(),
        // the main object is a Panel that surrounds a TextBlock with a rectangular Shape
        GO(go.Panel, "Auto",
          GO(go.Shape, "Rectangle",
            { fill: "#fff", stroke: "#000", strokeWidth: 6 },
            new go.Binding("figure", "figure")),
          GO(go.TextBlock,
          {
              font: "bold 11pt Helvetica, Arial, sans-serif",
              stroke: '#454545',
              margin: 8,
              maxSize: new go.Size(160, NaN),
              wrap: go.TextBlock.WrapFit,
              editable: true
          },
          new go.Binding("text").makeTwoWay())
          ),
        // four named ports, one on each side:
        makePort("T", go.Spot.Top, false, true),
        makePort("L", go.Spot.Left, true, true),
        makePort("R", go.Spot.Right, true, true),
        makePort("B", go.Spot.Bottom, true, false)
        ));

    myDiagram.nodeTemplateMap.add("automatico",  // the default category
      GO(go.Node, "Spot", nodeStyle(),
        // the main object is a Panel that surrounds a TextBlock with a rectangular Shape
        GO(go.Panel, "Auto",
          GO(go.Shape, "Rectangle",
            { fill: "#9b9999", stroke: "#000", strokeWidth: 1 },
            new go.Binding("figure", "figure")),
          GO(go.TextBlock,
          {
              font: "bold 11pt Helvetica, Arial, sans-serif",
              stroke: '#454545',
              margin: 8,
              maxSize: new go.Size(160, NaN),
              wrap: go.TextBlock.WrapFit,
              editable: true
          },
          new go.Binding("text").makeTwoWay())
          ),
        // four named ports, one on each side:
        makePort("T", go.Spot.Top, false, true),
        makePort("L", go.Spot.Left, true, true),
        makePort("R", go.Spot.Right, true, true),
        makePort("B", go.Spot.Bottom, true, false)
        ));

    myDiagram.nodeTemplateMap.add("especifico",  // the default category
      GO(go.Node, "Spot", nodeStyle(),
        // the main object is a Panel that surrounds a TextBlock with a rectangular Shape
        GO(go.Panel, "Auto",
          GO(go.Shape, "Rectangle",
            { fill: "#fff", stroke: "#ff0506", strokeWidth: 1, strokeDashArray: [4,2] },
            new go.Binding("figure", "figure")),
          GO(go.TextBlock,
          {
              font: "bold 11pt Helvetica, Arial, sans-serif",
              stroke: '#454545',
              margin: 8,
              maxSize: new go.Size(160, NaN),
              wrap: go.TextBlock.WrapFit,
              editable: true
          },
          new go.Binding("text").makeTwoWay())
          ),
        // four named ports, one on each side:
        makePort("T", go.Spot.Top, false, true),
        makePort("L", go.Spot.Left, true, true),
        makePort("R", go.Spot.Right, true, true),
        makePort("B", go.Spot.Bottom, true, false)
        ));
    //__________________________________
    // replace the default Link template in the linkTemplateMap
    myDiagram.linkTemplate =
      GO(go.Link,  // the whole link panel
      {
          routing: go.Link.AvoidsNodes,
          curve: go.Link.JumpOver,
          corner: 5, toShortLength: 4,
          relinkableFrom: true,
          relinkableTo: true,
          reshapable: true,
          resegmentable: true,
          // mouse-overs subtly highlight links:
          mouseEnter: function(e, link) { link.findObject("HIGHLIGHT").stroke = "rgba(30,144,255,0.2)"; },
          mouseLeave: function(e, link) { link.findObject("HIGHLIGHT").stroke = "transparent"; }
      },
      new go.Binding("points").makeTwoWay(),
        GO(go.Shape,  // the highlight shape, normally transparent
          { isPanelMain: true, strokeWidth: 8, stroke: "transparent", name: "HIGHLIGHT" }),
        GO(go.Shape,  // the link path shape
          { isPanelMain: true, stroke: "gray", strokeWidth: 2 }),
        GO(go.Shape,  // the arrowhead
          { toArrow: "standard", stroke: null, fill: "gray"}),
        GO(go.Panel, "Auto",  // the link label, normally not visible
          { visible: false, name: "LABEL", segmentIndex: 2, segmentFraction: 0.5},
          new go.Binding("visible", "visible").makeTwoWay(),
          GO(go.Shape, "RoundedRectangle",  // the label shape
            { fill: "#F8F8F8", stroke: null }),
          GO(go.TextBlock, "Yes",  // the label
          {
              textAlign: "center",
              font: "10pt helvetica, arial, sans-serif",
              stroke: "#333333",
              editable: true
          },
          new go.Binding("text", "text").makeTwoWay())
          )
        );
    // Make link labels visible if coming out of a "conditional" node.
    // This listener is called by the "LinkDrawn" and "LinkRelinked" DiagramEvents.
    function showLinkLabel(e) {
      var label = e.subject.findObject("LABEL");
      if (label !== null) label.visible = (e.subject.fromNode.data.figure === "Diamond");
  }
    // temporary links used by LinkingTool and RelinkingTool are also orthogonal:
    myDiagram.toolManager.linkingTool.temporaryLink.routing = go.Link.Orthogonal;
    myDiagram.toolManager.relinkingTool.temporaryLink.routing = go.Link.Orthogonal;
    //load();  // load an initial diagram from some JSON text
    // initialize the Palette that is on the left side of the page
    myPalette =
      GO(go.Palette, "myPalette",  // must name or refer to the DIV HTML element
      {
          "animationManager.duration": 800, // slightly longer than default (600ms) animation
          nodeTemplateMap: myDiagram.nodeTemplateMap,  // share the templates used by myDiagram
          model: new go.GraphLinksModel([  // specify the contents of the Palette
            { category: "Comment", text: "Comentário" },
            { text: "???", figure: "Rectangle" },
            { category: "relacionado", text: "IC ou IV Relacionado" },
            { category: "complementar", text: "Tarefa complementar" },
            { category: "critico", text: "Tarefa Crítica" },
            { category: "Start", text: "Início" },
            { category: "automatico", text: "Tarefa Automática" },
            { category: "especifico", text: "Tarefa Específica" },
            { text: "???", figure: "Diamond" },
            { text: "???", figure: "Circle" },
            { category: "End", text: "Fim" }
            ])
      });
  }
  // Make all ports on a node visible when the mouse is over the node
  function showPorts(node, show) {
    var diagram = node.diagram;
    if (!diagram || diagram.isReadOnly || !diagram.allowLink) return;
    node.ports.each(function(port) {
        port.stroke = (show ? "white" : null);
    });
}
  // Show the diagram's model in JSON format that the user may edit
  function save() {
    document.getElementById("mySavedModel").value = myDiagram.model.toJson();
    myDiagram.isModified = false;

    $("#myDiagram").find('canvas').attr('id','myCanvas');
    var canvas = document.getElementById("myCanvas");
    var img    = canvas.toDataURL("image/png");
    var t = img.split('base64,');
    $("#imagem").val(t[1]);
    var la = '<img src="'+img+'" />';
    $("body").append(la);
}
function load() {
    myDiagram.model = go.Model.fromJson(document.getElementById("mySavedModel").value);
}
  // add an SVG rendering of the diagram at the end of this page
  function makeSVG() {
    var svg = myDiagram.makeSvg({
        scale: 0.5
    });
    svg.style.border = "1px solid black";
    obj = document.getElementById("SVGArea");
    obj.appendChild(svg);
    if (obj.children.length > 0) {
      obj.replaceChild(svg, obj.children[0]);
  }
}

