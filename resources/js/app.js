import 'ol/ol.css';
import Feature from 'ol/Feature';
import Map from 'ol/Map';
import View from 'ol/View';
import GeoJSON from 'ol/format/GeoJSON';
import Circle from 'ol/geom/Circle';
import {Draw, Modify, Snap} from 'ol/interaction';
import {Tile as TileLayer, Vector as VectorLayer} from 'ol/layer';
import {OSM, Vector as VectorSource} from 'ol/source';
import {Circle as CircleStyle, Fill, Stroke, Style} from 'ol/style';


var draw, snap; // global so we can remove them later


$(document).ready(function() {
    // tabs
    const hash = window.location.hash;
    hash && $('nav a[href="' + hash + '"]').tab('show');
    var maps = [];
    var sources = [];

    /**
     * Handle change event.
     */
    $("select.type").change(function(){
        const parent = $(this).parents(".tab-pane");
        const id = (parent.attr("id").slice(-1) - 1);
        maps[id].removeInteraction(draw);
        maps[id].removeInteraction(snap);
        addInteractions(id, $(this).val());
    });

    $(".map").each(function(index){
        const raster = new TileLayer({
            source: new OSM()
        });
        const version = index + 1;
        const data = mapdata[version];

        var source = new VectorSource();
        var center = [-11000000, 4600000];

        if(Object.keys(data).length !== 0){
             source = new VectorSource({
                features: (new GeoJSON()).readFeatures(data)
            });
            const feature = source.getFeatures()[0];
            if(feature !== undefined){
                const point = feature.getGeometry();
                const coordinates = point.getCoordinates();
                if(Array.isArray(coordinates[0][0])) {
                    console.log(coordinates[0]);
                    center = coordinates[0][0];
                } else if(Array.isArray(coordinates[0])) {
                        center = coordinates[0];

                } else {
                    center = coordinates;
                }
            }

        }

        sources.push(source);
        const vector = new VectorLayer({
            source: source,
            style: new Style({
                fill: new Fill({
                    color: 'rgba(255, 255, 255, 0.2)'
                }),
                stroke: new Stroke({
                    color: '#ffcc33',
                    width: 2
                }),
                image: new CircleStyle({
                    radius: 7,
                    fill: new Fill({
                        color: '#ffcc33'
                    })
                })
            })
        });

        const modify = new Modify({source: source});



        const map = new Map({
            layers: [raster, vector],
            target: 'map'+version,
            view: new View({
                center: center,
                zoom: 4
            })
        });
        maps.push(map);
    });

    $('.nav-tabs a').click(function (e) {
        $(this).tab('show');
        const scrollmem = $('body').scrollTop();
        window.location.hash = this.hash;
        $('html,body').scrollTop(scrollmem);
        const target = $(e.target).attr("href");
        if(target == "#nav-ap"){
            setTimeout(function() {
                maps[0].updateSize();
            }, 300);
        } else {
          const num = target.slice(-1);
          setTimeout(function() {
              maps[num-1].updateSize();
          }, 300);
        }
    });

    $(".clear").click(function(e){
        e.preventDefault();
        const parent = $(this).parents(".tab-pane");
        const id = (parent.attr("id").slice(-1) - 1);

        maps[id].getLayers().array_[1].getSource().clear()
    });

    $(".save").click(function(e){
        e.preventDefault();
        const parent = $(this).parents(".tab-pane");
        const id = (parent.attr("id").slice(-1) - 1);
        const version = parent.attr("id").slice(-1);
        const allFeatures = maps[id].getLayers().array_[1].values_.source.getFeatures();
        const format = new GeoJSON();
        const routeFeatures = format.writeFeatures(allFeatures);
        const searchid = $(".descform").data("searchid");
        const token = $(".descform input[name='_token']").val();
        $.post("/actionplan/update", {
            "version": version,
            "id": searchid,
            '_token':token,
            "mapembed":routeFeatures
        });
        $(".maplines").hide();

    });

    $(".edit").click(function(e){
        const parent = $(this).parents(".tab-pane");
        const id = parent.attr("id").slice(-1);
        const selection = parent.find(".maplines select").val();
        addInteractions((id-1), selection);
    });

    function addInteractions(id, select) {
        draw = new Draw({
            source: sources[id],
            type: select
        });

        maps[id].addInteraction(draw);
        snap = new Snap({source: sources[id]});
        maps[id].addInteraction(snap);

    }

});
