
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('../bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */


const app = new Vue({
    el: '#app',

        data(){
            return{
                registerData:{
                    name:'',
                    email:'',
                    password:'',
                    password_confirmation:''
                },
                loginData:{
                    email:'',
                    password:'',
                },
                loginerrorMessage:{
                    email:null,
                    password:null
                },
                registererrorMessage:{
                    name:null,
                    email:null,
                    password:null
                }
                //passwordMatch:null
            }
        },

        methods:{
            Login(){
                document.getElementById('spinner').style.display = 'block';
                this.clearLoginErrors();
                var _this = this
                var _vm = this.loginerrorMessage
                axios.post('/user/login', _this.loginData)
                .then(function (response) {
                    document.getElementById('spinner').style.display = 'none';
	                if (response.data.status === 'success') {
	                    window.location.href = response.data.redirect;
	                }
                })
                .catch(function (error) {
                    document.getElementById('spinner').style.display = 'none';
                    var errors = error.response
                    if(errors.statusText === 'Unprocessable Entity'){
                        if(errors.data){
                            if(errors.data.email){
                               _vm.email = _.isArray(errors.data.email) ? errors.data.email[0]: errors.data.email
                            }
                            if(errors.data.password){
                               _vm.password = _.isArray(errors.data.password) ? errors.data.password[0]: errors.data.password
                            }
                        }
                    }
                });
            },

            Register(){
                document.getElementById('spinner').style.display = 'block';
                this.clearRegisterErrors();
                var _this = this
                var _vm = this.registererrorMessage
                axios.post('/user/register', _this.registerData)
                .then(function (response) {
                    document.getElementById('spinner').style.display = 'none';
                    if (response.data.status === 'success') {
                        window.location.href = response.data.redirect;
                    }
                })
                .catch(function (error) {
                    document.getElementById('spinner').style.display = 'none';
                    var errors = error.response
                    if(errors.statusText === 'Unprocessable Entity'){
                        if(errors.data){
                            if(errors.data.name){
                               _vm.name = _.isArray(errors.data.name) ? errors.data.name[0]: errors.data.name
                            }
                            if(errors.data.email){
                               _vm.email = _.isArray(errors.data.email) ? errors.data.email[0]: errors.data.email
                            }
                            if(errors.data.password){
                               _vm.password = _.isArray(errors.data.password) ? errors.data.password[0]: errors.data.password
                            }
                        }
                    }
                });
            },

            clearLoginErrors() {
                this.loginerrorMessage.email = ""
                this.loginerrorMessage.password = ""
            },

            clearRegisterErrors() {
                this.registererrorMessage.email = ""
                this.registererrorMessage.password = ""
                this.registererrorMessage.name = ""
            }
        }
});
