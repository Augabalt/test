readProduct()

async function readProduct() {
    const url = './fetch/read.php';
    try {
        const res = await fetch(url)
        const data = await res.text()
        document.getElementById("product_list").innerHTML = data
    } catch (e) {
        console.error(e)
    } finally {

    }
}

async function deleteProduct() {
    const url = './fetch/delete.php';

    let values = [];

    let fav = document.querySelectorAll('.delete-checkbox');


    for (let i = 0; i < fav.length; ++i) {
        if (fav[i].checked) {
            values.push(fav[i].value); //add the selected values to the array
        }
    }

    try {
        const res = await fetch(url, {

            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({
                ids: values
            })
        })

    } catch (e) {
        console.error(e)
    } finally {
        window.location.reload()

    }
}
