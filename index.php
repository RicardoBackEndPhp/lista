<!DOCTYPE html>
<html lang="pt_br">
    <head>
        <title>Lista de tarefas</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="_cdn/css/reset.css">
    </head>
    <body>

        <div class="container">
            <div class="content">

                <?php
                    require_once __DIR__ . '/config.php';

                    $conn = CRUD\Conn::getConn();
                    $showList = $conn->prepare("SELECT * FROM list ORDER BY id_list DESC LIMIT 6");
                    $showList->execute();
                    if ($showList->rowCount() > 0):
                        foreach ($showList->fetchAll(PDO::FETCH_ASSOC) as $item):
                        
                            ?>

                            <!-- CARD UNIQUE -->
                            <div class="card">

                                <div class="card_header">
                                    <h1>#<?= $item['id_list']; ?> <?= $item['title_list']; ?></h1>
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
        <script src="_cdn/js/script.js"></script>
    </body>
</html>