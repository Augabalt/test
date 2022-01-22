<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>
</head>

<body class="d-flex flex-column min-vh-100">

    <div class="container" style="margin-top:40px;" id="app">

        <div class="row row-cols-2">
            <div class="col">
                <h1>Product add</h1>
            </div>
            <div class="col">
                <div class="row">
                    <div class="col">
                        <button @click="submit" class="btn btn-primary">Save</button>
                    </div>
                    <div class="col">
                        <button onclick="window.location.href='index.php'" class="btn btn-primary">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
        <hr>

        <form id="product_form">
            <div class="input-group mb-3">
                <span class="input-group-text" id="inputGroup-sizing-default">SKU</span>
                <input type="text" class="form-control" id="sku" v-model="sku" placeholder="#sku" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" required>
                <span id="sku_error"></span>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="inputGroup-sizing-default">Name</span>
                <input type="text" class="form-control" id="name" v-model="name" placeholder="#name" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                <span id="name_error"></span>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="inputGroup-sizing-default">Price (&#36)</span>
                <input type="number" class="form-control" id="price" v-model="price" placeholder="#price" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                <span id="price_error"></span>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="inputGroup-sizing-default">Product type</span>
                <select class="form-select" aria-label="Default select example" id="productType" v-model="pt">
                    <option></option>
                    <option value="1">DVD</option>
                    <option value="2">Book</option>
                    <option value="3">Furniture</option>
                </select>
                <span id="pt_error"></span>
            </div>
            <span v-if="pt == 1">
                <p>Size (Mb)
                    <input type="number" id="size" v-model="size" placeholder="#size">
                </p>
            </span>
            <span v-if="pt == 2">
                <p>Weight (Kg)
                    <input type="number" id="weight" v-model="weight" placeholder="#weight">
                </p>
            </span>
            <span v-if="pt == 3">
                <p>Height (Cm)
                    <input type="number" id="height" v-model="height" placeholder="#height">
                </p>
                <p>Width (Cm)
                    <input type="number" id="width" v-model="width" placeholder="#width">
                </p>
                <p>Length (Cm)
                    <input type="number" id="length" v-model="length" placeholder="#length">
                </p>
            </span>
        </form>

    </div>


    <footer class="mt-auto">
        <div class="container" style="margin-bottom:40px; text-align: center">
            <hr>
            <p>Scandiweb Test assignment</p>
        </div>
    </footer>


    <script>
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
                        fetch('./js/fetch_load.php', {

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

    </script>

</body>

</html>
