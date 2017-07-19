                <div class="alert alert-info">
                    <h4 style="color: #c32f10; font-weight: bold; border-bottom: #909090 solid 1px">Existing Village(s)</h4>
                    <div style="width: auto; height: 150px; overflow: auto">
                    <ul>
                        <?php foreach($villages as $villitem){?>
                            <li style="color:#000000">
                                <?php echo ucfirst(strtolower($villitem->NAME_)); ?>  
                                <a href="<?php echo site_url('web/patwariDasboard/village/'.str_replace(' ', '-',$villitem->NAME_).'/'.$villitem->ONEROWID.'/1');?>" class="btn btn-link"><span class="glyphicon glyphicon-edit"></span> Update Village</a>
                            </li>
                        <?php } ?>
                    </ul>
                    </div>
                </div>