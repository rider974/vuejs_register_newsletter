<template>
  <div v-if="register == false ">
    <h1   class='primary' >S'inscrire à la newsletter CyberVeille</h1>
      <form @submit.prevent="createPost" >
      
        <div>
          <label class="dark" for="email">Entrez votre Email</label>
          <br />
          <input type="email" class="form-control" id="email" v-model="email" />
        </div>
        <div class="row  align-items-center">
          <button class=" col-3 btn btn-info ">S'inscrire</button>
        </div>
      </form>
  </div>
  <h3 v-else-if="register == true " :class="[ textColor]">{{message}}</h3>
</template>

<script>
export default {
  name: 'CreatePost',
  data() {
    return {
        email: '',
        message: "",
        textColor: '',
        register: false
    }
  },
  methods: {
    isRegister(error)
    {
      if (error === false)
      {
        this.register = false;
      }
      else 
      {
        this.register = true;

      }
      console.log(this.register)
    },
    createPost(){
      fetch("http://localhost/vueJS-test/register", {
        method: 'POST',
        headers: {
            
            'Content-Type': 'application/x-www-form-urlencoded'
           //   'Content-Type': 'application/json'
        },
        // body: JSON.stringify(data)
        // permet d'envoyer les données au bon format
        body : "email="+this.email
    })
         .then(response => response.json())
        .then(data => 
        {
          this.message=  data.message
          this.isRegister(data.error)
          this.textColor = data.error ? "alert-danger" : "alert-success";
          console.log(data.message)
          
        }
        )
         .catch((error) => console.log(error));
    },
  },
}
</script>