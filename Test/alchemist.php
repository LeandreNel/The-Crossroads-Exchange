<?php
$pageTitle = "The Alchemist";
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
<body class="mainBodyAlchemist" data-character="alchemist">
    <div class="mainBackAlchemist">
        <div class="reputationAlchemist">
            <div class="reputationTextAlchemist">The Alchemist</div>
            <div class="reputationTextContainer">
                <div class="unprovenTextAlchemist">Unproven</div>
                <div class="reputationCounterAlchemist reputationCounter">Reputation(+0)</div>
            </div>
            <div class="scaleImgAlchemist">
                <img src="<?php echo $basePath; ?>img/scaleAlchemist.png" alt="Scale Image" class="scaleImageAlchemist">
            </div>
            <a href="<?php echo $basePath; ?>index.php" class="startOverButton">Start Over</a>
        </div>
        <div class="alchemistCard">
            <div class="alchemistCardContent">
                <div class="alchemistCardText">
                    <div class="alchemistCardTitle">The Peppermint Atelier</div>
                    <p class="alchemistCardDescription">A pocket‑sized cottage with a mint‑green door that always looks like it’s smiling. Inside, pastel potions fizz softly on tiny shelves, each one glowing like it’s keeping a sweet little secret. A drowsy cat in a star‑speckled apron guards a teacup cauldron bubbling with sparkles. The whole place smells like honey, peppermint, and gentle magic.</p>
                </div>
                <div class="alchemistCardImage">
                    <img src="<?php echo $basePath; ?>img/alchemistImg.png" alt="Alchemist Image" class="alchemistImage">
                </div>
                
            </div>
        </div>
        <div class="visitorCounterAlchemist visitorCounter">Visitors 1 Of 8</div>
        <div class="visitorEncounterAlchemist">
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

                    <button class="primaryActionAlchemist primaryAction">Make the trade</button>
                    <button class="secondaryActionAlchemist secondaryAction">Turn them away</button>
                    <div class="gameMessage"></div>
                </div>

                <div class="visitorRightAlchemist">
                    <div class="quoteBadge top"></div>
                    <div class="quoteTextAlchemist quoteText">“My granddaughter's fever won't break, and the her bwoman two villages over wants coin I don't have. A sprig of wolfsbane, prepared right, is all a poultice like this one needs. I'll trade you one I've already made — it's done its work on worse.”</div>
                    <div class="quoteBadge bottom"></div>
                </div>
            </div>
        </div>
        <div class="goodsContainer">
            <div class="goodsTextAlchemist">Your Goods</div>
            <div class="goodsBarAlchemist"></div>
        </div>
        <div class="goodsRow">
            <div class="goodsCardAlchemist goodsCard">
                <div class="goodsCardTitle">Wolfbane Sprig</div>
                <div class="goodsCardCountAlchemist goodsCardCount">2</div>
                <div class="wolfbaneSprigImg"><img src="<?php echo $basePath; ?>img/wolfbaneSprig.png" alt="Goods Image" class="goodsImage"></div>
                
            </div>
            <div class="goodsCardAlchemist goodsCard">
                <div class="goodsCardTitle">Iron Ingot</div>
                <div class="goodsCardCountAlchemist goodsCardCount">2</div>
                <div class="ironIngotImg"><img src="<?php echo $basePath; ?>img/ironIngot.png" alt="Goods Image" class="goodsImage"></div>
                
            </div>
            <div class="goodsCardAlchemist goodsCard">
                <div class="goodsCardTitle">Harvest Bread</div>
                <div class="goodsCardCountAlchemist goodsCardCount">2</div>
                <div class="harvestBreadImg"><img src="<?php echo $basePath; ?>img/harvestBread.png" alt="Goods Image" class="goodsImage"></div>
                
            </div>
            <div class="goodsCardAlchemist goodsCard">
                <div class="goodsCardTitle">Lantern Oil</div>
                <div class="goodsCardCountAlchemist goodsCardCount">2</div>
                <div class="lanternOilImg"><img src="<?php echo $basePath; ?>img/lanternOil.png" alt="Goods Image" class="goodsImage"></div>
                
            </div>
        </div>
    </div>
    <script src="<?php echo $basePath; ?>game.js"></script>
</body>
</html>
