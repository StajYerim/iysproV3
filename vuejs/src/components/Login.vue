<template>
  <div class="hello">
   <h1>Login Sayfası</h1>
      <div class="container">
          <div class="row">
              <div class="col-md-6 col-md-offset-3">
                  <div class="panel panel-login">

                      <div class="panel-body">
                          <div class="row">
                              <div v-if="isLoading" class="col-lg-12">
                                  <form  v-on:submit.prevent="onSubmit()">
                                      <div class="form-group">
                                          <input type="text"  v-model="login.username" tabindex="1" class="form-control" placeholder="Username" value="">
                                      </div>
                                      <div class="form-group">
                                          <input type="password" name="password" v-model="login.password" tabindex="2" class="form-control" placeholder="Password">
                                      </div>
                                      <div class="form-group text-center">
                                          <input type="checkbox" tabindex="3" class="" name="remember" id="remember">
                                          <label for="remember"> Remember Me</label>
                                      </div>
                                      <div class="form-group">
                                          <div class="row">
                                              <div class="col-sm-6 col-sm-offset-3">
                                                  <input type="submit" name="login-submit" id="login-submit" tabindex="4" class="form-control btn btn-login" value="Log In">
                                              </div>
                                          </div>
                                      </div>
                                      <div class="form-group">
                                          <div class="row">
                                              <div class="col-lg-12">
                                                  <div class="text-center">
                                                      <a href="https://phpoll.com/recover" tabindex="5" class="forgot-password">Forgot Password?</a>
                                                  </div>
                                              </div>
                                          </div>
                                      </div>
                                  </form>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>

  </div>
</template>

<script>
export default {
  name: 'Login',
  data () {

        return {
            isLoading:false,
            login:{
                username:'',
                password:''
            },
            isLoading:true
        }
  },buttonDisable(){

    },
    methods:{

       onSubmit:function(event){
           const postData = {
               username:this.login.username,
               password: this.login.password
           }
           console.log(postData.username);
           axios.post("https://reqres.in/api/login",{username:this.login.username,password:this.login.password }).then(res=>{

           }).catch(e=>{

               this.$snotify.async('Called with promise', 'Success async', () => new Promise((resolve, reject) => {
               setTimeout(() => resolve({
               title: 'Success!!!',
               body: 'We got an example success!',
               config: {
                   closeOnClick: true
               }
           }), 2000);
       }));
           })

       }

    }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
h1, h2 {
  font-weight: normal;
}
ul {
  list-style-type: none;
  padding: 0;
}
li {
  display: inline-block;
  margin: 0 10px;
}
a {
  color: #42b983;
}
</style>
