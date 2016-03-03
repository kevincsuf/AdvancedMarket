<?php

    // Get current page name
    $page_name = basename($_SERVER['PHP_SELF']);

    // Set menu and page name pair
    $menu_items = array(
        'Home'=>"index.php",
        'Seller'=>"seller_view.php",
        'About'=>"about.php",
        'Sign-up'=>"register.php",
        'Login'=>"login.php"
    );

    // Generate menu code
    $menu_display = "";
    foreach($menu_items as $key => $value) {
        if ($page_name == $value) {
            $menu_display = $menu_display."<li class=\"active\"><a href=\"".$value."\">".$key."</a></li>";
        }
        else {
            $menu_display = $menu_display."<li><a href=\"".$value."\">".$key."</a></li>";
        }
    }
?>

<div class="navbar">
    <div class="navbar-inner">
        <div class="container">

            <!-- Navigation button, visible on small resolution -->
            <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                <i class="icon-menu"></i>
            </button>
            <!-- Main navigation -->
            <div class="nav-collapse collapse pull-right">
                <ul class="nav" id="top-navigation">
                    <?php echo $menu_display; ?>
                </ul>
            </div>
            <!-- End main navigation -->
        </div>
    </div>
</div>
