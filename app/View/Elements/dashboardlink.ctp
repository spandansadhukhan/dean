<div class="left" id="breadcrumbstext">
    <span><a href="<?php echo $this->Html->url('/');?>"><span itemprop="title"> Home </span></a></span> \
    <?php if($user['Country']['name'] != ""){ ?>
    <span><a href="javascript:void(0)"><span itemprop="title"> <?php echo $user['Country']['name']?></span></a></span> \
    <?php } ?>
    <?php if($user['State']['name'] != ""){ ?>
    <span><a href="javascript:void(0)"><span itemprop="title"> <?php echo $user['State']['name']?></span></a></span> \
    <?php } ?>
    <?php if($user['City']['name'] != ""){ ?>
    <span><a href="javascript:void(0)"><span itemprop="title"> <?php echo $user['City']['name']?></span></a></span> \
    <?php } ?>
    <a href="<?php echo $this->Html->url('/');?>users/userdashboard"><span itemprop="title"> <?php echo $user['User']['name'] ?> </span></a>
</div>
