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
         length: ''
     },
     methods: {

         submit(e) {
             e.preventDefault()
             val = this.validate()
             if (val == true) {
                 fetch('./fetch/load.php', {

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
                 window.location.href = 'index.php'
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
             let arr = Array.from(elements) //Node to Array

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

         }
     }
 })
