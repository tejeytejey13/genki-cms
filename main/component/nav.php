<nav id="navbar-main" class="navbar is-fixed-top">
    <div class="navbar-brand">
        <a class="navbar-item is-hidden-desktop jb-aside-mobile-toggle">
            <span class="icon"><i class="mdi mdi-forwardburger mdi-24px"></i></span>
        </a>
        <div class="navbar-item has-control">
            <div class="control"><input placeholder="Search everywhere..." class="input"></div>
        </div>
    </div>
    <div class="navbar-brand is-right">
        <a class="navbar-item is-hidden-desktop jb-navbar-menu-toggle" data-target="navbar-menu">
            <span class="icon"><i class="mdi mdi-dots-vertical"></i></span>
        </a>
    </div>
    <div class="navbar-menu fadeIn animated faster" id="navbar-menu">
        <div class="navbar-end">
          
            <div class="navbar-item has-dropdown has-dropdown-with-icons has-divider has-user-avatar is-hoverable">
                <a class="navbar-link is-arrowless">
                    <div class="is-user-avatar">
                        <img id="navbar-pfp" src="<?php 
                        if(!empty($profile)){
                        echo $pfpImg = './img/profile/'.$profile;
                        }else{
                        echo $profileImg = 'https://avatars.dicebear.com/v2/initials/john-doe.svg';
                        }?>" alt="<?=$pfpImg?>">
                    </div>
                    <div class="is-user-name"><span><?=ucfirst($user_fname), ' ', ucfirst($user_lname)?></span></div>
                    <span class="icon"><i class="mdi mdi-chevron-down"></i></span>
                </a>
                <div class="navbar-dropdown">
                    <a href="profile.php" class="navbar-item">
                        <span class="icon"><i class="mdi mdi-account"></i></span>
                        <span>My Profile</span>
                    </a>
                    <a class="navbar-item">
                        <span class="icon"><i class="mdi mdi-email"></i></span>
                        <span>Messages</span>
                    </a>
                    <hr class="navbar-divider">
                    <a id="logout-btn" class="navbar-item">
                        <span class="icon"><i class="mdi mdi-logout"></i></span>
                        <span>Log Out</span>
                    </a>
                </div>
            </div>
           
            <a id="logout-btn-2" title="Log out" class="navbar-item is-desktop-icon-only">
                <span class="icon"><i class="mdi mdi-logout"></i></span>
                <span>Log out</span>
            </a>
        </div>
    </div>
</nav>