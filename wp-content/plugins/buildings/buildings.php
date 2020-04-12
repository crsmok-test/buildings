<?php
/**
 * Plugin Name: Недвижимость
 * Description:  
 * Plugin URI:  
 * Author URI:  
 * Author:      Rak Andrzej
 * Version:     0.1
 *
 * 
 *
 * License:     GPL2
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 *
 * 
 */

    function objects_list_view( $atts ){
      $options = array(
        'post_type' => 'buildings',
        'numberposts' => 6
      );

      $template = '<div class="row">';
      $lastObjects = get_posts($options);
      ?>

<div id="carouselObjectsControls" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner"  style="padding-left: 55px;padding-right: 55px;margin-bottom: 50px">

<?php
      $active_f = 1;
      foreach($lastObjects as $object){
          if($active_f){
              $active_f = 0;
              $template .='<div class="carousel-item active">';
          } else {
              $template .='<div class="carousel-item">';
          }
        $template.='<div class="card" >
                        <div class="card-header">'.$object->post_title.'</div>
                        <div class="card-body">
                            <div class="row">
                            <div class="col-sm-3">'.
                                get_the_post_thumbnail($object->ID, 'medium')
                            .'</div>
                            <div class="col-sm-9">
                               <div class="card-text">'.
                                 do_shortcode('[addOptionsList post_id='.$object->ID.']')
                            .'</div>
                            <a href="'.get_permalink($object->ID).'" class="btn btn-primary">Просмотреть</a>
                            </div>
                            </div>
                       </div>
                    </div>';
        $template .= '</div>';

      }

     $template .= '</div>';

    echo $template;
?>
    </div>
    <a class="carousel-control-prev" href="#carouselObjectsControls" role="button" data-slide="prev"
       style="background: black; width: 3%">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselObjectsControls" role="button" data-slide="next"
       style="background: black; width: 3%">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
<?php
    }

function cities_list_view( $atts ){
    $options = array(
        'post_type' => 'city',
        'post_per_page' => -1
    );


    $template = '<div class="row">';
    $cities = get_posts($options);
    ?>

    <div id="carouselCitiesControls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner"  style="padding-left: 55px;padding-right: 55px;margin-bottom: 50px">

            <?php
            $active_f = 1;

            foreach($cities as $city){

                if($active_f){
                    $active_f = 0;
                    $template .='<div class="carousel-item active">';
                } else {
                    $template .='<div class="carousel-item">';
                }
                $template.='<div class="card" >
                        <div class="card-header">'.$city->post_title.'</div>
                        <div class="card-body">
                            <div class="row">
                            <div class="col-sm-3">'.
                    get_the_post_thumbnail($city->ID, 'medium')
                    .'</div>
                            <div class="col-sm-9">
                           <p class="card-text"></p>
                            <a href="'.get_permalink($city->ID).'" class="btn btn-primary">Просмотреть</a>
                            </div>
                            </div>
                       </div>
                    </div>';
                $template .= '</div>';

            }

            $template .= '</div>';

            echo $template;
            ?>
        </div>
        <a class="carousel-control-prev" href="#carouselCitiesControls" role="button" data-slide="prev"
           style="background: black; width: 3%">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselCitiesControls" role="button" data-slide="next"
           style="background: black; width: 3%">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <?php
}

    function city_objects_list_view( $atts ){

        $options = array(
            'post_type' => 'buildings',
            'numberposts' => 10,
            'post_parent' => get_the_ID()
        );

        $template = '<div class="row">';
        $lastObjects = get_posts($options);
        foreach($lastObjects as $object){
            $template.='<div class="card col-sm-6" >
                        <div class="card-header">'.$object->post_title.'</div>
                        <div class="card-body">
                            <div class="row">
                            <div class="col-sm-6">'.
                get_the_post_thumbnail($object->ID, 'medium')
                .'</div>
                            <div class="col-sm-6">
                                <div class="card-text">'.
                                  do_shortcode('[addOptionsList post_id='.$object->ID.']')
                                .'</div>
                                <a href="'.get_permalink($object->ID).'" class="btn btn-primary">Просмотреть</a>
                            </div>
                            </div>
                       </div>
                    </div>';
        }

        $template .= '</div>';

        return $template;
    }

    function options_list_view($atts){
        $fieldsName = array('площадь','стоимость','адрес','жилая_площадь','этаж');
        $post_id = $atts['post_id'];
        $objectMeta = get_post_meta($post_id);
       $template = ' <div class="alert alert-dark" role="alert">
            Площадь: '.$objectMeta[$fieldsName[0]][0].'
        </div>
                                    <div class="alert alert-dark" role="alert">
            Стоимость: '.$objectMeta[$fieldsName[1]][0].'
        </div>
                                    <div class="alert alert-dark" role="alert">
            Адрес: '.$objectMeta[$fieldsName[2]][0].'
        </div>
                                    <div class="alert alert-dark" role="alert">
            Жилая площадь: '.$objectMeta[$fieldsName[3]][0].'
        </div>
                                    <div class="alert alert-dark" role="alert">
            Этаж: '.$objectMeta[$fieldsName[4]][0].'
        </div>';

       return $template;
    }

    function add_new_object($atts){
        global $wpdb;
        $cities = $wpdb->get_results("select ID, post_title from wp_posts where (post_type = 'city' and
                                         post_status='publish') order by post_title ");
        ?>
        <script>

            jQuery(document).ready(function($){
                var form = $(".add-object-form");

                form.on("submit", function (event) {
                    event.preventDefault();
                    var addForm = this;
                    var formData = new FormData (addForm);
                    formData.append('action', 'ajax_order');

                    $.ajax({
                        url: '<?php echo admin_url("admin-ajax.php") ?>',
                        method: 'post',
                        contentType: false,
                        processData: false,
                        data: formData,
                        success: function (response) {
                            addForm.reset();
                            location.reload();
                        }});
                });
            });

        </script>
        <form class="add-object-form" enctype="multipart/form-data" method="post">
            <div class="form-group">
                <label for="inputTitle">Название</label>
                <input type="text" class="form-control" id="inputTitle" name="inputTitle" value="" required>
            </div>
            <div class="form-group">
                <label for="inputDescription">Описание</label>
                <textarea class="form-control" id="inputDescription" name="inputDescription" value="" required></textarea>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="inputCity">Город</label>
                    <select id="inputCity" name="inputCity" class="form-control" required>
                        <option selected>Выберите город...</option>
                        <?php foreach ($cities as $city): ?>
                            <option value="<?php echo $city->ID; ?>"><?php echo $city->post_title?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group col-md-4" >
                    <label for="inputAddress">Адрес</label>
                    <input type="text" class="form-control" id="inputAddress" name="inputAddress" value="" required>
                </div>
                <div class="form-group col-md-4" >
                    <label for="inputFloor">Этаж</label>
                    <input type="text" class="form-control" value="1" id="inputFloor" name="inputFloor" value="" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="inputPrice">Стоимость</label>
                    <input type="text" class="form-control" id="inputPrice" name="inputPrice" value="" required>
                </div>
                <div class="form-group col-md-4" >
                    <label for="inputSquare">Площадь</label>
                    <input type="text" class="form-control" id="inputSquare" name="inputSquare" value="" required>
                </div>
                <div class="form-group col-md-4" >
                    <label for="inputLivingSquare">Жилая площадь</label>
                    <input type="text" class="form-control" value="" id="inputLivingSquare" name="inputLivingSquare" required>
                </div>
            </div>
            <div class="form-group">
                <label for="inputImage">Загрузить изображение</label>
                <input type="file" class="form-control" id="inputImage" name="inputImage"  value="" multiple="multiple"
                       accept=".txt,image/*" >
                <?php wp_nonce_field( 'inputImage', 'inputImage_nonce' ); ?>
            </div>
            <button type="submit" id="submit-ajax" class="btn btn-primary">Добавить</button>
        </form>
<?php
    }

     function ajax_form(){

         $post_data = array(
             'post_title'    => wp_strip_all_tags( $_POST['inputTitle'] ),
             'post_content'  => $_POST['inputDescription'],
             'post_parent' =>  $_POST['inputCity'],
             'post_status'   => 'publish',
             'post_type'   => 'buildings',
         );

         $post_id = wp_insert_post( $post_data );

         update_field('площадь', $_POST['inputSquare'], $post_id);
         update_field('стоимость', $_POST['inputPrice'], $post_id);
         update_field('адрес', $_POST['inputAddress'], $post_id);
         update_field('жилая_площадь', $_POST['inputLivingSquare'], $post_id);
         update_field('этаж', (int) $_POST['inputFloor'], $post_id);

         require_once( ABSPATH . 'wp-admin/includes/image.php' );
         require_once( ABSPATH . 'wp-admin/includes/file.php' );
         require_once( ABSPATH . 'wp-admin/includes/media.php' );

         if(isset($_FILES['inputImage'])) {
             $file = $_FILES['inputImage'];
             $file_return = wp_handle_upload($file, array('test_form' => false));

             if (isset($file_return['error']) || isset($file_return['upload_error_handler'])) {
                 return false;
             } else {
                 $filename = $file_return['file'];
                 $attachment = array(
                     'post_mime_type' => $file_return['type'],
                     'post_title' => preg_replace('/\.[^.]+$/', '', basename($filename)),
                     'post_content' => '',
                     'post_status' => 'inherit',
                     'guid' => $file_return['url']
                 );

                 $attachment_id = wp_insert_attachment($attachment, $file_return['url']);
                 $attachment_data = wp_generate_attachment_metadata($attachment_id, $filename);
                 wp_update_attachment_metadata($attachment_id, $attachment_data);
                 set_post_thumbnail($post_id, $attachment_id);
             }
         }
     }

    add_shortcode('objectsList', 'objects_list_view');
    add_shortcode('citiesList', 'cities_list_view');
    add_shortcode('cityObjectsList', 'city_objects_list_view');
    add_shortcode('addOptionsList','options_list_view');
    add_shortcode('addCityForm','add_new_object');
    add_action('wp_ajax_nopriv_ajax_order', 'ajax_form' );
    add_action('wp_ajax_ajax_order', 'ajax_form' );