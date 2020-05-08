<?php
require_once '../db/db_connection.php';

function printCoin($identifier, $diameter, $weight, $axis, $collection, $coinUrl, $collUrl, $obverse, $reverse)
{
    echo '<div class="coin">
            <div>
                <p>Identifier: ' . $identifier . '</p>
                <p>Diameter: ' . $diameter . '</p>
                <p>Weight: ' . $weight . '</p>
                <p>Axis: ' . $axis . '</p>
                <p>Collection: ' . $collection . '</p>
            </div>

            <div>
                <p> More about this coin <a href="' . $coinUrl . '">' . $coinUrl . '</a></p>
                <p> More about the collection <a href="' . $collUrl . '">' . $collUrl . '</a></p>
            
            </div>

            <div>
                <img src="' . $obverse . '" alt= "image unavailable">
                <img src="' . $reverse . '" alt= "image unavailable">
            </div>
        </div>';
}

function addCoinToInventory($id)
{

    echo "added to inventory";
}
