readProduct();

function readProduct() {

    const requestURL = './js/fetch_read.php';

    fetch(requestURL)
        .then(data => data.text())
        .then(data => document.getElementById("product_list").innerHTML = data)
}

function deleteProduct() {

    const requestURL = './js/fetch_delete.php';

    let values = [];

    let fav = document.querySelectorAll('.delete-checkbox');


    for (let i = 0; i < fav.length; ++i) {
        if (fav[i].checked) {
            values.push(fav[i].value); //add the selected values to the array
        }
    }

    fetch(requestURL, {

        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({
            ids: values
        })
    });
    readProduct();


}
