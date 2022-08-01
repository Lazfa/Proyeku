<ol class="breadcrumb" style="margin-bottom: 0;">
    <?php
    $jumlah = count($bread);
    $i = 0;
    foreach ($bread as $key => $val){ if ($i != $jumlah-1){ ?>
        <li class="breadcrumb-item"><a href=<?php echo base_url($val);?>><?php echo $key;?></a></li>
    <?php } else {?>
        <li class="breadcrumb-item active"><?php echo $key;?></li>
    <?php } $i++; } ?>
</ol>