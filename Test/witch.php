<?php
$pageTitle = "The Witch";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $pageTitle; ?></title>
    <link rel="stylesheet" href="index.css">
     <link rel="stylesheet" href="https://use.typekit.net/tns8rhh.css">
</head>
<body class="mainBodyWitch">
    <div class="mainBackWitch">
        <div class="reputationWitch">
            <div class="reputationTextWitch">The Witch</div>
            <div class="reputationTextContainer">
                <div class="unprovenTextWitch">Unproven</div>
                <div class="reputationCounterWitch">Reputation(+0)</div>
            </div>
            <div class="scaleImgWitch">
                <img src="img/Scale.png" alt="Scale Image" class="scaleImageWitch">
            </div>
            <a href="index.php" class="startOverButton">Start Over</a>
        </div>
        <div class="witchCard">
            <div class="witchCardContent">
                <div class="witchCardText">
                    <div class="witchCardTitle">The Witch’s Hollow</div>
                    <p class="witchCardDescription">A crooked little hut with smoke curling the wrong color and jars judging you from every windowsill. Whoever knocks today, you'll brew them something — the question is which kind.</p>
                </div>
                <div class="witchCardImage">
                    <img src="img/Witch.png" alt="Witch Image" class="witchImage">
                </div>
                
            </div>
        </div>
        <div class="visitorCounter">Visitors 1 Of 8</div>
        <div class="visitorEncounter">
            <div class="visitorEncounterContent">
                <div class="visitorLeft">
                    <div class="visitorHeader">
                        <div class="visitorAvatar">
                            <img src="img/oldBramblewick.png" alt="Visitor Avatar" class="visitorAvatarImage">
                        </div>
                        <div>
                            <div class="visitorName">Old Bramblewick</div>
                            <div class="visitorRole">The hedge healer</div>
                        </div>
                    </div>

                    <div class="visitorStock">
                    You have
                    2 Wolfbane Sprig
                    </div>

                    <div class="visitorTradeRow">
                        <button class="tradeItem">1 Wolfbane Sprig</button>
                        <div class="tradeArrow">&gt;</div>
                        <button class="tradeItem">1 Healing Potion</button>
                    </div>

                    <button class="primaryAction">Make the trade</button>
                    <button class="secondaryAction">Turn them away</button>
                </div>

                <div class="visitorRight">
                    <div class="quoteBadge top"></div>
                    <div class="quoteText">“My granddaughter's fever won't break, and the her bwoman two villages over wants coin I don't have. A sprig of wolfsbane, prepared right, is all a poultice like this one needs. I'll trade you one I've already made — it's done its work on worse.”</div>
                    <div class="quoteBadge bottom"></div>
                </div>
            </div>
        </div>
        <div class="goodsContainer">
            <div class="goodsText">Your Goods</div>
            <div class="goodsBar"></div>
        </div>
        <div class="goodsRow">
            <div class="goodsCard">
                <div class="goodsCardTitle">Wolfbane Sprig</div>
                <div class="goodsCardCount">2</div>
                <div class="wolfbaneSprigImg"><img src="img/wolfbaneSprig.png" alt="Goods Image" class="goodsImage"></div>
                
            </div>
            <div class="goodsCard">
                <div class="goodsCardTitle">Iron Ingot</div>
                <div class="goodsCardCount">2</div>
                <div class="ironIngotImg"><img src="img/ironIngot.png" alt="Goods Image" class="goodsImage"></div>
                
            </div>
            <div class="goodsCard">
                <div class="goodsCardTitle">Harvest Bread</div>
                <div class="goodsCardCount">2</div>
                <div class="harvestBreadImg"><img src="img/harvestBread.png" alt="Goods Image" class="goodsImage"></div>
                
            </div>
            <div class="goodsCard">
                <div class="goodsCardTitle">Lantern Oil</div>
                <div class="goodsCardCount">2</div>
                <div class="lanternOilImg"><img src="img/lanternOil.png" alt="Goods Image" class="goodsImage"></div>
                
            </div>
        </div>
    </div>
</body>
</html>
