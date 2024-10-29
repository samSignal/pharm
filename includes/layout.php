<!DOCTYPE html>
<html lang="<?php echo str_replace('_', '-', getenv('APP_LOCALE') ?: 'en'); ?>">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta id="csrf-token" name="csrf-token" content="<?php echo htmlspecialchars($csrf_token ?? '', ENT_QUOTES); ?>">
    <meta name="author" content="CJ Inspired">

    <title><?php echo htmlspecialchars($page_title ?? 'Default Page Title'); ?> </title>

    <?php include 'inc_top.php'; ?>
    
</head>

<body>

    <?php include 'top_menu.php'; ?>

    <div class="page-content">
        <?php include 'sidebar.php'; ?>

        <div class="content-wrapper">
            

            <div class="content">
                <!-- Error Alert Area -->
                <?php if (!empty($errors)): ?>
                    <div class="alert alert-danger border-0 alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
                        <?php foreach ($errors as $error): ?>
                            <span><i class="icon-arrow-right5"></i> <?php echo htmlspecialchars($error, ENT_QUOTES); ?></span> <br>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>

                <div id="ajax-alert" style="display: none"></div>

                <?php echo $content ?? ''; ?>
            </div>
        </div>
    </div>

    <?php include 'bottom.php'; ?>
    <?php include 'modals.php'; ?>
    <?php echo $scripts ?? ''; ?>
</body>
</html>
