<?php

if (!empty($_POST)) {
    // Collects POST vars
    $regIds = isset($_POST["regIds"]) ? $_POST["regIds"] : null;
    $message_type = isset($_POST['message_type']) ? $_POST['message_type'] : null;
    $time_to_live = isset($_POST["time_to_live"]) ? intval($_POST["time_to_live"]) : null;
    $click_action = isset($_POST["click_action"]) ? $_POST["click_action"] : null;
    $collapse_key = isset($_POST['collapse_key']) ? $_POST['collapse_key'] : null;
    $tag = isset($_POST["tag"]) ? $_POST["tag"] : null;
    $title = isset($_POST["title"]) ? $_POST["title"] : null;
    $body = isset($_POST["body"]) ? $_POST["body"] : null;
    $icon = isset($_POST["icon"]) ? $_POST["icon"] : null;
    $color =  isset($_POST["color"]) ? $_POST["color"] : null;
    $delay_while_idle =  isset($_POST["delay_while_idle"]) ? ($_POST["delay_while_idle"] === 'true') : false;
    $restricted_package_name = isset($_POST["restricted_package_name"]) ? $_POST["restricted_package_name"] : null;
    $extrasData = isset($_POST["extras"]) ? $_POST["extras"] : null;

    // Checks selected users
    if (empty($regIds)) {
        echo json_encode(array('response' => 'Select at least one user.'));
        exit();
    }

    // Checks extras
    if (!empty($extrasData)) {
        $extrasData = json_decode($extrasData);
        if (json_last_error() !== JSON_ERROR_NONE) {
            echo json_encode(array('response' => 'Invalid extra (' . json_last_error() . ').'));
            exit();
        }
    }

    // Get notification info
    $notificationData = null;
    if ($message_type === "notification") {
        if (!empty($title) && !empty($icon)) {
            $notificationData = array(
                'body' => $body,
                'icon' => $icon,
                'color' => $color,
                'title' => $title,
                'click_action' => $click_action,
                'tag' => $tag
            );
            $notificationData = array_filter($notificationData);
        } else {
            echo json_encode(array('response' => 'Notification messages needs Title and Icon.'));
            exit();
        }
    }

    require_once 'data/db_config.php';

    $headers = array(
        "Content-Type:" . "application/json",
        "Authorization:" . "key=" . GOOGLE_API_KEY
    );

    $postData = array(
        'registration_ids' => $regIds,
        'delay_while_idle' => boolval($delay_while_idle)
    );

    if (!empty($restricted_package_name)) { $postData['restricted_package_name'] = $restricted_package_name; }
    if (!empty($notificationData)) { $postData['notification'] = $notificationData; }
    if (!empty($collapse_key)) { $postData['collapse_key'] = $collapse_key; }
    if (!empty($time_to_live)) { $postData['time_to_live'] = $time_to_live; }
    if (!empty($extrasData)) { $postData['data'] = $extrasData; }


    $ch = curl_init();

    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_URL, "https://android.googleapis.com/gcm/send");
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($postData));

    $response = curl_exec($ch);
    curl_close($ch);

    echo json_encode(array('response' => $response, 'json' => json_encode($postData)));
} else {
    echo json_encode(array('response' => 'No POST'));
    exit();
}
