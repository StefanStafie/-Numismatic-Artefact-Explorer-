<?php
require_once '../db/db_connection.php';

function printCoin($name, $description, $imgLink, $value, $mint, $source)
{
    echo '<button onclick="echoHello()">Say Hello</button>';
    echo '<div class="coin">
            <div>
                <p>Name:' . $name . '</p>
                <p>Mint' . $mint . '</p>
                <p>Value: ' . $value . '</p>
                <p>Source: ' . $source . '</p>
            </div>

            <div>
                <p>' . $description . '</p>
            </div>

            <div>
                <img src="' . $imgLink . '">
            </div>
        </div>';
}
function addCoinToInventory($id)
{
    
    echo "added to inventory";
}
