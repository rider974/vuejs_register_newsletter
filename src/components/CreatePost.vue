<template>
  <div>
  <h2>S'inscire à la newsletter CyberVeille</h2>
    <form @submit.prevent="createPost">
    <h3 :class="{active:isActive}">{{error}}</h3>
      <div>
        <label for="email">Entrez votre Email</label>
        <br />
        <input type="email" id="email" v-model="email" />
      </div>
      <button>S'inscrire</button>
    </form>
  </div>
</template>

<script>
export default {
  name: 'CreatePost',
  data() {
    return {
        email: '',
        error:" ",
        message: ""
    }
  },
  methods: {
    createPost() {
      fetch("http://localhost/vueJS-test/register", {
        method: 'POST',
        headers: {
            
            'Content-Type': 'application/x-www-form-urlencoded'
              //'Content-Type': 'application/json'
        },
        // body: JSON.stringify(data)
        // permet d'envoyer les données au bon format
        body : "email="+this.email
    })
        .then((response) => {
          return response.text()
        })
        
        .then((result) => {
          console.log(result)
        })
        .catch((error) => {
          console.log(error)
        })
    },
  },
}
</script>