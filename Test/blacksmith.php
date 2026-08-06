<?php
$pageTitle = "The Alchemist";
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
<body class="mainBodyBlacksmith">
    <div class="mainBackBlacksmith">
        <div class="reputationBlacksmith">
            <div class="reputationTextBlacksmith">The Blacksmith</div>
            <div class="reputationTextContainer">
                <div class="unprovenTextBlacksmith">Unproven</div>
                <div class="reputationCounterBlacksmith">Reputation(+0)</div>
            </div>
            <div class="scaleImgBlacksmith">
                <img src="img/scaleBlacksmith.png" alt="Scale Image" class="scaleImageBlacksmith">
            </div>
            <a href="index.php" class="startOverButton">Start Over</a>
        </div>
        <div class="blacksmithCard">
            <div class="blacksmithCardContent">
                <div class="blacksmithCardText">
                    <div class="blacksmithCardTitle">The Ember Forge</div>
                    <p class="blacksmithCardDescription">Sparks drift up through the chimney gap like tiny fireflies who took a wrong turn. Someone's always waiting outside with a very specific request and an unconvincing excuse. What you shape is honest — what happens to it after isn't your problem. Probably.</p>
                </div>
                <div class="blacksmithCardImage">
                    <img src="img/blacksmithImg.png" alt="Blacksmith Image" class="blacksmithImage">
                </div>
                
            </div>
        </div>
        <div class="visitorCounterBlacksmith">Visitors 1 Of 8</div>
        <div class="visitorEncounterBlacksmith">
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

                    <button class="primaryActionBlacksmith">Make the trade</button>
                    <button class="secondaryActionBlacksmith">Turn them away</button>
                </div>

                <div class="visitorRightBlacksmith">
                    <div class="quoteBadge top"></div>
                    <div class="quoteTextBlacksmith">“My granddaughter's fever won't break, and the her bwoman two villages over wants coin I don't have. A sprig of wolfsbane, prepared right, is all a poultice like this one needs. I'll trade you one I've already made — it's done its work on worse.”</div>
                    <div class="quoteBadge bottom"></div>
                </div>
            </div>
        </div>
        <div class="goodsContainer">
            <div class="goodsTextBlacksmith">Your Goods</div>
            <div class="goodsBarBlacksmith"></div>
        </div>
        <div class="goodsRow">
            <div class="goodsCardBlacksmith">
                <div class="goodsCardTitle">Wolfbane Sprig</div>
                <div class="goodsCardCountBlacksmith">2</div>
                <div class="wolfbaneSprigImg"><img src="img/wolfbaneSprig.png" alt="Goods Image" class="goodsImage"></div>
                
            </div>
            <div class="goodsCardBlacksmith">
                <div class="goodsCardTitle">Iron Ingot</div>
                <div class="goodsCardCountBlacksmith">2</div>
                <div class="ironIngotImg"><img src="img/ironIngot.png" alt="Goods Image" class="goodsImage"></div>
                
            </div>
            <div class="goodsCardBlacksmith">
                <div class="goodsCardTitle">Harvest Bread</div>
                <div class="goodsCardCountBlacksmith">2</div>
                <div class="harvestBreadImg"><img src="img/harvestBread.png" alt="Goods Image" class="goodsImage"></div>
                
            </div>
            <div class="goodsCardBlacksmith">
                <div class="goodsCardTitle">Lantern Oil</div>
                <div class="goodsCardCountBlacksmith">2</div>
                <div class="lanternOilImg"><img src="img/lanternOil.png" alt="Goods Image" class="goodsImage"></div>
                
            </div>
        </div>
    </div>
</body>
</html>
