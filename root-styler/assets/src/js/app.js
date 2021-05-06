let entities = [];
const app = new Vue({
    el: '#app',
    data: {
        search: '',
        entities,
    },
    computed: {
        filteredList() {
            return this.entities.filter(entity => {
                return entity.name.toLowerCase().includes(this.search.toLowerCase())
            })
        }
    }
})