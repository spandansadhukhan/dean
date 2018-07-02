<div class="left-wrap">
    <div class="main-category-part">
        <h3>by Categories</h3>
        <div class="main-category-container">
            <ul>
                <?php 
                foreach ($Category_list as $Catlist=>$Val): 
                    echo '<li><a href="">'.$Val.'</a></li>';
                endforeach;
                ?>
                <!--<li><a href="">Advertise jobs</a></li>
                <li><a href="">Cars for sale</a></li>
                <li><a href="">Employment</a></li>
                <li><a href="">Dating</a></li>
                <li><a href="">Male escort</a></li>
                <li><a href="">Female escorts</a></li>-->
            </ul>
        </div>
    </div>
    <div class="main-category-part">
        <h3>Search by cities</h3>
        <div class="main-category-container">
            <ul>
                <li><a href="">City Name - 1</a></li>
                <li><a href="">City Name - 2</a></li>
                <li><a href="">City Name - 3</a></li>
                <li><a href="">City Name - 4</a></li>
                <li><a href="">City Name - 5</a></li>
                <li><a href="">City Name - 6</a></li>
            </ul>
        </div>
    </div>
    <div class="recommended-part">
        <h3>Recommended JOB</h3>
        <div class="recommended-part-container">
            <div class="recom-pic">
                    <img src="<?php echo $this->webroot;?>images/recom-1.jpg" alt="">
            </div>
            <h5>COMPANY NAME</h5>
        </div>
    </div>
    <div class="recommended-part">
        <h3>CAR of the Week</h3>
        <div class="recommended-part-container">
            <div class="recom-pic">
                    <img src="<?php echo $this->webroot;?>images/recom-2.jpg" alt="">
            </div>
            <h5>COMPANY NAME</h5>
        </div>
    </div>
</div>
<div class="right-wrap">
    <div class="maintitle">
        <h3>Female <span>escorts</span></h3>
        <a href="" class="s_butt viewall">View All</a>
    </div>
    <div class="item-list-area">
        <ul class="pro-list">
            <?php 
            $uploadFolderUser = "user_images";
            $uploadUserPath = WWW_ROOT . $uploadFolderUser;
            foreach ($FemaleEscorts_list as $FemaleEscorts): 
                $profile_image = $FemaleEscorts['User']['profile_image'];
                if(file_exists($uploadUserPath . '/' . $profile_image) && $profile_image!=''){
                    $profileImageLink=$this->webroot.$uploadFolderUser.'/'.$profile_image;
                }else{
                    $profileImageLink=$this->webroot.$uploadFolderUser.'/default.png';
                }
            ?>
            <li>
                <div class="item-box"><img src="<?php echo $profileImageLink;?>" alt=""></div>
                <h5><?php echo isset($FemaleEscorts['User']['first_name'])?$FemaleEscorts['User']['first_name'].' '.$FemaleEscorts['User']['last_name']:'';?></h5>
                <p>Consectetur adipiscing elit</p>
            </li>
            <?php 
            endforeach;
            ?>
            <li>
                <div class="item-box"><img src="<?php echo $this->webroot;?>images/escort-1.jpg" alt=""></div>
                <h5>COMPANY NAME</h5>
                <p>Consectetur adipiscing elit</p>
            </li>
            <li>
                <div class="item-box"><img src="<?php echo $this->webroot;?>images/escort-1.jpg" alt=""></div>
                <h5>COMPANY NAME</h5>
                <p>Consectetur adipiscing elit</p>
            </li>
            <li>
                <div class="item-box"><img src="<?php echo $this->webroot;?>images/escort-1.jpg" alt=""></div>
                <h5>COMPANY NAME</h5>
                <p>Consectetur adipiscing elit</p>
            </li>
            <li>
                <div class="item-box"><img src="<?php echo $this->webroot;?>images/escort-1.jpg" alt=""></div>
                <h5>COMPANY NAME</h5>
                <p>Consectetur adipiscing elit</p>
            </li>
        </ul>
    </div>
    <div class="maintitle">
        <h3>Male <span>escorts</span></h3>
        <a href="" class="s_butt viewall">View All</a>
    </div>
    <div class="item-list-area">
        <ul class="pro-list">
            <li>
                <div class="item-box"><img src="<?php echo $this->webroot;?>images/escort-2.jpg" alt=""></div>
                <h5>COMPANY NAME</h5>
                <p>Consectetur adipiscing elit</p>
            </li>
            <li>
                <div class="item-box"><img src="<?php echo $this->webroot;?>images/escort-2.jpg" alt=""></div>
                <h5>COMPANY NAME</h5>
                <p>Consectetur adipiscing elit</p>
            </li>
            <li>
                <div class="item-box"><img src="<?php echo $this->webroot;?>images/escort-2.jpg" alt=""></div>
                <h5>COMPANY NAME</h5>
                <p>Consectetur adipiscing elit</p>
            </li>
            <li>
                <div class="item-box"><img src="<?php echo $this->webroot;?>images/escort-2.jpg" alt=""></div>
                <h5>COMPANY NAME</h5>
                <p>Consectetur adipiscing elit</p>
            </li>
        </ul>
    </div>
</div>