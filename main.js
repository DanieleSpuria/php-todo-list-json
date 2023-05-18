const {createApp} = Vue;

createApp({
  data() {
    return{
      api: 'server.php',
      list: [],
      newNote: '',
      msg: '',
      load: false
    }
  },

  methods: {
    getApi() {
      axios.get(this.api)
      .then(result => {
        this.list = result.data;
        this.load = true
      })
    },

    add() {
      this.load = false;

      if (this.newNote.length <= 4) {
        this.message('La nota è troppo breve!');
      } else {
        const data = new FormData();
        data.append('text', this.newNote);

        axios.post(this.api, data)
        .then(result => {
          this.list = result.data;
        })
      }
      
      this.load = true;
      this.newNote = '';
    },

    rmv(item, i) {
      this.load = false;
      this.msg = '';

      if (item.done === true) {
        const data = new FormData();
        data.append('index', i);

        axios.post(this.api, data)
        .then(result => {
          this.list = result.data;
        })
      }
      else {
        this.message('Questo non lo hai ancora fatto!');
      }

      this.load = true
    },

    empty() {
      this.load = false;

      const data = new FormData();
      data.append('empty', true);

      axios.post(this.api, data)
      .then(result => {
        this.list = result.data;
      })
      
      this.load = true
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

