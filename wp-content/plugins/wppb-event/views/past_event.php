<?php
error_reporting(0);
require_once( ABSPATH . 'wp-admin/includes/class-wp-list-table.php' );

class OWTTableList extends WP_List_Table {

    /* var $data = array(
                array("id"=>1,"name"=>"Piyush", "email" => "piyush@hotmail.com"),
                array("id"=>2,"name"=>"Narendra", "email" => "narendra@hotmail.com"),
                array("id"=>3,"name"=>"Urmish", "email" => "urmish@hotmail.com")
                ); */

     /* var $data = array(
            'post_type'      => 'event',
            'posts_per_page' => -1,
            'meta_key'       => 'start_date',
            'orderby'        => 'meta_value',
            'order'          => 'ASC',
            'meta_query'     => array(
                array(
                'key'       => 'start_date',
                'value'     => $today,
                'type'      => 'DATE',
                'compare'   => '<',
                )
                )
            ); */
     
    // prepare items
    public function prepare_items() {
        $this->items = $this->data;

        $columns = $this->get_columns();
        $this->_column_headers = array($columns); 
    }
    // get columns
    public function get_columns(){

        $columns = array(
                    "id"    => "ID",
                    "name"  => "Name",
                    "email" => "Email"
                );
        return $columns;

    }

    // columns_default
    public function column_default($item, $column_name){

        switch ($column_name) {
            case 'id':
            case 'name':
            case 'email':
                
                return $item[$column_name];
            
            default:
                return "No Value";
        }
    }
}

    function owt_show_data_list_table() {

        $owt_table = new OWTTableList();
        $owt_table->prepare_items();
        $owt_table->display(); 


        $posts_array = array();

         $all_posts = get_posts(array(
                    "post_type" => "post",
                    "post_status" => "publish"
                ));

        if (count($all_posts) > 0) {

            foreach ($all_posts as $index => $post) {
                $posts_array[] = array(
                    "id" => $post->ID,
                    "title" => $post->post_title,
                    "content" => $post->post_content,
                    "slug" => $post->post_name
                );
            }
        }

        return $posts_array;

    }
owt_show_data_list_table();

