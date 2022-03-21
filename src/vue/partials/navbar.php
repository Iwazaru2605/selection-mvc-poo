<aside id="sidenav-main" class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-left ms-3">
    <div class="sidenav-header">
        <i class="fa fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute right-0 top-0 d-none d-xl-none"></i>
        <a class="navbar-brand m-0" href="?login">
            <i class="far fa-file" style="font-size: 25px;"></i><span class="ms-2 font-weight-bolder" style="font-size: 19px;">Selection<br></span>
        </a>

        <hr class="horizontal dark mt-0">

        <div id="sidenav-collapse-main" class="collapse navbar-collapse w-auto">
            <ul class="navbar-nav">
                <?php foreach (MENUS as $itemType => $data) {
                    if ($currentUser->type == $itemType)  {
                        foreach($data as $item) {
                            if(array_key_exists("list", $item)) { ?>
                <li class="nav-item mt-3">
                    <span class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6"><?php echo $item["name"]?></span>
                </li>
                <?php foreach ($item["list"] as $data) { ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo $data["action"] ?>">
                        <i class="<?php echo $data["icon"] ?> icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center"></i>
                        <span class="nav-link-text ms-1"><?php echo $data["name"] ?><br></span>
                    </a>
                </li>
                <?php }}}}} ?>

                <li class="nav-item mt-3">
                    <span class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Autres</span>
                </li>
                <?php foreach (MENUS as $itemType => $data) {
                    if ($currentUser->type == $itemType)  {
                        foreach($data as $item) {
                            if(!array_key_exists("list", $item)) { ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo $item["id"] ?>">
                        <i class="<?php echo $item["icon"] ?> icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center"></i>
                        <span class="nav-link-text ms-1"><?php echo $item["name"] ?><br></span>
                    </a>
                </li>

                <?php }}}} ?>
                <li class="nav-item">
                    <a class="nav-link" href="?disconnect">
                        <i class="fa fa-sign-out icon disconnect icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center"></i>
                        <span class="nav-link-text ms-1">Se déconnecter<br></span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</aside>