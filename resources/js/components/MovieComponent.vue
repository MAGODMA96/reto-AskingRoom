<template>
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">view and synchronize movies</div>
        </div>
        <div class="jumbotron jumbotron-fluid m-0 p-2">
            <div class="row">
                <div class="col-12">
                    <div class="row d-flex justify-content-center">
                        <div class="form-group col-6">
                            <input type="text" class="form-control" id="search" v-model="search" placeholder="Palabra a buscar">
                        </div>
                        <div class="form-group col-6">
                            <select id="year" class="form-control" v-model="year">
                                <option value="" hidden selected>Año</option>
                                <option value="2020">2020</option>
                                <option value="2019">2019</option>
                                <option value="2018">2018</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 d-flex justify-content-center">
                            <button class="btn btn-primary" @click="guardar_movie()">Sincronizar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card m-0">
            <div class="table-responsive">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">title</th>
                    <th scope="col">imdbid</th>
                    <th scope="col">type</th>
                    <th scope="col">year</th>
                    <th scope="col">image</th>
                    <th scope="col">action</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="movie in movies" :key="movie.id">
                    <td class="text-md-center align-middle" v-text="movie.id"></td>
                    <td class="text-md-center align-middle" v-text="movie.title"></td>
                    <td class="text-md-center align-middle" v-text="movie.imdbid"></td>
                    <td class="text-md-center align-middle" v-text="movie.type"></td>
                    <td class="text-md-center align-middle" v-text="movie.year"></td>
                    <td class="text-md-center align-middle"><img class="avatar img-fluid" width="100px" :src="movie.poster"></td>
                    <td class="text-md-center align-middle">
                        <button class="btn btn-primary m-2" @click="editar_movie(movie)">Ver</button>
                        <button class="btn btn-danger" @click="eliminar_movie(movie.id)">Eliminar</button>
                    </td>

                </tr>
                </tbody>

            </table>
            </div>
        </div>

    </div>
  </div>


  <div class="modal" id="modal_movies" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Datos Peliculas</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">


        <div class="container-fluid">
              <div class="row">
                <div class="col-md-6"><img class="avatar" width="100%" :src="poster">
                </div>
                <div class="col-md-6 ml-auto">
                    <input type="text" class="form-control d-none" v-model="id">
                    <p><strong>Title:</strong> <span v-text="title"></span></p>
                    <p><strong>Imdbid:</strong> <span v-text="imdbid"></span></p>
                    <p><strong>Year:</strong> <span v-text="year"></span></p>
                    <p><strong>Type:</strong> <span v-text="type"></span></p>
                    <a type="button" target="_blank" :href="'https://www.imdb.com/title/'+imdbid+'/'"  class="btn btn-danger">open movie</a>
                </div>
              </div>
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
</div>

</template>

<script>
    export default {
      data() {
        return{
          movies: [],
          search:"love",
          year:"2020",
          id: '',
          title: '',
          poster: '',
          type: '',
          imdbid: '',
          url: 'https://www.imdb.com/title/',

        }
    },
        mounted() {
             this.todo();
            //this.mostrar_movie();
        },

        methods:{

          guardar_movie(){
            const formdata = new FormData();
            formdata.append('search',this.search);
            formdata.append('year',this.year);

            axios.post('/syncronizar', formdata)

            .then(result => {

              console.log(data);

               Swal.fire({
                 title: 'SINCRONIZACION EXITOSA',
                 timer: 6000,
                 type: 'success'
               });

               this.mostrar_movie();

            }).catch(error => {

                let data = error.response.data.errors;

                  $.each(data, function(i, item) {

                    Swal.fire({
                        text: item,
                        timer: 3000,
                        icon: 'error',
                    })

                });

            });

          },

          mostrar_movie(){

             axios.get('/movies/index').then(response => {

                    this.movies = response.data;

                }).catch(error => {

                    console.log(error);

             });

          },

          todo(){

               setInterval(function(){

                this.mostrar_movie();

               }.bind(this), 1000);

           },

           eliminar_movie(movie){

             axios.post('/eliminar/movie', {
                id: movie,
              })

              .then(function (response) {

                Swal.fire({
                 title: 'ELIMINACION EXITOSA',
                 timer: 3000,
                 type: 'success'
               });

              })
              .catch(function (error) {
                console.log(error);
              });

           },

           editar_movie(movie){

             this.id = movie.id;
             this.title = movie.title;
             this.poster = movie.poster;
             this.type = movie.type;
             this.year = movie.year;
             this.imdbid = movie.imdbid;

             $('#modal_movies').modal('show');
           }
        }
    }
</script>
