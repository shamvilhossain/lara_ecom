
/**
 * First we will load all of this project's JavaScript dependencies which
 * include Vue and Vue Resource. This gives a great starting point for
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
//window.axios = require('axios');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the body of the page. From here, you may begin adding components to
 * the application, or feel free to tweak this setup for your needs.
 */

Vue.component('example', require('./components/Example.vue'));

const app = new Vue({
    el: '#app',
    data:{
    	newItem: { 'name': '','age': '','profession': '' },
    	hasError: true,
    },
    methods:{
	    createItem: function createItem() {
	      	var input = this.newItem;
      
		      if (input['name'] == '' || input['age'] == '' || input['profession'] == '' ) {
		        this.hasError = false;
		      }else{
		      	 this.hasError = true;
		      	 axios.post('./save-coupon', input).then(function (response) {
		        	console.log('vvvvv');  
		        });
		      }
	    }
    }
});


