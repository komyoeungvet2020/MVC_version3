<?php
$data = array();
get_action($data);

function get_action(&$data){
    $function = 'view';
    if (isset($_GET['action'])) {
        $action = $_GET['action'];
        $function = $action;
    }
    $function($data);
}

function view(&$data) {
    $data['student_data'] = m_get_data();
    // var_dump($data['student_data']);die();
    $data['page'] = "students/view";
}

function add(&$data) {
    $data['class_data'] = get_class_data();
    $data['subject_data'] = get_subject_data();
    $data['page'] = "students/add";
}

function form_data(&$data) {
    $add_data = student_add_data($_POST);
    if($add_data) {
        $action = "view";
    }else {
        $action = "add";
    }
    header("Location: index.php?action=$action");
}

function delete(&$data) {
    //code here
    $result = delete_student();
    if($result) {
        $action = "view";
    }else {
        echo "Cannot delete this record!!!";
    }
    header("Location: index.php?action=$action");
}

function edit(&$data) {
    $data['student_data'] = student_detail();
    $data['class_data'] = get_class_data();
    $data['subject_data'] = get_subject_data();
    $data['page'] = "students/edit";
}

function edit_data(&$data) {
    $edit = student_edit($_POST);
    if($edit) {
        $action = "view";
    }else {
        echo "Error";
    }
    header("Location: index.php?action=$action");
}













// function add(&$data) {
//     $data['page'] = "students/add";
// }


// function detail(&$data) {
//     //code here
//     $data['student'] = m_detail();
//     $data['page'] = "students/detail";
// }


// function edit(&$data) {
//     //code here
//     $data['student'] = m_detail();
//     $data['page'] = "students/edit";
// }

// function edit_data(&$data) {
//     //code here
//     $update_data = m_update_data($_POST);
//     if($update_data) {
//         $action = "view";
//     }else {
//         $action = "edit";
//     }
//     header("Location: index.php?action=$action");
// }

// function update_profile(&$data) {
//     $data['student'] = m_detail();
//     $data['page'] = "students/changeProfile";
// }

// function change_profile(&$data) {
//     $change_profile = m_change_profile($_POST);
//     $id = $_GET['id'];
//     if($change_profile) {
//         $action = "detail&id=$id";
//     }else {
//         $action = "edit";
//     }
//     header("Location: index.php?action=$action");
// }