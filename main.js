const {createApp} = Vue;

createApp({
  data() {
    return{
      api: 'server.php',
      list: [],
      newNote: '',
      new: {},
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
        this.new = {
          text: this.newNote,
          done: false
        };
        this.list.unshift(this.new);
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

