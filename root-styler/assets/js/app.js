var entities = [];
var app = new Vue({
  el: '#app',
  data: {
    search: '',
    entities: entities
  },
  computed: {
    filteredList: function filteredList() {
      var _this = this;

      return this.entities.filter(function (entity) {
        return entity.name.toLowerCase().includes(_this.search.toLowerCase());
      });
    }
  }
});
