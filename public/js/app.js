var origem = 'Salvador, Bahia';
var destino = 'Salvador, Bahia';
var preco;
var distancia = 0;

var updateData  = function() {
    origem = $("#origem").val();
    destino = $("#destino").val();
    initMap();

};

var initMap  = function() {
    var service = new google.maps.DistanceMatrixService;
    service.getDistanceMatrix({
        origins: [origem],
        destinations: [destino],
        travelMode: 'DRIVING',
        unitSystem: google.maps.UnitSystem.METRIC,
        avoidHighways: false,
        avoidTolls: false
    }, function(response, status) {
        if (status !== 'OK') {
            alert('Error was: ' + status);
        }
        else {
            $("#distancia").val(response.rows[0].elements[0].distance.value);
            $("#tempo").val(response.rows[0].elements[0].duration.text);
            $("#duracao").text(response.rows[0].elements[0].duration.text);
            $("#percurso").text(response.rows[0].elements[0].distance.text);
            distancia =response.rows[0].elements[0].distance.value;
            preco = 20 + 0.00175 * response.rows[0].elements[0].distance.value + 0.90 * parseInt($("#peso").val()) + 0.50 * $("#volume").val();
            $("#valor").val(preco);
            $("#preco").text(preco.toFixed(2));
            if ($('#fragil').is(":checked")) preco *= 1.2;
        }
    });
};
