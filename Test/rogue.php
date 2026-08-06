<?php
$pageTitle = "The Rogue";
$basePath = dirname($_SERVER['SCRIPT_NAME']);
$basePath = $basePath === '.' ? '' : $basePath;
$basePath = rtrim($basePath, '/') . '/';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $pageTitle; ?></title>
    <link rel="stylesheet" href="<?php echo $basePath; ?>index.css">
     <link rel="stylesheet" href="https://use.typekit.net/tns8rhh.css">
</head>
<body class="mainBodyRogue">
    <div class="mainBackRogue">
        <div class="reputationRogue">
            <div class="reputationTextRogue">The Rogue</div>
            <div class="reputationTextContainer">
                <div class="unprovenTextRogue">Unproven</div>
                <div class="reputationCounterRogue">Reputation(+0)</div>
            </div>
            <div class="scaleImgRogue">
                <img src="<?php echo $basePath; ?>img/Scale.png" alt="Scale Image" class="scaleImageRogue">
            </div>
            <a href="<?php echo $basePath; ?>index.php" class="startOverButton">Start Over</a>
        </div>
        <div class="rogueCard">
            <div class="rogueCardContent">
                <div class="rogueCardText">
                    <div class="rogueCardTitle">The Hollow Den</div>
                    <p class="rogueCardDescription">A lantern-lit little stash behind a door that definitely isn't supposed to be there. Everything down here has a story nobody's telling. No judgment, no backstories — just good deals and questionable provenance.</p>
                </div>
                <div class="rogueCardImage">
                    <img src="<?php echo $basePath; ?>img/rogueImg.png" alt="Rogue Image" class="rogueImage">
                </div>
                
            </div>
        </div>
        <div class="visitorCounterRogue">Visitors 1 Of 8</div>
        <div class="visitorEncounterRogue">
            <div class="visitorEncounterContent">
                <div class="visitorLeft">
                    <div class="visitorHeader">
                        <div class="visitorAvatar">
                            <img src="<?php echo $basePath; ?>img/oldBramblewick.png" alt="Visitor Avatar" class="visitorAvatarImage">
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

                    <button class="primaryActionRogue">Make the trade</button>
                    <button class="secondaryActionRogue">Turn them away</button>
                </div>

                <div class="visitorRightRogue">
                    <div class="quoteBadge top"></div>
                    <div class="quoteTextRogue">“My granddaughter's fever won't break, and the her bwoman two villages over wants coin I don't have. A sprig of wolfsbane, prepared right, is all a poultice like this one needs. I'll trade you one I've already made — it's done its work on worse.”</div>
                    <div class="quoteBadge bottom"></div>
                </div>
            </div>
        </div>
        <div class="goodsContainer">
            <div class="goodsTextRogue">Your Goods</div>
            <div class="goodsBarRogue"></div>
        </div>
        <div class="goodsRow">
            <div class="goodsCardRogue">
                <div class="goodsCardTitle">Wolfbane Sprig</div>
                <div class="goodsCardCountRogue">2</div>
                <div class="wolfbaneSprigImg"><img src="<?php echo $basePath; ?>img/wolfbaneSprig.png" alt="Goods Image" class="goodsImage"></div>
                
            </div>
            <div class="goodsCardRogue">
                <div class="goodsCardTitle">Iron Ingot</div>
                <div class="goodsCardCountRogue">2</div>
                <div class="ironIngotImg"><img src="<?php echo $basePath; ?>img/ironIngot.png" alt="Goods Image" class="goodsImage"></div>
                
            </div>
            <div class="goodsCardRogue">
                <div class="goodsCardTitle">Harvest Bread</div>
                <div class="goodsCardCountRogue">2</div>
                <div class="harvestBreadImg"><img src="<?php echo $basePath; ?>img/harvestBread.png" alt="Goods Image" class="goodsImage"></div>
                
            </div>
            <div class="goodsCardRogue">
                <div class="goodsCardTitle">Lantern Oil</div>
                <div class="goodsCardCountRogue">2</div>
                <div class="lanternOilImg"><img src="<?php echo $basePath; ?>img/lanternOil.png" alt="Goods Image" class="goodsImage"></div>
                
            </div>
        </div>
    </div>
</body>
</html>
