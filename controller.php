<?php
/**
 * Created by netbeans 8.2.
 * User: Ricardo de Oliveira
 * Date: 30/03/2019
 * Time: 17:13
 */

$postData = filter_input_array(INPUT_POST, FILTER_DEFAULT);

$action = $postData['action'];
unset($postData['action']);

switch ($action) {
    case 'more_articles':
        
        require_once __DIR__ . '/config.php';
        
        $showList = CRUD\Conn::getConn()->prepare("SELECT * FROM list ORDER BY id_list DESC LIMIT 6 OFFSET " . $postData['offsetCount']);
        $showList->execute();
        
        $template = "<div class='card'>

                    <div class='card_header'>
                        <h1>#%s %s</h1>
                    </div>

                    <div class='card_content'>
                        <p>%s</p>
                    </div>

                    <div class='card_footer'>
                        <input type='checkbox' onclick='check(%s)' name='chk_%s' id='chk_%s' />
                        <label for='chk_%s' >Marcar como concuído</label>
                    </div>

                </div>";

        $result = "";
        
        if ($showList->rowCount() > 0){
            foreach ($showList->fetchAll(PDO::FETCH_ASSOC) as $item){
                $array = [
                    'post_id' => $item['id_list'],
                    'post_title' => $item['title_list'],
                    'post_content' => $item['content_list'],
                    'param' => $item['id_list'],
                    'name_id' => $item['id_list'],
                    'id' => $item['id_list'],
                    'for_id' => $item['id_list']
                ];
                
                $result .= vsprintf($template, $array);
            }
        }

        $json['content'] = $result;
        break;
}

echo json_encode($json);