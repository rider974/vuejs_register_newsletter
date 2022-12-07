<template>
  <div>
    <form @submit.prevent="createPost">
      <div>
        <label for="email">Entrez l'Email</label>
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
          console.log(response)
        })
        .catch((error) => {
          console.log(error)
        })
    },
  },
}
</script>