$(function () {

    Highcharts.setOptions({
        lang: {
            loading: 'Chargement...',
            months: ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre'],
            weekdays: ['Dimanche', 'Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi'],
            shortMonths: ['Jan', 'Fév', 'Mar', 'Avr', 'Mai', 'Juin', 'Juil', 'Aoû', 'Sep', 'Oct', 'Nov', 'Déc'],
            exportButtonTitle: "Exporter",
            printButtonTitle: "Imprimer",
            rangeSelectorFrom: "Du",
            rangeSelectorTo: "au",
            rangeSelectorZoom: "Période",
            downloadPNG: 'Télécharger en PNG',
            downloadJPEG: 'Télécharger en JPEG',
            downloadPDF: 'Télécharger en PDF',
            downloadSVG: 'Télécharger en SVG',
            resetZoom: "Réinitialiser le zoom",
            resetZoomTitle: "Réinitialiser le zoom",
            thousandsSep: " ",
            decimalPoint: ','
        }
    });

    $('#chartsContainer').highcharts({
        title: {
            text: 'Production et Consommation sur la semaine : '
        },
        tooltip: {
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name} : </td>' +
                '<td style="padding:0"><b>{point.y:.1f}</b></td></tr>',
            footerFormat: '</table>',
            shared: true,
            useHTML: true,
            xDateFormat: '%A %d %B %Y'
        },
        xAxis: {
            type: 'datetime',
            labels: {
                formatter: function () {
                    return Highcharts.dateFormat('%A %d %B', this.value);
                }
            },
            title: {
                text: "Jour" 
            },
            crosshair: true
        },
        yAxis: [{
            min: 0,
            title: {
                text: 'Puissance (kW)'
            }
        },{

            min: 0,
            title: {
                text: 'Consommation (kWh)'
            }

        }],
        plotOptions: {
            spline: {
                'lineWidth': 3.5,
                marker: {
                    enabled: true
                }
            }
        },
        series: [{
            name: 'Production photovoltaïque',
            type: 'spline',
            color: 'green',
            data: []
        },{
            name: 'Consommation de la Maison',
            type: 'spline',
            color: '#16a085',
            visible: false,
            data: []
        }]
    });

    $.ajax({
        url : 'photovoltaic/weeklyPhotovoltaicProduction',
        type : 'GET',
        dataType : 'json',
        data : { },
            
        beforeSend: function(){
        },
        success: function(resultat){

            if(resultat!=""){

                var chart = $('#chartsContainer').highcharts();

                for(i in resultat){

                    chart.series[0].addPoint([Date.UTC(resultat[i]["date"].split("-", [3])[0], resultat[i]["date"].split("-", [3])[1], resultat[i]["date"].split("-", [3])[2], "00", "00"), parseFloat(resultat[i]["value"])], true);

                }

            }else{

                swal({
                    title: "Données Introuvable !",   
                    text: "Désolé, mais aucune données n'a été trouvé pour cette année",
                    confirmButtonText: "Dommage", 
                    confirmButtonColor: "#C0392B",
                    imageUrl: "https://cdn3.iconfinder.com/data/icons/linecons-free-vector-icons-pack/32/data-64.png" 
                });

            }

        }

    });

    $.ajax({
        url : 'photovoltaic/weeklyHomeConsumption',
        type : 'GET',
        dataType : 'json',
        data : { },
            
        beforeSend: function(){
        },
        success: function(resultat){

            if(resultat!=""){

                var chart = $('#chartsContainer').highcharts();

                for(i in resultat){

                    chart.series[1].addPoint([Date.UTC(resultat[i]["date"].split("-", [3])[0], resultat[i]["date"].split("-", [3])[1], resultat[i]["date"].split("-", [3])[2], "00", "00"), parseFloat(resultat[i]["value"])], true);

                }

            }else{

                swal({
                    title: "Données Introuvable !",   
                    text: "Désolé, mais aucune données n'a été trouvé pour cette année",
                    confirmButtonText: "Dommage", 
                    confirmButtonColor: "#C0392B",
                    imageUrl: "https://cdn3.iconfinder.com/data/icons/linecons-free-vector-icons-pack/32/data-64.png" 
                });

            }

        }
            
    });

});