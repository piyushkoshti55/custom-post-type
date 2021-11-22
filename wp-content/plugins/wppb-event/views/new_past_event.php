<?php

require_once( ABSPATH . 'wp-admin/includes/class-wp-list-table.php' );

class EventTableList extends WP_List_Table {

    public function prepare_items() {

        $orderby = isset($_GET['orderby']) ? trim($_GET['orderby']) : "";
        $order = isset($_GET['order']) ? trim($_GET['order']) : "";
        
        $this->items = $this->wp_list_table_data($orderby, $order);

        $columns = $this->get_columns();
        

        $this->_column_headers = array($columns);
    }

    public function wp_list_table_data($orderby = '', $order = '') {


        global $wpdb;
			
				$today = date('Y-m-d');
                $all_posts = get_posts(array(
                    "post_type" => "event",
                    "post_status" => "publish",
					'meta_query'	 => array(
					array(
					'key' 		=> 'start_date',
					'value' 	=> $today,
					'type' 		=> 'DATE',
					'compare' 	=> '<',
					)
					)
                ));
           

        $posts_array = array();

        if (count($all_posts) > 0) {

            foreach ($all_posts as $index => $post) {
			$start_query =  $wpdb->get_results("SELECT  meta_value from " . $wpdb->postmeta . " WHERE post_id =" . $post->ID .  " AND meta_key = 'start_date'"); 
			$end_query =  $wpdb->get_results("SELECT  meta_value from " . $wpdb->postmeta . " WHERE post_id =" . $post->ID .  " AND meta_key = 'end_date'"); 
			
                $posts_array[] = array(
                    "id" => $post->ID,
                    "title" => $post->post_title,
					"start" =>date("jS F, Y", strtotime($start_query[0]->meta_value)),
					"end"   =>date("jS F, Y", strtotime($end_query[0]->meta_value)),
                    "content" => $post->post_content,
                    "slug" => $post->post_name
                );
            }
        }

        return $posts_array;
    }

    public function get_columns() {
		
        $columns = array(
            "id" => "ID",
			"title" => "Title",
			"start" => "start",
			"end"   => "end",
            "content" => "Content",
            "slug" => "Post Slug"
        );

        return $columns;
    }

    public function column_default($item, $column_name) {

        switch ($column_name) {

            case 'id':
            case 'title':
			case 'start':
			case 'end':
            case 'content':
            case 'slug':
                return $item[$column_name];
            default:
                return "no value";
        }
    }

}

function Event_show_data_list_table() {

    $owt_table = new EventTableList();

    $owt_table->prepare_items();
    echo '<h3>Past Events List</h3>';
    echo "<form method='post' name='frm_search_post' action='" . $_SERVER['PHP_SELF'] . "?page=owt-list-table'>";
    $owt_table->search_box("Search Post(s)", "search_post_id");
    echo "</form>";
    $owt_table->display();
}

Event_show_data_list_table();
?>
