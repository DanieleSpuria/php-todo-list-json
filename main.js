const {createApp} = Vue;

createApp({
  data() {
    return{
      api: 'server.php',
      list: [],
      newNote: '',
      msg: ''
    }
  },

  methods: {
    getApi() {
      axios.get(this.api)
      .then(result => {
        this.list = result.data;
      })
    },

    add() {
      if (this.newNote.length <= 4) this.message('La nota è troppo breve!');
      else {
        const data = new FormData();
        data.append('text', this.newNote)

        axios.post(this.api, data)
        .then(result => {
          this.list = result.data;
          console.log(this.list);
        })
      }
      this.newNote = ''
    },

    message(msg) {
      this.msg = msg;
      setTimeout(() => this.msg = '', 1000);
    },
  },

  mounted() {
    this.getApi()
  }
}).mount('#app')

