
import { createApp } from 'https://unpkg.com/vue@3/dist/vue.esm-browser.js'


createApp({
    data() {
        return {
            productList: [],
            dbUrl: 'db.php',
            filterString: ''
        }
    },
    created() {
        this.getProductList()
    },
    methods: {
        getProductList() {
            axios.get(this.dbUrl).then((res) => {
                console.log(res.data)
                this.productList = res.data
            }).catch((err) => {
                console.log(err)
            })
        }
    }
}).mount('#app')
