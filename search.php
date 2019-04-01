<?php
/**
 * Created by netbeans.
 * User: Ricardo de Oliveira
 * Date: 01/04/2019
 * Time: 3:58
 */

require __DIR__ . '/config.php';

$postData = filter_input_array(INPUT_POST, FILTER_DEFAULT);
$postData = array_map('strip_tags', $postData);
$postData = array_map('trim', $postData);

$action = $postData['action'];
unset($postData['action']);

switch ($action) {
    case 'search_product':

        if (!empty($postData['term_search'])) {

            $read = CRUD\Conn::getConn()->prepare("SELECT * FROM list li INNER JOIN category ca ON li.category = ca.id_category WHERE title_list LIKE '%{$postData['term_search']}%' LIMIT 6");
            $read->execute();
            if ($read->rowCount() > 0) {

                $template = "<div class='card'>

                    <div class='card_header'>
                        <h1>%s <small style='float: right; font-size: 12px'>#%s</small></h1>
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
                
                foreach ($read->fetchAll(PDO::FETCH_ASSOC) as $item) {
                    
                    $array = [
                        'post_title' => $item['title_list'],
                        'category' => $item['name_category'],
                        'post_content' => $item['content_list'],
                        'param' => $item['id_list'],
                        'name_id' => $item['id_list'],
                        'id' => $item['id_list'],
                        'for_id' => $item['id_list']
                    ];

                    $result .= vsprintf($template, $array);     
                    
                }
                $json['product'] = $result;
            } else {
                $json['product_clear'] = true;
                break;
            }

        } else {
            $json['product_clear'] = true;
            break;
        }

        break;
}

echo json_encode($json);