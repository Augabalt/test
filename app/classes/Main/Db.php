<?php
namespace App\Main;

class Db
{

 private $servername = "localhost";
 private $dbname = "db";
 private $username = "root";
 private $password = "";

// private $servername = "62.128.111.3";
// private $dbname = "arbuusee_test";
// private $username = "arbuusee_004";
// private $password = "2?yyOc#Xm-{v";

    function __construct(){

        $this->conn = null;
        $this->conn = new \mysqli($this->servername, $this->username, $this->password, $this->dbname);

        if ($this->conn ->connect_error)
        {
            die("Connection failed: " . $this->conn->connect_error);
        }
        return $this->conn;

    }

    function createTableCategory(){

        $sql = "SELECT * FROM category LIMIT 1;";
        $res = $this->conn->query($sql);

        if (empty ($res)){

            $sql = "CREATE TABLE category (
                    id INT(6) NOT NULL AUTO_INCREMENT,
                    PRIMARY KEY (id),
                    name VARCHAR(30) NOT NULL
                    ) ENGINE=INNODB;

                    INSERT INTO category (name)
                    VALUES
                        ('dvd'),
                        ('book'),
                        ('furniture')
                    ";

            $this->conn->multi_query($sql);

        }

    }

    function createTableProduct() {

        $sql = "SELECT * FROM product LIMIT 1;";
        $res = $this->conn->query($sql);

        if (empty ($res)){

            $sql = "CREATE TABLE product (
                    id INT(6) NOT NULL AUTO_INCREMENT,
                    PRIMARY KEY (id),
                    sku VARCHAR(30) NOT NULL,
                    name VARCHAR(30) NOT NULL,
                    price INT(11) NOT NULL,
                    size INT(11) NOT NULL,
                    weight INT(11) NOT NULL,
                    height INT(11) NOT NULL,
                    width INT(11) NOT NULL,
                    length INT(11) NOT NULL,
                    category_id INT(6) NOT NULL,
                    FOREIGN KEY (category_id) REFERENCES category (id)
                    ) ENGINE=INNODB";

        $this->conn->query($sql);

        }


    }

    function deleteDataProduct($ids) {

        foreach ($ids as $id) {
            $sql = "DELETE FROM product WHERE id= $id ";
            $this->conn->query($sql);

         }

    }

}
