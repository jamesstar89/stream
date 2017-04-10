require('whatwg-fetch');
/**
 * First we will load all of this project's JavaScript dependencies which
 * include Vue and Vue Resource. This gives a great starting point for
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the body of the page. From here, you may begin adding components to
 * the application, or feel free to tweak this setup for your needs.
 */

const sceneTemplate = '<table class="table posts-table"><thead><tr><th>Posts</th><th>Action</th></thead></tr><tbody>' + 
                      '<tr v-for="data in scenes"><td v-html="data.scene.text"></td><td><a href="#">Delete</a></td></tr>' +
                      '</tbody></table>';

const loader = Vue.component('loader', {
  data: function() {
    return {
      scenes: []
    }
  },
  created: function () {
    this.getScenes();
  },
  methods: {
    getScenes: function () {
      const that = this;
      fetch('/api/v1/messages/').then(function(response) {
        return response.json();
      }).then(function(data) {
        that.scenes = that.setTemplate(data);
        $('.posts-table').show();
      });
    },
    parseJSON: function (scene) {
      return JSON.parse(scene);
    },
    setTemplate: function (data) {
      let newModel = [];
      const that = this;
      _.each(data, function(item, index) {
        const html = that.parseJSON(item.view).html;
        const text = that.parseJSON(item.scene);
        const compiled = _.template(html);
        const sceneObj = {
                            scene:{
                              text: compiled(text)
                            }
                          }
        newModel.push(Object.assign({}, item, sceneObj)); 
      });
      return newModel;
    }
  },
  template: sceneTemplate
});

const messages = new Vue({
  el: '#app',
  components: {
    'loader': loader
  }
});