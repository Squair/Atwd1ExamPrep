<?php
    $plantsXml = simplexml_load_file("plants.xml");

    function printTable($plantsXml){
        foreach($plantsXml as $plant){
            echo "<tr>";
            echo "<td>".$plant['id']."</td>";
            echo "<td>$plant->common ($plant->botanical)</td>";
            echo "<td><img style='width: 40px;' src='".$plant->light['icon']."'>". $plant->light . "</td>";
            echo "<td>$plant->price</td>";
            echo "<td><img style='width: 80px;' src='$plant->img'></td>";
            echo "</tr>";
        }
    }
?>

<table>
    <tr>
        <th>id</th>
        <th>name (latin name)</th>
        <th>light</th>
        <th>price</th>
        <th>image</th>
    </tr>
    <?php printTable($plantsXml); ?>
</table>
<h2>Xpath questions</h2>
<?php
    $dom = new DOMDocument();
    $dom_sxe = dom_import_simplexml($plantsXml);
    $dom_sxe = $dom->importNode($dom_sxe, true);
    $dom_sxe = $dom->appendChild($dom_sxe);

    $xpath = new DOMXPath($dom);


    echo "Count number of plants: <b>count(//plant)</b> - ";
    echo $xpath->evaluate('count(//plant)', $dom);

    echo "</br>Get common element where image='cal_pal.png': <b>/catalogue/plant[img='cal_pal.jpg']/common></b> - ";
    print_r($xpath->evaluate('/catalogue/plant[img="cal_pal.jpg"]/common', $dom)->item(0)->nodeValue);

    echo "</br>Calculate total price of all stock: <b>sum(//plant/(stock*price))</b> - ";
    //print_r($xpath->evaluate('sum(/plant/(price * stock))', $dom));
    echo (double) $xpath->evaluate('sum(//plant/(stock*price))');

?>