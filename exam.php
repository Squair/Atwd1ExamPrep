<?php
    function printTable(){
        $plantsXml = simplexml_load_file("plants.xml");
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
    <?php printTable(); ?>
</table>