<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php APP_NAME ?></title>

    <!-- Bootstrap CDN -->
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/bootstrap.css">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/kffont/bootstrap-icons.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <?php $url = explode('/', $_GET['url'])[0];
    switch ($url) {
        case '':
        case 'auth':
            echo '<link rel="stylesheet" href="' . ROOT . '/assets/css/login.css">';
            break;
        case 'dashboard':
            echo '<link rel="stylesheet" href="' . ROOT . '/assets/css/dashboard.css">';
            echo '<link rel="stylesheet" href="' . ROOT . '/assets/css/sidebar.css">';
            break;
        case 'patients':
        case 'health_record':
        case 'appointment':
            echo '<link rel="stylesheet" href="' . ROOT . '/assets/css/patient.css">';
            echo '<link rel="stylesheet" href="' . ROOT . '/assets/css/sidebar.css">';
            break;
    } ?>
</head>

<body <?php if ($url == 'auth' || $url == '') echo "style=\"background: url('" . ROOT . "/assets/img/background.png')\""; ?>>