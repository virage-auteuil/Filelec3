<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cours HTML et CSS</title>
    <style>
        
        
        body {
            margin: 0;
            font-family: Arial, sans-serif;
        }

        .nav-cata {
            top: 0;
            left: 0;
            width: 200px;
            height: 100vh;
            background-color: #007BFF;
            color: white;
            display: flex;
            flex-direction: column;
            padding: 20px;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
            z-index: 1;
        }

        .nav-cata ul {
            padding: 0;
            margin: 0;
            list-style: none;
        }

        .nav-cata li {
            margin-bottom: 10px;
        }

        .nav-cata a {
            color: white;
            text-decoration: none;
            font-size: 18px;
            display: block;
            padding: 8px 0;
        }

        .nav-cata a:hover {
            text-decoration: underline;
        }

        .nav-cata ul ul {
            padding-left: 20px;
        }

        .nav-cata ul ul li {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.5s ease-out;
        }

        .nav-cata ul ul a {
            font-size: 16px;
        }

        .nav-cata li:hover > ul > li {
            max-height: 50px;
        }

        .nav-cata > ul > li {
            border-bottom: 1px solid rgba(255, 255, 255, 0.2);
            padding-bottom: 10px;
            margin-bottom: 10px;
        }

        .nav-cata > ul > li:first-child {
            margin-bottom: 0;
            padding-bottom: 0;
        }

        .nav-cata > ul > li:last-child {
            border-bottom: none;
        }

        .nav-cata ul ul li {
            border-bottom: none;
            padding-bottom: 5px;
            margin-bottom: 5px;
        }

        .nav-cata li:hover > ul > li {
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .nav-cata li:hover > ul > li:last-child {
            border-bottom: none;
        }

        .content {
            margin-left: 240px;
            padding: 20px;
        }
    
    
    </style>
</head>
<body>
<nav class="nav-cata">
    <ul>
        <li><a href="#">Marques</a>
            <ul>
                <li><a href="#">Toyota</a></li>
                <li><a href="#">Ford</a></li>
                <li><a href="#">BMW</a></li>
                <li><a href="#">Mercedes-Benz</a></li>
                <li><a href="#">Audi</a></li>
                <li><a href="#">Volkswagen</a></li>
                <li><a href="#">Renault</a></li>
                <li><a href="#">Peugeot</a></li>
            </ul>
        </li>
        <li><a href="#">Type de Pneus</a>
            <ul>
                <li><a href="#">Pneus Hiver</a></li>
                <li><a href="#">Pneus Été</a></li>
                <li><a href="#">Pneus 4 Saisons</a></li>
                <li><a href="#">Pneus Runflat</a></li>
            </ul>
        </li>
        <li><a href="#">Equipement</a>
            <ul>
                <li><a href="#">Valves</a></li>
                <li><a href="#">Jantes</a></li>
                <li><a href="#">Kit de Réparation</a></li>
                <li><a href="#">Compresseurs</a></li>
            </ul>
        </li>
    </ul>
</nav>
</body>
</html>