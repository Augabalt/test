let app = new Vue({
    el: '#app',
    data: {
        sku: '',
        name: '',
        price: '',
        pt: '',
        size: '',
        weight: '',
        height: '',
        width: '',
        length: '',
        main_url: main_url

    },

    methods: {
        submit(event) {
            event.preventDefault()

            val = this.validate()
            if (val == true) {
                this.fetchLoad()
            } else {
                console.log('Error')
            }


        },
        validate() {
            // delete all already existing validation errors to check for a new one
            const errors = document.getElementsByClassName('error')
            while (errors.length > 0) {
                errors[0].parentNode.removeChild(errors[0]);
            }

            let elements = document.querySelectorAll("#product_form input, select")
            let arr = Array.from(elements) //NodeList to Array

            arr.forEach(element => {
                if (element.value == "") {
                    element.insertAdjacentHTML('afterend', '&nbsp<span class="error">Please, submit required data</span>')
                }
            })

            let check = arr.every(elem => {
                if (elem.value == "") {
                    return false;
                } else {
                    return true;
                }
            })

            if (check == true) {
                return true;
            } else {
                return false;
            }

        },
        async fetchLoad() {
            const url = './fetch/load.php';

            try {
                const res = await fetch(url, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({
                        sku: this.sku,
                        name: this.name,
                        price: this.price,
                        pt: this.pt,
                        size: this.size,
                        weight: this.weight,
                        height: this.height,
                        width: this.width,
                        length: this.length

                    })
                })
            } catch (e) {
                console.error(e)
            } finally {
                window.location.href = this.main_url

            }

        },


    }
})
