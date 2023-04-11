<!DOCTYPE html>
<html>
<head>
    <title>Titres des dernières actualités</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        h1 {
            font-size: 24px;
            margin-bottom: 16px;
        }
        ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }
        li {
            margin-bottom: 16px;
        }
        a {
            color: #0072C6;
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <h1>Les dernières actualités</h1>
    <ul>
        <?php
        $rss = simplexml_load_file('https://www.lemonde.fr/rss/une.xml');
        $nbrArticle = 0;
        foreach ($rss->channel->item as $item) {
            if ($nbrArticle < 6) {
                $title = (string) $item->title;
                $link = (string) $item->link;
                echo "<li><a href=\"$link\">$title</a></li>";
                $nbrArticle++;
            } else {
                break;
            }
        }
        ?>
    </ul>
</body>
</html>