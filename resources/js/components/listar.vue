
<script>
  export default {
    data() {
      return {
              items: null
      }
    },
    mounted() {

            axios
            .get('/movies')
            .then(response => {
                this.items = response.data;
            })
            .catch(error => {
                    console.log(error);
            });

    }
  }
</script>
