<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src='https://cdnjs.cloudflare.com/ajax/libs/vue/3.3.4/vue.global.min.js' integrity='sha512-Wbf9QOX8TxnLykSrNGmAc5mDntbpyXjOw9zgnKql3DgQ7Iyr5TCSPWpvpwDuo+jikYoSNMD9tRRH854VfPpL9A==' crossorigin='anonymous'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/axios/1.4.0/axios.min.js' integrity='sha512-uMtXmF28A2Ab/JJO2t/vYhlaa/3ahUOgj1Zf27M5rOo8/+fcTUVH0/E0ll68njmjrLqOBjXM3V9NiPFL5ywWPQ==' crossorigin='anonymous'></script>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css' integrity='sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==' crossorigin='anonymous'/>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@200&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="style.css">
  <title>PHP ToDo List JSON</title>
</head>
<body>
  <div id="app">

    <div class="input-invio">
      <input
        type="text"
        placeholder="Scrivi nota da aggiungere"
        v-model.trim="newNote"
        @keyup.enter="add"
      >
      <button @click="add" >Aggiungi</button>
      <button >Svuota</button>
    </div>

    <div class="message">
      <h2>{{ msg }}</h2>
    </div>

    <div class="container">
      <ul>
        <!-- <p >Vuoto</p> -->
        <li
          v-for="item in list"
          class="note"
          :class="{'done' : item.done === true}"
          @click="item.done = !item.done"
        >
          <span>{{ item.text }}</span>
          <i
            class="fa-solid fa-trash"
            @click="rmv(item, i)"
          ></i>
        </li>
      </ul>
    </div>

  </div>
  <script src="main.js"></script>
</body>
</html>