const {createApp} = Vue;

createApp({
  data() {
    return{
      api: 'server.php',
      list: []
    }
  },

  methods: {
    getApi() {
      axios.get(this.api)
      .then(result => {
        this.list = result.data;
      })
    }
  },

  mounted() {
    this.getApi()
  }
}).mount('#app')

