<html>
<head>

</head>
<body>
<?php

require __DIR__ . '/vendor/autoload.php';

$db = new mysqli("mysql","root","tiger","restaurant","3306");

/*$db->set_charset('utf8');

$query = $db->query("SELECT * FROM dishes");

while($item = $query->fetch_assoc()) {
    $dishes[] = new \DENIOS\Restaurant\Dishes\Dish($item['name'],$item['price'],$item['isVegan'],$item['isVegetarian'],$item['isGlutenFree'],$item['isFishFree'],$item['isPorkFree']);
}
*/


$dishes = [new \DENIOS\Restaurant\Dishes\Dish("Currywurst",5.50,
        [
            new DENIOS\Restaurant\Dishes\Ingredient("Wurst",false,false,true,false,true),
            new \DENIOS\Restaurant\Dishes\Ingredient("Currysauce",true,true,false,false,false,[
                    new \DENIOS\Restaurant\Dishes\Ingredient("Tomaten",true,true,true,false,false),
                    new \DENIOS\Restaurant\Dishes\Ingredient("Currypulver",true,true,true,false,false)])
        ]
    ),
    new DENIOS\Restaurant\Dishes\Dish("Spaghetti",3.60,
        [
            new DENIOS\Restaurant\Dishes\Ingredient("Nudeln",true,true,false,false,false),
            new \DENIOS\Restaurant\Dishes\Ingredient("Tomatensauce",true,true,true,false,false,[
                new \DENIOS\Restaurant\Dishes\Ingredient("Tomaten",true,true,true,false,false),
                new \DENIOS\Restaurant\Dishes\Ingredient("Gewürze",true,true,true,false,false)])

        ]
    )
];




$query = $db->query("SELECT * FROM guests");

while($guest = $query->fetch_assoc()) {
    $guests[] = new \DENIOS\Restaurant\Guests\Guest(1,$guest['firstname']." " .$guest['lastname'],$guest['money'],$guest['isVegan'],$guest['isVegetarian'],$guest['isGlutenIntolerant'],$guest['dislikesPork'],$guest['dislikesFish']);
}

$menue = new \DENIOS\Restaurant\Menues\Menu("EssensKarte",$dishes);

foreach ($guests as $customer) {
    echo "</br></br>";
    echo $customer->getName() . " MONEY: " . $customer->getMoney();
    echo "</br>";

    $suitableDishes = $menue->getSuitableDishes($customer);
    var_dump($suitableDishes);

    var_dump($customer);
    if($customer->getName() == "Jannik Jakobsen")
    {
        echo $customer->getMoney();

        foreach ($suitableDishes AS $suitableDish) {
            if($suitableDish->getName() === "Currywurst") {
                if($customer->getMoney() <= $suitableDish->getPrice()) {
                    $db->query("UPDATE guests SET money = 50.5 WHERE firstname = 'Jannik'" );

                }else {
                    $db->query("UPDATE guests SET money =" . ($customer->getMoney() - $suitableDish->getPrice())." WHERE firstname = 'Jannik'" );

                }
            }
        }
    }
}

?>

<div style="text-align:center;">
    <form method="post">
        <div>
            <label>
                Dish Name <input name="dishNameID" placeholder="DishName"/>
            </label>
        </div>
        <div>
            <label>
                Price <input name="dishPriceID" placeholder="Price"/>
            </label>
        </div>
        <div>
            <label>
                IsVegan <input name="isVegan" type="checkbox" value="1"/>
            </label>
        </div>
        <div>
            <label>
                IsVegetarian <input name="isVegetarian" type="checkbox" value="1"/>
            </label>
        </div>
        <div>
            <label>
                IsGlutenFree <input name="isGlutenFree" type="checkbox" value="1"/>
            </label>
        </div>
        <div>
            <label>
                IsFishFree <input value="isFishFree" type="checkbox" value="1"/>
            </label>
        </div>
        <div>
            <label>
                IsPorkFree <input name="isPorkFree" type="checkbox" value="1"/>
            </label>
        </div>

        <input type="submit" name="submitDish" value="Add Dish" />

    </form>
</div>
</body>
</html>

