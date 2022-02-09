<?php

namespace App\Other;

class Dvd extends Product
{

    function readData()
    {

        echo '<div class="row row-cols-4">';

        $sql = "SELECT id, sku, name, price, size FROM product WHERE category_id = 1";
        $res = $this->conn->query($sql);

        if ($res->num_rows > 0) {
            // output data of each row
            while ($row = $res->fetch_assoc()) {
                echo '
                <div class="col" style="padding-bottom: 20px;">
                   <div class="card">
                        <div class="form-check">
                            <input class="delete-checkbox" name="dvd" type="checkbox" value="' . $row['id'] . '">
                        </div>
                        <div class="card-body text-center">
                            ' . $row['sku'] . '<br>
                            ' . $row['name'] . '<br>
                            ' . $row['price'] . ' &#36<br>
                            Size: ' . $row['size'] . ' Mb
                        </div>
                    </div>
                </div>
              ';
            }
        }

        echo '</div><br>';
    }

    function loadData()
    {

        $sql = "INSERT INTO product (sku, name, price, size, category_id) VALUES (?,?,?,?,?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ssiii", $this->sku, $this->name, $this->price, $this->size, $this->pt);
        $stmt->execute();
    }
}
