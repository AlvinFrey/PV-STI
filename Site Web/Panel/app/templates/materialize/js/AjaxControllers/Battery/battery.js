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
        chart: {
            type: 'column'
        },
        title: {
            text: 'Pourcentage sur la semaine : '
        },
        tooltip: {
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name} : </td>' +
                '<td style="padding:0"><b>{point.y:.1f} %</b></td></tr>',
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
        yAxis: {
            min: 0,
            title: {
                text: 'Pourcentage (%)'
            }
        },
        plotOptions: {
            column: {
                pointPadding: 0.2,
                borderWidth: 0
            }
        },
        series: [{
            name: 'Pourcentage des batteries',
            color: '#16a085',
            data: []
        }]
    });

    $.ajax({
        url : 'battery/weeklyBatteryPercentage',
        type : 'GET',
        dataType : 'json',
        data : { },
            
        beforeSend: function(){
        },
        success: function(resultat){

            if(resultat!=""){

                var chart = $('#chartsContainer').highcharts();

                for(i in resultat){
                    
                    chart.series[0].addPoint([Date.UTC(resultat[i]["date"].split("-", [3])[0], resultat[i]["date"].split("-", [3])[1] - 1 , resultat[i]["date"].split("-", [3])[2], "00", "00"), parseFloat(resultat[i]["value"])], true);

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

