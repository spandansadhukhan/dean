<?php 
	$action = $this->request->params['action'];
	$controller = $this->request->params['controller'];
?>
 <!-- page heading start-->
        <div class="page-heading">
            <h3>
                <?php echo $controller;?>
            </h3>
            <ul class="breadcrumb">
                <li>
                    <a href="#"><?php echo $controller;?></a>
                </li>
                <li class="active"><?php echo $action;?></li>
            </ul>
            <div class="state-info">
                <section class="panel">
                    <div class="panel-body">
                        <div class="summary">
                            <span>yearly expense</span>
                            <h3 class="red-txt">$ 45,600</h3>
                        </div>
                        <div id="income" class="chart-bar"></div>
                    </div>
                </section>
                <section class="panel">
                    <div class="panel-body">
                        <div class="summary">
                            <span>yearly  income</span>
                            <h3 class="green-txt">$ 45,600</h3>
                        </div>
                        <div id="expense" class="chart-bar"></div>
                    </div>
                </section>
            </div>
        </div>
<!-- page heading end-->
