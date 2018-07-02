<?php

echo $this->Form->input('state_id',array('empty'=>'Choose State','label'=>false,'div'=>false,'options'=>$statelist, 'class'=>'form-control','required'=>'required','id'=>'StateId')); ?>