// Funcion de alerta para mostrar alertas
function alert_message(elem, message, type, timeout) {
    $(elem)
        .show()
        .html(
            '<div id="alert-m" class="alert alert-' +
                type +
                ' show "><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><span>' +
                message +
                "</span></div>"
        );
    if (timeout || timeout == 0) {
        setTimeout(function() {
            $(elem).hide();
        }, timeout);
    }
}
//Solicitud pedir todas las peliculas
document.addEventListener("DOMContentLoaded", function() {
    axios
        .get("/movies")
        .then(response => {
            var json = response.data;
            var salida = "";
            for (var i = 0; i < json.length; i++) {
                salida +=
                    '<tr>' +
                    '<td class="align-middle" >' +
                    i +
                    '</td>' +
                    '<td class="align-middle">' +
                    json[i].title +
                    '</td>' +
                    '<td class="align-middle">' +
                    json[i].imdbid +
                    '</td>' +
                    '<td class="align-middle">' +
                    json[i].type +
                    '</td>' +
                    '<td class="align-middle">' +
                    json[i].year +
                    '</td>' +
                    '<td class="align-middle"><img class="avatar" height="100px" src="' +
                    json[i].poster +
                    '"/></td>' +
                    '<td class="align-middle"><a  onclick="show(' +
                    json[i].id +
                    ')" class="btn btn-info" >open</a></td>' +
                    '</tr>';
            }

            document.getElementById("indexview").innerHTML = salida;
        })
        .catch(e => {
            alert_message("#alert-message", 'Error when obtaining listing. Try again', "danger", 10000);
        });
});

// solicitud sincronizar peliculas
$("#submit").click(function(event) {
    event.preventDefault();
    alert_message("#alert-message", "one moment we are synchronizing the films", "info", 5000);
    var terms = document.getElementById("term").value;
    var years = document.getElementById("year").value;
    var url = document.getElementById("form").action;

    axios
        .post(url, {
            term: terms,
            year: years
        })
        .then(response => {
            alert_message("#alert-message", response.data, "success", 4000);
            setTimeout(function() {
                location.reload();
            }, 4000);
        })
        .catch(e => {
            alert_message("#alert-message", e, "danger", 4000);
        });
});
// Solicitud de una sola pelicula
function show(id) {
    var url = "/movies/" + id;

    axios
    .get(url)
    .then(response => {
        console.log(response.data);
        document.getElementById("title-show").innerHTML = response.data.title;
        document.getElementById("imdbid-show").innerHTML = response.data.imdbid;
        document.getElementById("year-show").innerHTML = response.data.year;
        document.getElementById("type-show").innerHTML = response.data.type;
        document.getElementById("poster-show").innerHTML = '<img class="avatar" width="100%" src="'+response.data.poster+'">';
        document.getElementById("button-show").innerHTML = '<a type="button" target="_blank" href="https://www.imdb.com/title/'+response.data.imdbid+'/" class="btn btn-danger">open movie</a>';
        $('#myModal').modal('show');

        })
        .catch(e => {
            alert_message("#alert-message", e, "danger", 3000);
        });
}
