<?php
require_once '../db/db_connection.php';

function printCoin($identifier, $diameter, $weight, $axis, $collection, $coinUrl, $collUrl, $obverse, $reverse)
{
    if(substr( $obverse, 0, 4 ) !== "http"){
        $obverse = URL . 'Resources/coins/uploads/' . $obverse;
    }
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
                <button>Add to inventory</button>
                <button>Add to compare</button>
                <button>Share</button>
            </div>

            <div>
                <img src="' . $obverse . '" alt= "image unavailable" class = "coinImage">
                <img src="' . $reverse . '" alt= "image unavailable" class = "coinImage">
            </div>
        </div>';
}

function addCoinToInventory($id)
{

    echo "added to inventory";
}
