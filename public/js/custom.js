
function index(){
    axios.get("https://reto-askingroom.test/movies")
        .then(response => {
            console.log(response.data);
            for (var i = 0; i < 10; i++) {
                // Creamos las hileras de la tabla
                var fila = document.createElement("tr");
                for (var j = 0; j < 15; j++) {
                  // Crea un elemento <td> y un nodo de texto, hace que el nodo de
                  // texto sea el contenido de <td>, ubica el elemento <td> al final
                  // de la hilera de la tabla
                  var celda = document.createElement("td");
                  var textoCelda = document.createTextNode(i + " - " + j);
                  celda.appendChild(textoCelda);
                  fila.appendChild(celda);
                }
        })
        .catch(e => {
            // Capturamos los errores
        })
};
index();
function bootstrap_alert(elem, message, timeout) {
    $(elem).show().html('<div class="alert alert-info alert-dismissible"><button type="button" class="close" data-dismiss="alert" >&times;</button><span>'+message+'</span></div>');

    if (timeout || timeout === 0) {
      setTimeout(function() {
        $(elem).alert('close');
      }, timeout);
    }
};
$("#submit").click(function(event){
    event.preventDefault();

    var terms = document.getElementById("term").value;
    var years = document.getElementById("year").value;
    var url = document.getElementById("form").action;


    // axios.post(url,{
    //     term: terms,
    //     year: years,
    // })
    // .then(response => {
        bootstrap_alert('#form_errors', 'This message will fade out in 1 second', 1000)
    //     console.log(response.data);
    // })
    // .catch(e => {
    //     // Capturamos los errores
    // })
  });

