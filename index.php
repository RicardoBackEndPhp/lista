<!DOCTYPE html>
<html lang="pt_br">
    <head>
        <title>Lista de tarefas</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,800" rel="stylesheet">
        <link rel="stylesheet" href="_cdn/css/style.css">
        <link rel="stylesheet" href="_cdn/css/fonticon.css">
    </head>
    <body>

        <header class="main_header">
            <div class="main_header_content">
                <form method="post" class="form_search">
                    <input type="text" name="term_search">
                    <button class="icon-search icon-notext"></button>
                </form>
            </div>
        </header>

        <div class="container">
            <div id="show-body" class="content">

                <?php
                    require_once __DIR__ . '/config.php';

                    $conn     = CRUD\Conn::getConn();
                    $showList = $conn->prepare("SELECT * FROM list li INNER JOIN category ca ON li.category = ca.id_category ORDER BY li.id_list DESC LIMIT 6");
                    $showList->execute();
                    if ($showList->rowCount() > 0):
                        foreach ($showList->fetchAll(PDO::FETCH_ASSOC) as $item):
                            ?>

                            <!-- CARD UNIQUE -->
                            <div class="card">

                                <div class="card_header">
                                    <h1><?= $item['title_list']; ?> <small style="float: right; font-size: 12px">#<?= $item['name_category']; ?></small></h1>
                                </div>

                                <div class="card_content">
                                    <p><?= $item['content_list']; ?></p>
                                </div>

                                <div class="card_footer">
                                    <input type="checkbox" onclick="check(<?= $item['id_list']; ?>)" name="chk_<?= $item['id_list']; ?>" id="chk_<?= $item['id_list']; ?>" />
                                    <label for="chk_<?= $item['id_list']; ?>" >Marcar como concuído</label>
                                </div>

                            </div>
                            <!-- /CARD UNIQUE -->

                            <?php
                        endforeach;
                    endif;
                ?>

            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.2.2/jquery.form.min.js"></script>
        <script src="_cdn/js/script.js"></script>
    </body>
</html>