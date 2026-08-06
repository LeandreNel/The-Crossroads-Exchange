<?php
$pageTitle = "Web Page";

$characters = [
    [
        'class' => 'contentWitch',
        'link' => 'witch.php',
        'title' => 'The Witch',
        'description' => 'Herbs, hexes, and a suspiciously good cup of tea.',
        'containerClass' => 'witchContainer',
        'titleClass' => 'witchText',
        'descriptionClass' => 'witchDescription'
    ],
    [
        'class' => 'contentBlacksmith',
        'link' => 'blacksmith.php',
        'title' => 'The Blacksmith',
        'description' => 'Every hammer swing has two possible futures.',
        'containerClass' => 'blacksmithContainer',
        'titleClass' => 'blacksmithText',
        'descriptionClass' => 'blacksmithDescription'
    ],
    [
        'class' => 'contentAlchemist',
        'link' => 'alchemist.php',
        'title' => 'The Alchemist',
        'description' => 'One tiny measurement away from \'oops\'.',
        'containerClass' => 'alchemistContainer',
        'titleClass' => 'alchemistText',
        'descriptionClass' => 'alchemistDescription'
    ],
    [
        'class' => 'contentRogue',
        'link' => 'rogue.php',
        'title' => 'The Rogue',
        'description' => 'Finders keepers, askers... also keepers, technically.',
        'containerClass' => 'rogueContainer',
        'titleClass' => 'rogueText',
        'descriptionClass' => 'rogueDescription'
    ]
];
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
<body class="mainBody">
    <div class="mainBack">
        <div class="introduction">
            <p class="title">The Crossroads Exchange</p>
            <p class="subtitle">Choose who you are and enjoy your journey!</p>
        </div>
        <div class="content">
            <?php foreach ($characters as $character) : ?>
                <a href="<?php echo $character['link']; ?>" class="<?php echo $character['class']; ?>">
                    <div class="<?php echo $character['containerClass']; ?>">
                        <p class="<?php echo $character['titleClass']; ?>"><?php echo $character['title']; ?></p>
                        <p class="<?php echo $character['descriptionClass']; ?>"><?php echo $character['description']; ?></p>
                    </div>
                </a>
            <?php endforeach; ?>
        </div>        <div class="tempEndButtonWrapper">
            <a href="endScreen.php" class="tempEndButton">Go to Ending</a>
        </div>    </div>
</body>